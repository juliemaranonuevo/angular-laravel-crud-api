<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/check-connection', function () {
    try {
        DB::connection()->getPdo();
       dd('s');
    } catch (\Exception $e) {
        return die("Could not connect to the database.  Please check your configuration. error:" . $e->getMessage() );
    }

    // if (!DB::connection()->getPdo()) {
    //     dd("Connected sucessfully to database.");
    // } else {
    //     $message = "Could not connect to the database.  Please check your configuration. error:";
    //     dd("Could not connect to the database.  Please check your configuration. error:");
    // }
    // return 'User '.$id;
});
