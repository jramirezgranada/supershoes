<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article as ArticleResource;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Load all the articles that are in the Database.
     * @return ArticleResource
     */
    public function getArticles()
    {
        $articles = Article::all();

        return (new ArticleResource($articles))
            ->additional([
                'success' => true,
                'total_items' => $articles->count()
            ]);
    }

    /**
     * Get the article information by a given id
     * @param $id
     * @return ArticleResource|\Illuminate\Http\JsonResponse
     */
    public function getArticle($id)
    {
        $id = (int)$id;

        if (!is_int($id) || $id == 0) {
            return response()->json($this->responseHelper->getResponseObject(
                'Bad Request',
                400,
                false
            ));
        }

        $article = Article::with('store')->findOrFail($id);
        
        return (new ArticleResource($article))
            ->additional([
                'success' => true
            ]);
    }
}
