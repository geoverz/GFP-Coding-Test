<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user-stories', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/', [IssueController::class, 'index'])->name('issues.index');
    Route::get('/issues/{owner}/{repo}/{id}', [IssueController::class, 'show'])->name('issues.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
