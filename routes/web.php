<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DisabilityGroupController;
use App\Http\Controllers\Admin\DisabilityTypeController;
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

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth']);

Route::get('/dashboard/form', function () {
    return view('admin.pages.form');
})->middleware(['auth'])->name('applicant.form');

Route::get('/dashboard/format', function () {
    return view('admin.pages.applicant');
})->middleware(['auth'])->name('applicant.format');


Route::post('/save_image/{id?}', [AdminController::class, 'save_image'])->middleware(['auth'])->name('save_image');
Route::post('/form', [AdminController::class, 'save'])->middleware(['auth'])->name('save_applicant');
Route::match(['get', 'post'], '/dashboard/index', [AdminController::class, 'index'])->middleware(['auth'])->name('applicantData');
Route::get('/dashboard/show/{id}', [AdminController::class, 'show'])->middleware(['auth'])->name('show');
Route::get('/dashboard/view/{id}', [AdminController::class, 'view'])->middleware(['auth'])->name('view');
Route::get('/dashboard/edit/{id}', [AdminController::class, 'edit'])->middleware(['auth'])->name('edit');

Route::get('/dashboard/search', [AdminController::class, 'index'])->middleware(['auth'])->name('search');
Route::get('/dashboard/generateNumber/{id}', [AdminController::class, 'generateCardNumber'])->middleware(['auth'])->name('generateCardNumber');
Route::get('/dashboard/printIndex', [AdminController::class, 'printIndex'])->middleware(['auth'])->name('printIndex');


Route::get('/ward/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('ward.dashboard');
Route::post('/update/status/{id}', [AdminController::class, 'state'])->middleware(['auth'])->name('updated_status');
Route::post('/form/admin/{id}', [AdminController::class, 'updateAdmin'])->middleware(['auth'])->name('admin.save_applicant');

Route::middleware(['auth'])->group(
    function () {
        Route::apiResource('/dashboard/disability-type', DisabilityTypeController::class);
        Route::get('/dashboard/disability-type/create', [DisabilityTypeController::class, 'show'])->name('disability-type.create');
        Route::get('/dashboard/edit/disability-type/{id}', [DisabilityTypeController::class, 'edit'])->name('disability-type.edit');
        Route::apiResource('/dashboard/disability-group', DisabilityGroupController::class);
        Route::get('/dashboard/disability-group/create', [DisabilityGroupController::class, 'show'])->name('disability-group.create');
        Route::get('/dashboard/edit/disability-group/{id}', [DisabilityGroupController::class, 'edit'])->name('disability-group.edit');
    }
);


require __DIR__ . '/auth.php';
