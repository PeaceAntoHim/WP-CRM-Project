<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\SaleController;

Route::middleware('web')->group(function () {
    Route::apiResource('contacts', ContactController::class); // This will not use session or CSRF protection
});

Route::apiResource('contacts.interactions', InteractionController::class)
    ->shallow();  // shallow routing for nested resources

Route::apiResource('contacts.sales', SaleController::class)
    ->shallow();

Route::get('/test', function () {
    return response()->json(['message' => 'Test successful!']);
});
