<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SiteSettingController;
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


Route::post('/save_image/{id?}', [AdminController::class, 'save_image'])->middleware(['auth'])->name('upload.image');

Route::post('/store_image', [AdminController::class, 'storeImage'])->middleware(['auth'])->name('ckeditor.upload');

Route::get('/dashboard/site-settings', [SiteSettingController::class, 'index'])->middleware(['auth'])->name('siteSettings.index');
Route::get('/dashboard/site-settings/form', [SiteSettingController::class, 'edit'])->middleware(['auth'])->name('siteSettings.edit');
Route::post('/dashbaord/site-settings/update', [SiteSettingController::class, 'UpdateSiteSettings'])->middleware(['auth'])->name('siteSettings.update');

Route::get('/dashboard/news', [NewsController::class, 'index'])->middleware(['auth'])->name('news.index');
Route::get('/dashboard/news/create', [NewsController::class, 'create'])->middleware(['auth'])->name('news.create');
Route::post('/dashboard/news/store', [NewsController::class, 'store'])->middleware(['auth'])->name('news.store');
Route::delete('/dashboard/news/{id}', [NewsController::class, 'destory'])->middleware(['auth'])->name('news.destroy');
Route::get('/dashboard/news/edit/{id}', [NewsController::class, 'edit'])->middleware(['auth'])->name('news.edit');
Route::put('/dashboard/news/update/{id}', [NewsController::class, 'update'])->middleware(['auth'])->name('news.update');

/**
 * PostController
 */

Route::get('/dashboard/post', [PostController::class, 'index'])->middleware(['auth'])->name('post.index');
Route::get('/dashboard/post/create', [PostController::class, 'create'])->middleware(['auth'])->name('post.create');
Route::post('/dashboard/post/store', [PostController::class, 'store'])->middleware(['auth'])->name('post.store');
Route::delete('/dashboard/post/{id}', [PostController::class, 'destory'])->middleware(['auth'])->name('post.destroy');
Route::get('/dashboard/post/edit/{id}', [PostController::class, 'edit'])->middleware(['auth'])->name('post.edit');
Route::put('/dashboard/post/update/{id}', [PostController::class, 'update'])->middleware(['auth'])->name('post.update');

/**
 * AboutContoller
 */

Route::get('/dashboard/about', [AboutController::class, 'index'])->middleware(['auth'])->name('about.index');
Route::post('/dashboard/about/store', [AboutController::class, 'store'])->middleware(['auth'])->name('about.store');
Route::put('/dashboard/about /update/{id}', [AboutController::class, 'update'])->middleware(['auth'])->name('about.update');

/**
 * BannerController
 */
Route::get('/dashboard/banner', [BannerController::class, 'index'])->middleware(['auth'])->name('banner.index');
Route::get('/dashboard/banner/create', [BannerController::class, 'create'])->middleware(['auth'])->name('banner.create');
Route::post('/dashboard/banner/store', [BannerController::class, 'store'])->middleware(['auth'])->name('banner.store');
Route::delete('/dashboard/banner/{id}', [BannerController::class, 'destory'])->middleware(['auth'])->name('banner.destroy');
Route::get('/dashboard/banner/edit/{id}', [BannerController::class, 'edit'])->middleware(['auth'])->name('banner.edit');
Route::put('/dashboard/banner/update/{id}', [BannerController::class, 'update'])->middleware(['auth'])->name('banner.update');

require __DIR__ . '/auth.php';
