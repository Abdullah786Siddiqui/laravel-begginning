<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\authCheck;
use Illuminate\Support\Facades\Route;


 // main
    Route::view('/home','pages.home')->name('Homepage');




Route::prefix('/student')->controller(StudentController::class)->middleware(authCheck::class)->group(function () {
    // Create
    Route::get('/create', 'formPage')->name('createpage');
    Route::post('/create/post', 'create')->name('SubmitData');
    // Read
    Route::get('/View', 'Read')->name('ViewPage');
    //Update
    Route::get('/View/Update/{id}', 'UpdateView')->name('UpdateViewPage');
    Route::put('/View/Update/{id}', 'Update')->name('UpdatePage');
    //Delete
    Route::get('/View/delete/{id}', 'delete')->name('Deletepage');

    //User Api
    Route::get('/user', 'getuser')->name('UserPage');
});

Route::prefix('/auth')->controller(authController::class)->group(function () {
    // Register
    Route::get('/register', 'showRegister')->name('RegisterPage');
    Route::post('/register', 'registerUser')->name('RegisterForm');
    //Login
    Route::get('/login', 'showlogin')->name('LoginPage');
    Route::post('/login', 'LoginUser')->name('LoginForm');
    // logout
    Route::post('/logout','logout')->name('logoutAction');
});
