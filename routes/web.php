<?php

use Illuminate\Http\Request;
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
    return view('listings', [
        'heading' => "latest listings",
        'listings' => [
            'id' => 1,
            'title' => 'Listings one',
            'description' => "i can't think of any description!"
        ]
    ]);
});

Route::get('/welcome', function() {
    return 'welcome to laravel';
});

Route::get('/posts/{id}', function($id) {
    return 'you have posted ' . $id;
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request) {
    //dd($request);
    return $request->name . ' ' . $request->city;
});