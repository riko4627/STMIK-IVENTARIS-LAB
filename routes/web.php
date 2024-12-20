<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('v1')->group(function () {
    // Routes lab
    Route::prefix('lab')->controller('controller lab' ::class)->group(function () {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('/update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
    });

    // Routes year
    Route::prefix('year')->controller('controller tahun'::class)->group(function () {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('/update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
        Route::get('/export', 'export');
    });

    // Routes category
    Route::prefix('category')->controller('controller Category'::class)->group(function(){
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('/update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
    });

    // Routes inventory
    Route::prefix('inventory')->controller('Controller inventory'::class)->group(function (){
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
        Route::post('/returnborrow/{id}', 'returnBorrow');
    });
});
