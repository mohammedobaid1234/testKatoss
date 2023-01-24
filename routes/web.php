<?php

use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SectionsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Front\FrontController;
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

Route::get('/',[FrontController::class,'index']);
Route::group(['middleware' => ['auth:admin'],'prefix' => 'admin', ], function(){
    Route::get('/dashboard', [DashboardController::class, 'manage'])->name('dashboard');
    Route::post('/sendEmails', [DashboardController::class, 'sendEmails'])->name('sendEmails');
   
    Route::prefix('contact_us')->as('contact_us.')->group(function() {
        Route::get('/manage', [ContactUsController::class, 'manage'])->name('manage');
        Route::get('/datatable', [ContactUsController::class, 'datatable'])->name('datatable');
    });
    Route::resource('contact_us', ContactUsController::class);

    Route::prefix('settings')->as('settings.')->group(function() {
        Route::get('/manage', [SettingsController::class, 'manage'])->name('manage');
        Route::post('/image-add', [SettingsController::class, 'addImage'])->name('image_add');
    });
    Route::resource('settings', SettingsController::class);

    Route::prefix('sections')->as('sections.')->group(function() {
        Route::get('/manage', [SectionsController::class, 'manage'])->name('manage');
        Route::post('/image-add', [SectionsController::class, 'addImage'])->name('image_add');
    });
    Route::resource('sections', SectionsController::class);

    Route::prefix('news')->as('news.')->group(function() {
        Route::get('/manage', [NewsController::class, 'manage'])->name('manage');
        Route::post('/image-add', [NewsController::class, 'addImage'])->name('image_add');
        Route::delete('/image-remove/{id}', [NewsController::class, 'removeImage'])->name('image_remove');
        Route::post('/user_news/image-add', [NewsController::class, 'addImageForUser'])->name('user_image_add');
        Route::get('/user-images/{id}', [NewsController::class, 'userImages'])->name('user_images');
    });
    Route::resource('news', NewsController::class);

    Route::prefix('services')->as('services.')->group(function() {
        Route::get('/manage', [ServicesController::class, 'manage'])->name('manage');
        Route::post('/image-add', [ServicesController::class, 'addImage'])->name('image_add');
        Route::delete('/image-remove/{id}', [ServicesController::class, 'removeImage'])->name('image_remove');
        Route::post('/user_services/image-add', [ServicesController::class, 'addImageForUser'])->name('user_image_add');
        Route::get('/user-images/{id}', [ServicesController::class, 'userImages'])->name('user_images');
    });
    Route::resource('services', ServicesController::class);

    // require __DIR__.'/auth.php';

});
// Route::prefix('admin')->group(function () {
//     require __DIR__.'/auth.php';
    
// });

