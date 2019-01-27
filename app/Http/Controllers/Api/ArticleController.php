<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
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

    /**
     * Create new article
     * @param CreateArticleRequest $request
     * @return ArticleResource
     */
    public function createArticle(CreateArticleRequest $request)
    {
        $store = Article::create($request->all());

        return (new ArticleResource($store->fresh('store')))
            ->additional([
                'success' => true,
            ]);
    }

    /**
     * Update an article
     * @param CreateArticleRequest $request
     * @param $id
     * @return ArticleResource
     */
    public function updateArticle(CreateArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->fill($request->all())->save();

        return (new ArticleResource($article->fresh('store')))
            ->additional([
                'success' => true
            ]);
    }
}
