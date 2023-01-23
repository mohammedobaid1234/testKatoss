<?php 
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(static function () {

    Route::middleware('guest:admin')->group(static function () {
        Route::get('login', [App\Http\Controllers\Admin\AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('login', [App\Http\Controllers\Admin\AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware(['auth:admin'])->group(static function () {
        Route::post('logout', [\App\Http\Controllers\Admin\AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    });
});