<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Biodata & CV
    Route::get('/biodata', [ApplicantProfileController::class, 'index'])
        ->name('applicant.biodata');
    Route::post('/biodata', [ApplicantProfileController::class, 'update'])
        ->name('applicant.biodata.update');
    Route::post('/biodata/upload-cv', [ApplicantProfileController::class, 'uploadCv'])
        ->name('applicant.upload-cv');
});
require __DIR__.'/auth.php';
