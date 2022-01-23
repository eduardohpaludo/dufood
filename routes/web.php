<?php

use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PlanDetailController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

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
         * Profiles Routes
         */
        Route::get('profiles/create', [ProfileController::class, 'create'])->name('profiles.create');
        Route::put('profiles/{id}', [ProfileController::class, 'update'])->name('profiles.update');
        Route::get('profiles/{id}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
        Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
        Route::delete('profiles/{id}', [ProfileController::class, 'destroy'])->name('profiles.destroy');
        Route::get('profiles/{id}', [ProfileController::class, 'show'])->name('profiles.show');
        Route::post('profiles', [ProfileController::class, 'store'])->name('profiles.store');
        Route::get('profiles', [ProfileController::class, 'index'])->name('profiles.index');

        /**
         * Plans Details Routes
         */
        Route::get('plans/{url}/details/create', [PlanDetailController::class, 'create'])->name('plan.details.create');
        Route::delete('plans/{url}/details/{id}', [PlanDetailController::class, 'destroy'])->name('plan.details.destroy');
        Route::get('plans/{url}/details/{id}', [PlanDetailController::class, 'show'])->name('plan.details.show');
        Route::put('plans/{url}/details/{id}', [PlanDetailController::class, 'update'])->name('plan.details.update');
        Route::get('plans/{url}/details/{id}/edit', [PlanDetailController::class, 'edit'])->name('plan.details.edit');
        Route::post('plans/{url}/details', [PlanDetailController::class, 'store'])->name('plan.details.store');
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

