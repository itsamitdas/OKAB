<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LogoutController;
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

    Route::get('/tenant/add',[TenantController::class, 'create']);
    Route::get('/tenant',[TenantController::class, 'index'])->name('tenant-list');
    Route::get('/tenant/edit/{id}',[TenantController::class, 'edit'])->name('tenant-edit');
    Route::get('/tenant/delete/{id}',[TenantController::class, 'destroy']);
    Route::post('/tenant/store',[TenantController::class, 'store']);
    Route::post('/tenant/update',[TenantController::class, 'update']);
    Route::post('/tenant/search',[TenantController::class, 'search']);

    Route::get('logoutUser',[LogoutController::class, 'logout']);
});
