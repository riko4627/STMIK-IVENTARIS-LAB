<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CMS\LabController;
use App\Http\Controllers\CMS\CategoryController;
use App\Http\Controllers\CMS\UserController;
use App\Http\Controllers\CMS\InventoryController;
use App\Http\Controllers\CMS\YearController;

use Illuminate\Support\Facades\Route;


Route::post('v1/login', [AuthController::class, 'login']);
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
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
    Route::get('/users', function () {
        return view('pages.users');
    })->middleware('role:super admin');

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
            Route::get('/history', 'getHistory');
        });

        Route::prefix('users')->controller(UserController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });
        Route::post('logout', [AuthController::class, 'logout']);
    });
});
