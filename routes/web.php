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

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';

    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');
    
    // Users
    Route::get('users', $controller_path. '\pages\Users@index')->name('pages-users');
    Route::get('/user/create', $controller_path . '\pages\Users@create')->name('pages-users-create');
    Route::post('/users/store', $controller_path . '\pages\Users@store')->name('pages-users-store');
    Route::get('/users/show/{user_id}', $controller_path. '\pages\Users@show')->name('pages-user-show');
    Route::post('/users/update', $controller_path. '\pages\Users@update')->name('pages-user-update');
    Route::get('/users/destroy/{user_id}', $controller_path. '\pages\Users@destroy')->name('pages-user-destroy');

});
