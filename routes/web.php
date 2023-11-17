<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DisabilityGroupController;
use App\Http\Controllers\Admin\DisabilityTypeController;
use App\Http\Controllers\Admin\PrintController;
use FontLib\Table\Type\name;
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
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(
    function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/applicant', ApplicantController::class)->only('create', 'show', 'update', 'edit', 'destroy');
        Route::match(['get', 'post'], '/applicant', [ApplicantController::class, 'index'])->name('applicant.index');
        Route::match(['get', 'post'], '/print', [PrintController::class, 'index'])->name('print.index');
        Route::resource('/print', PrintController::class)->only('create', 'show', 'update', 'edit', 'destroy');
        Route::resource('/dashboard/disability-type', DisabilityTypeController::class)->only('index', 'store', 'update');
        Route::get('/dashboard/disability-type/create', [DisabilityTypeController::class, 'show'])->name('disability-type.create');
        Route::get('/dashboard/edit/disability-type/{id}', [DisabilityTypeController::class, 'edit'])->name('disability-type.edit');
        Route::resource('/dashboard/disability-group', DisabilityGroupController::class)->only('index', 'store', 'update');
        Route::get('/dashboard/disability-group/create', [DisabilityGroupController::class, 'show'])->name('disability-group.create');
        Route::get('/dashboard/edit/disability-group/{id}', [DisabilityGroupController::class, 'edit'])->name('disability-group.edit');
        Route::post('/admin/approve/{id}', [AdminController::class, 'updateAdmin'])->name('admin.approve');
    }
);

Route::post('/save_image/{id?}', [AdminController::class, 'save_image'])->middleware(['auth'])->name('save_image');
Route::match(['get', 'post'], '/dashboard/index', [AdminController::class, 'index'])->middleware(['auth'])->name('applicantData');
Route::get('/dashboard/generateNumber/{id}', [AdminController::class, 'generateCardNumber'])->middleware(['auth'])->name('generateCardNumber');
Route::match(['get', 'post'], '/dashboard/printIndex', [AdminController::class, 'printIndex'])->middleware(['auth'])->name('printIndex');




require __DIR__ . '/auth.php';
