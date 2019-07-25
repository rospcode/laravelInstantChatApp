<?php
use App\Events\NewMessages;
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

Route::get('/test',function(){
  event(new NewMessages('siya','sithole'));
});

Route::get('/chat/{id?}','HomeController@chat');
Route::post('/sendmess','HomeController@send')->name('sendmessage');
Route::get('/home', 'HomeController@index')->name('home');
