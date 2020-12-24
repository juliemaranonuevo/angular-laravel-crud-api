<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

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

Route::get('/check-connection', function () {
    // try {
    //     DB::connection()->getPdo();
    //     return "Connected sucessfully to database.";
    // } catch (\Exception $e) {
    //     $message = "Could not connect to the database.  Please check your configuration. error:" .$e->getMessage();
    //     return $message;
    // }
        
    // try {
    //     DB::connection()->getPdo();
    //     return response()->json("Connected sucessfully to database.");
    // } catch (\Exception $e) {
    //     $message = "Could not connect to the database.  Please check your configuration. error:" .$e->getMessage();
    //     return $message;
    // }


    // if (DB::connection()->getPdo()) {
    //     return response()->json("Connected sucessfully to database.");
    // } else if (!DB::connection()->getPdo()) {
    //     $message = "Could not connect to the database.  Please check your configuration. error:";
    //     return response()->json("Could not connect to the database.  Please check your configuration. error:");
    // }

    return response()->json(DB::connection()->getPdo());
});

Route::get('/users', 'AccountController@index');
Route::get('/users/create', 'AccountController@isExistsProductCode');
Route::post('/users/create', 'AccountController@addAccount');
Route::get('/users/{id}', 'AccountController@show');


