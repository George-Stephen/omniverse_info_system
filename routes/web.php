<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\StudyGroupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/study-groups/create', 'App\Http\Controllers\StudyGroupController@create')->name('study-groups.create');


Route::post('/study-groups', 'App\Http\Controllers\StudyGroupController@store')->name('study-groups.store');

Route::get('/study-groups', 'App\Http\Controllers\StudyGroupController@index')->name('study-groups.index');

Route::get('/study-groups/{id}', 'App\Http\Controllers\StudyGroupController@show')->name('study-groups.show');

Route::get('/study-groups/{id}/edit', 'App\Http\Controllers\StudyGroupController@edit')->name('study-groups.edit');


Route::put('/study-groups/{id}', 'App\Http\Controllers\StudyGroupController@update')->name('study-groups.update');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
