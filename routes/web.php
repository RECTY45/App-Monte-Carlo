<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CarloDController;
use App\Http\Controllers\CarloPDController;
use App\Http\Controllers\CarloRController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

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
Route::prefix('auth')->group( function (){
    Route::controller(LoginController::class)->group(function(){
        Route::get('login','Login')->name('AuthLogin')->middleware('guest');
        Route::resource('register',RegisterController::class);
        Route::post('login','AuthLogin')->name('authenticated');
        Route::post('/logout','logout')->name('logout');
    });

    Route::get('/', function () {
        return redirect('auth/login');
    });
});
Route::get('/', function () {
    return redirect('auth/login');
});

    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']],function (){
        route::get('/',[DashController::class,'dash'])->name('dash.index');
        Route::controller(CarloDController::class)->group(function(){
        route::get('distribusi/creaate','dcreate')->name('dcreate');
        Route::post('distribusi/dstore','dstore')->name('dstore');
        Route::delete('distribusi/{carloPD:id}/ddestroy','ddestroy')->name('ddestroy');
        route::resource('distribusi',CarloDController::class)->parameter('distribusi','carloD');
        });
        route::resource('prediksi',CarloRController::class)->parameter('prediksi','carloR');
    });