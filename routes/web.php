<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard (redirect by role)
Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }
    $profile = auth()->user()->applicantProfile;
    return view('dashboard', compact('profile'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes ADMIN
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');
    Route::get('/admin/pelamar/{id}', [AdminController::class, 'show'])
        ->name('admin.pelamar.show');
});

// Routes USER — middleware auth saja, cek role di controller
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/biodata', [ApplicantProfileController::class, 'index'])
        ->name('applicant.biodata');
    Route::post('/biodata', [ApplicantProfileController::class, 'update'])
        ->name('applicant.biodata.update');
    Route::post('/biodata/upload-cv', [ApplicantProfileController::class, 'uploadCv'])
        ->name('applicant.upload-cv');
});

Route::get('/admin/pelamar', [AdminController::class, 'pelamarIndex'])
    ->name('admin.pelamar.index');
require __DIR__.'/auth.php';