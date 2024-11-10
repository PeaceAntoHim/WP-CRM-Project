<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;


Route::get('/health', function () {
    return response()->json(['message' => 'OK']);
});
Route::resource('contacts', ContactController::class);
Route::resource('interactions', InteractionController::class);
Route::resource('sales', SaleController::class);
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
