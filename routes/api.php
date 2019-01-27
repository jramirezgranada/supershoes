<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('stores', 'Api\StoreController@getStores');
Route::get('stores/{id}', 'Api\StoreController@getStore');
Route::post('stores/create', 'Api\StoreController@createStore');
Route::patch('stores/update/{id}', 'Api\StoreController@updateStore');
Route::get('articles/stores/{id}', 'Api\StoreController@getArticlesStore');

Route::get('articles', 'Api\ArticleController@getArticles');
Route::post('articles/create', 'Api\ArticleController@createArticle');
Route::patch('articles/update/{id}', 'Api\ArticleController@updateArticle');
Route::get('articles/{id}', 'Api\ArticleController@getArticle');

/*
 * Fallback route to override the 404 response, This renders a json response
 * insteadof a 404 view
 */
Route::fallback(function () {
    return response()->json(
        [
            'error_msg' => 'Record not Found.',
            'error_code' => 404,
            'success' => false
        ],
        404);
})->name('fallback');