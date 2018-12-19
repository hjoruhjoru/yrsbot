<?php
use App\BotMan\Conversations\OnboardingConversation;
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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'Profile\ProfileController@profile')->name('profile')->middleware('auth');
Route::post('/profile/update', 'Profile\ProfileController@update')->middleware('auth');
Route::get('/response', 'Response\ModelUploadController@index')->name('response')->middleware('auth');
Route::post('/response/update', 'Response\ModelUploadController@updateQapair')->middleware('auth');
Route::match(['get', 'post'], '/botman', 'BotManController@handle');
