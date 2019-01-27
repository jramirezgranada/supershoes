<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStoreRequest;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\Store as StoreResource;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * Load all the stores that are stored in the Database.
     * @return StoreResource
     */
    public function getStores()
    {
        $stores = Store::all();
        return (new StoreResource($stores))
            ->additional([
                'success' => true,
                'total_items' => $stores->count()
            ]);
    }


    /**
     * Get all articles by store id
     * @param $id
     * @return ArticleResource|\Illuminate\Http\JsonResponse
     */
    public function getArticlesStore($id)
    {
        $id = (int)$id;

        if (!is_int($id) || $id == 0) {
            return response()->json($this->responseHelper->getResponseObject(
                'Bad Request',
                400,
                false
            ));
        }

        $storeArticles = Store::findOrFail($id)->articles;

        return (new ArticleResource($storeArticles))
            ->additional([
                'success' => true,
                'total_items' => $storeArticles->count()
            ]);
    }

    /**
     * Get the store information by a given id
     * @param $id
     * @return StoreResource|\Illuminate\Http\JsonResponse
     */
    public function getStore($id)
    {
        $id = (int)$id;

        if (!is_int($id) || $id == 0) {
            return response()->json($this->responseHelper->getResponseObject(
                'Bad Request',
                400,
                false
            ));
        }

        $store = Store::findOrFail($id);

        return (new StoreResource($store))
            ->additional([
                'success' => true
            ]);
    }

    /**
     * Create new store in the database
     * @param CreateStoreRequest $request
     * @return StoreResource
     */
    public function createStore(CreateStoreRequest $request)
    {
        return (new StoreResource(Store::create($request->all())))
            ->additional([
                'success' => true
            ]);
    }

    /**
     * Update store in the database
     * @param CreateStoreRequest $request
     * @return StoreResource
     */
    public function updateStore(CreateStoreRequest $request, $id)
    {
        $store = Store::findOrFail($id);
        $store->fill($request->all())->save();

        return (new StoreResource($store->fresh()))
            ->additional([
                'success' => true
            ]);
    }

    /**
     * Soft delete a store.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteStore($id)
    {
        $id = (int)$id;

        if (!is_int($id) || $id == 0) {
            return response()->json($this->responseHelper->getResponseObject(
                'Bad Request',
                400,
                false
            ));
        }

        $store = Store::findOrFail($id)->delete();

        if ($store) {
            return response()->json($this->responseHelper->getResponseObject(
                'Store with id ' . $id . ' has been deleted.',
                200,
                true
            ));
        }

        return response()->json($this->responseHelper->getResponseObject(
            'There was a problem deleting the store',
            500,
            false
        ));
    }
}
