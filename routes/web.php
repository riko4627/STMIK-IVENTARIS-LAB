<?php

use App\Http\Controllers\CMS\LabController;
use App\Http\Controllers\CMS\CategoryController;
use App\Http\Controllers\CMS\YearController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.Dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.Dashboard');
});

Route::get('/user', function () {
    return view('admin.User');
});

Route::prefix('v1')->group(function () {
    // Routes lab
    Route::prefix('lab')->controller(LabController::class)->group(function () {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('/update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
    });

    // Routes year
    Route::prefix('year')->controller(YearController::class)->group(function () {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('/update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
        Route::get('/export', 'export');
    });

    // Routes category
    Route::prefix('category')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('/update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
    });

    // Routes inventory
    Route::prefix('inventory')->controller('Controller inventory'::class)->group(function () {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
        Route::post('/returnborrow/{id}', 'returnBorrow');
    });
});
