<?php

use App\Http\Controllers\CMS\LabController;
use App\Http\Controllers\CMS\CategoryController;
use App\Http\Controllers\CMS\UserController;
use App\Http\Controllers\CMS\InventoryController;
use App\Http\Controllers\CMS\YearController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.Dashboard');
});
Route::get('/category', function () {
    return view('pages.category');
});
Route::get('/lab', function () {
    return view('pages.lab');
});
Route::get('/year', function () {
    return view('pages.year');
});
Route::get('/inventory', function () {
    return view('pages.inventory');
});

Route::get('/dashboard', function () {
    return view('admin.Dashboard');
});

Route::get('/users', function () {
    return view('pages.users');
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
    Route::prefix('inventory')->controller(InventoryController::class)->group(function () {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
    });

    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('/update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
    });
});
