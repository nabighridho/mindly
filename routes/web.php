<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DailyMoodController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MoodJournalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SelfCheckController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\SelfcheckQuestionController as AdminSelfcheckQuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingController::class)->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/daily-mood', [DailyMoodController::class, 'create'])->name('daily-mood.create');
    Route::post('/daily-mood', [DailyMoodController::class, 'store'])->name('daily-mood.store');

    Route::resource('journals', MoodJournalController::class)->except('show');

    Route::get('/self-check', [SelfCheckController::class, 'create'])->name('self-check.create');
    Route::post('/self-check', [SelfCheckController::class, 'store'])->name('self-check.store');
    Route::get('/self-check/results/{result}', [SelfCheckController::class, 'show'])->name('self-check.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    Route::middleware('is_admin')->group(function () {
        Route::get('/admin', AdminDashboardController::class)->name('admin.dashboard');
        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

        Route::get('/admin/self-check/questions', [AdminSelfcheckQuestionController::class, 'index'])->name('admin.selfcheck-questions.index');
        Route::post('/admin/self-check/questions', [AdminSelfcheckQuestionController::class, 'store'])->name('admin.selfcheck-questions.store');
        Route::put('/admin/self-check/questions/{selfcheckQuestion}', [AdminSelfcheckQuestionController::class, 'update'])->name('admin.selfcheck-questions.update');
        Route::delete('/admin/self-check/questions/{selfcheckQuestion}', [AdminSelfcheckQuestionController::class, 'destroy'])->name('admin.selfcheck-questions.destroy');
    });
});
