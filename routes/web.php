<?php

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

Auth::routes();


Route::get('/home', 'JabirController@index')->name('home');
Route::get('/submit/token', 'JabirController@submitToken')->name('submit.token');
Route::post('/submit/token/sub', 'JabirController@submitTokenCre')->name('submit.tokensub');
Route::post('/submit/token/deposit', 'JabirController@submitTokenDeposit')->name('submit.deposit');
Route::get('/token/all', 'JabirController@allToken')->name('all.token');
Route::get('/token/all/view/{id}', 'JabirController@TokenDetails')->name('TokenDetails.token');
Route::post('/token/all/view/reply', 'JabirController@tokensub_reply')->name('tokensub.reply');
Route::get('/token/all/view/reply/download/{image}', 'JabirController@image_Download')->name('comment.image.download');
Route::post('/token/all/view/deposit/update', 'JabirController@dep_update')->name('dep.update');

Route::get('/token/all/admin', 'AdminController@alltickets_admin')->name('all.token.admin');
Route::get('/token/all/admin/solve', 'AdminController@alltickets_solve')->name('all.token.solve');
Route::get('/token/all/admin/view/{id}', 'AdminController@alltickets_view')->name('TokenDetails.token.view');
Route::post('/token/all/admin/view/submit', 'AdminController@alltickets_view_submit')->name('tokensub.admin.sub');
Route::post('/admin/permission', 'AdminController@permission')->name('permission');
