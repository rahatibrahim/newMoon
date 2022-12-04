<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listings;

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
        'heading' => 'Latest Listings',
        'listings' => Listings::all()
    ]);
});

Route::get('/listings/{id}', function($id) {
    return view('listing', [
        'listing' => Listings::find($id)
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

Route::get('/watch', function() {
    return "nothing to watch here";
});