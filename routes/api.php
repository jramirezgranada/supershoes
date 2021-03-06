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

Route::resource('stores', 'Api\StoreController')->except([
    'create', 'edit'
]);

Route::get('articles/stores/{id}', 'Api\StoreController@getArticlesStore');

Route::resource('articles', 'Api\ArticleController')->except([
    'create', 'edit'
]);

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