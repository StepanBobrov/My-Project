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

Route::get('/', 'StuffController@main')->name('welcome');

Route::get('/stuff/games', 'StuffController@games')->name('games');
Route::get('/stuff/games/{id}', 'StuffController@game')->name('game');




Route::get('/newStuff', function() {
    return view('newStuff');
})->name('newStuff');

Route::post('/adminPanel/stuffs/submit', 'StuffController@submit')->name('submit');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/adminPanel', 'AdminController@main')->name('admin');
Route::get('/adminPanel/users', 'AdminController@users')->name('users_A');
Route::get('/adminPanel/users/{id}', 'AdminController@usersDel')->name('users_ADel');

Route::get('/adminPanel/stuffs', 'AdminController@stuffs')->name('stuffs_A');
Route::get('/adminPanel/stuffs/new', 'AdminController@newstuff')->name('stuff_ANew');
Route::get('/adminPanel/stuffs/{id}/edit', 'AdminController@editStuff')->name('stuff_AEdit');
Route::post('/adminPanel/stuffs/{id}/edit/submit', 'AdminController@updateStuffSubmit')->name('stuff_AUpdateSubmit');
Route::get('/adminPanel/stuffs/{id}', 'AdminController@stuffsDel')->name('stuff_ADel');


Route::get('/send-email', 'FeedbackController@send')->name('sendMsg');


Route::post('/get-product-{id}', 'BasketController@add')->name('inBasket');
Route::get('/my-basket', 'BasketController@storage')->name('basket');
Route::get('/my-basket/delete/{id}', 'BasketController@basketDel')->name('basket_Del');
Route::post('/my-basket/update/{id}', 'BasketController@basketUpdate')->name('basket_Update');

Route::get('/review/{id}', 'ReviewController@newReview')->name('new-review');
Route::post('/review/{id}/send', 'ReviewController@sendReview')->name('send-review');

Route::post('/get-rating', 'RatingController@rating')->name('rating');

Route::get('/positive-{id}{product_id}', 'RatingController@positive')->name('positive');
Route::get('/negative-{id}{product_id}', 'RatingController@negative')->name('negative');

Route::get('/drop', function () {
    Schema::drop('baskets');
    return '1';
})->name('drop');





