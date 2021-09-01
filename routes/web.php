<?php

use App\Http\Controllers\C_User;
use App\Http\Middleware\AuthenticationCheck;
use App\Http\Middleware\HasLoggedInCheck;
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


Route::middleware(AuthenticationCheck::class)->group(function () {
    Route::get('/', [C_User::class, 'dashboard']);
    Route::get('/edit-profile', [C_User::class, 'editProfile']);
    Route::post('/edit-profile', [C_User::class, 'editProfileProcess']);
});

//Route::get('/', 'C_Mutation')->name('dashboard');

Route::middleware(HasLoggedInCheck::class)->group(function () {
    Route::get('/login', [C_User::class, 'login']);
    Route::post('/login', [C_User::class, 'loginProcess']);
    Route::post('/register', [C_User::class, 'register']);
    Route::get('/verify-account', [C_User::class, 'verifyAccount']);
    Route::post('/verify-account', [C_User::class, 'verifyAccountProcess']);
});

// Route::get('/', [C_Mutation::class, 'total'] );

Route::get('/logout', [C_User::class, 'logout']);

