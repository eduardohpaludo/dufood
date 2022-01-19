<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PlanDetailController;
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

Route::prefix('admin')
    ->group(function(){

        /**
         * Plans Details Routes
         */
        Route::delete('plans/{url}/details/{id}', [PlanDetailController::class, 'destroy'])->name('plan.details.destroy');
        Route::get('plans/{url}/details/{id}', [PlanDetailController::class, 'show'])->name('plan.details.show');
        Route::put('plans/{url}/details/{id}', [PlanDetailController::class, 'update'])->name('plan.details.update');
        Route::get('plans/{url}/details/{id}/edit', [PlanDetailController::class, 'edit'])->name('plan.details.edit');
        Route::post('plans/{url}/details', [PlanDetailController::class, 'store'])->name('plan.details.store');
        Route::get('plans/{url}/details/create', [PlanDetailController::class, 'create'])->name('plan.details.create');
        Route::get('plans/{url}/details', [PlanDetailController::class, 'index'])->name('plan.details.index');

        /**
         * Plans Routes
         */
        Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
        Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
        Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
        Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
        Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
        Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
        Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
        Route::get('plans', [PlanController::class, 'index'])->name('plans.index');

        /**
         * Home Dashboard Routes
         */
        Route::get('/', [PlanController::class, 'index'])->name('admin.index');
    });

