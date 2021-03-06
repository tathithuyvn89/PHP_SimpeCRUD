<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Controller\Api\ProductController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 Route::prefix('/v1')->group(function(){

   Route::get('products','Api\ProductController@index');
   
   Route::post('products','Api\ProductController@store');
   
   Route::get('products/{product_id}','Api\ProductController@show');
   
   Route::put('products/{product_id}','Api\ProductController@update');
   
   Route::delete('products/{product_id}','Api\ProductController@delete');
   
 });