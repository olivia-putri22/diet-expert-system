<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DietRecommendationController;

Route::get('/', [DietRecommendationController::class, 'index'])->name('diet.index');
Route::post('/process', [DietRecommendationController::class, 'process'])->name('diet.process');