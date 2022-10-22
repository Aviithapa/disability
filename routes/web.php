<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/dashboard', [AdminController::class,'dashboard'])->middleware(['auth']);

Route::get('/dashboard/form', function () {
    return view('admin.pages.form');
})->middleware(['auth'])->name('applicant.form');

Route::post('/save_image/{id?}', [AdminController::class, 'save_image'])->middleware(['auth'])->name('save_image');
Route::post('/form', [AdminController::class, 'save'])->middleware(['auth'])->name('save_applicant');
Route::get('/dashboard/index', [AdminController::class, 'index'])->middleware(['auth'])->name('applicantData');
Route::get('/dashboard/show/{id}', [AdminController::class, 'show'])->middleware(['auth'])->name('view');
Route::get('/dashboard/search', [AdminController::class, 'index'])->middleware(['auth'])->name('view');
Route::get('/dashboard/generateNumber/{id}', [AdminController::class, 'generateCardNumber'])->middleware(['auth'])->name('generateCardNumber');
Route::get('/dashboard/printIndex', [AdminController::class, 'printIndex'])->middleware(['auth'])->name('printIndex');

require __DIR__.'/auth.php';


