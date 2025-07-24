<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('/student')->controller(StudentController::class)->group(function () {
    // Create
    Route::get('/create', 'home')->name('Homepage');
    Route::post('/create/post', 'create')->name('SubmitData');
    // Read
    Route::get('/View','Read')->name('ViewPage');
    //Update
    Route::get('/View/Update/{id}','UpdateView')->name('UpdateViewPage');
    Route::post('/View/Update/{id}','Update')->name('UpdatePage');
    //Delete
    Route::get('/View/delete/{id}','delete')->name('Deletepage');

});
