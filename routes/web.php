<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\StaffPlacementController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // MAHASISWA
    Route::middleware('role:mahasiswa')
        ->prefix('mahasiswa')
        ->name('mahasiswa.')
        ->group(function () {
            Route::get('/submissions', [SubmissionController::class, 'index'])->name('submissions.index');
            Route::get('/submissions/create', [SubmissionController::class, 'create'])->name('submissions.create');
            Route::post('/submissions', [SubmissionController::class, 'store'])->name('submissions.store');
            Route::get('/submissions/{submission}', [SubmissionController::class, 'show'])->name('submissions.show');
            Route::delete('/submissions/{submission}', [SubmissionController::class, 'destroy'])->name('submissions.destroy');
            Route::get('/submissions/{submission}/download', [LetterController::class, 'download'])->name('submissions.download');
        });

    // KAPRODI
    Route::middleware('role:kaprodi')
        ->prefix('kaprodi')
        ->name('kaprodi.')
        ->group(function () {
            Route::get('/approvals', [ApprovalController::class, 'index'])->name('approvals.index');
            Route::get('/approvals/{submission}', [ApprovalController::class, 'show'])->name('approvals.show');
            Route::patch('/approvals/{submission}/approve', [ApprovalController::class, 'approve'])->name('approvals.approve');
            Route::patch('/approvals/{submission}/reject', [ApprovalController::class, 'reject'])->name('approvals.reject');
        });

    // TATA USAHA
    Route::middleware('role:tata_usaha')
        ->prefix('manager/letters')
        ->name('manager.letters.')
        ->group(function () {
            Route::get('/', [LetterController::class, 'index'])->name('index');
            Route::get('/{submission}/upload', [LetterController::class, 'upload'])->name('upload');
            Route::post('/{submission}/store', [LetterController::class, 'store'])->name('store');
            Route::get('/{submission}/preview', [LetterController::class, 'preview'])->name('preview');
            Route::get('/{submission}/download', [LetterController::class, 'download'])->name('download');
            Route::post('/{submission}/generate', [LetterController::class, 'generateAndSave'])->name('generate');
        });

    // ADMIN
    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // Users
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users', [UserController::class, 'store'])->name('users.store');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

            // Prodi
            Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
            Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
            Route::post('/prodi', [ProdiController::class, 'store'])->name('prodi.store');
            Route::get('/prodi/{prodi}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');
            Route::patch('/prodi/{prodi}', [ProdiController::class, 'update'])->name('prodi.update');
            Route::delete('/prodi/{prodi}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

            // Letter Types
            Route::get('/letter-types', [LetterTypeController::class, 'index'])->name('letter-types.index');
            Route::get('/letter-types/create', [LetterTypeController::class, 'create'])->name('letter-types.create');
            Route::post('/letter-types', [LetterTypeController::class, 'store'])->name('letter-types.store');
            Route::get('/letter-types/{letterType}/edit', [LetterTypeController::class, 'edit'])->name('letter-types.edit');
            Route::patch('/letter-types/{letterType}', [LetterTypeController::class, 'update'])->name('letter-types.update');
            Route::delete('/letter-types/{letterType}', [LetterTypeController::class, 'destroy'])->name('letter-types.destroy');

            // Staff Placements
            Route::get('/staff-placements', [StaffPlacementController::class, 'index'])->name('staff-placements.index');
            Route::get('/staff-placements/create', [StaffPlacementController::class, 'create'])->name('staff-placements.create');
            Route::post('/staff-placements', [StaffPlacementController::class, 'store'])->name('staff-placements.store');
            Route::delete('/staff-placements/{staffPlacement}', [StaffPlacementController::class, 'destroy'])->name('staff-placements.destroy');
        });
});

require __DIR__.'/auth.php';
