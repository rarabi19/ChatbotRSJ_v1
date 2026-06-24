<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\DataRuanganController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Registrasi (admin mengundang/menambahkan admin baru)
Route::middleware('auth')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Profile & Admin Management 
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile/edit', [AuthController::class, 'showEditProfile'])->name('profile.edit');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

    // Manajemen Data Ruangan
    Route::delete('/data-ruangan/foto/{foto}', [DataRuanganController::class, 'destroyPhoto'])->name('data-ruangan.foto.destroy');
    Route::resource('data-ruangan', DataRuanganController::class);

    // Admin Dashboard
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::post('/admin/sync', [ChatbotController::class, 'manualSync'])->name('admin.sync');
    Route::delete('/admin/feedback', [ChatbotController::class, 'destroyFeedback'])->name('admin.feedback.destroy');
});

// Chatbot (Public)
Route::get('/', [ChatbotController::class, 'index']);
Route::post('/chat', [ChatbotController::class, 'handleMessage'])->name('chat.handle');
Route::post('/feedback', [ChatbotController::class, 'storeFeedback'])->name('chat.feedback');
