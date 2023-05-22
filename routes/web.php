<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\GraphController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
        Route::resource('rooms', RoomController::class);
        Route::resource('room-types', RoomTypeController::class);
        Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    });

    Route::resource('transactions', TransactionController::class);
    Route::get('graphs', [GraphController::class, 'index'])->name('graphs.index');
});

// Auth Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
