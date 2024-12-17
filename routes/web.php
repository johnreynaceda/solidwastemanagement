<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    switch (auth()->user()->user_type) {
        case 'superadmin':
            return redirect()->route('superadmin.dashboard');
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'complainant':
            return redirect()->route('complainant.dashboard');
        
        default:
            # code...
            break;
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('superadmin')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('superadmin.dashboard');
    })->name('superadmin.dashboard');
    Route::get('/barangay', function () {
        return view('superadmin.barangay');
    })->name('superadmin.barangay');
    Route::get('/purok', function () {
        return view('superadmin.purok');
    })->name('superadmin.purok');
    Route::get('/waste', function () {
        return view('superadmin.waste');
    })->name('superadmin.waste');
    Route::get('/violation', function () {
        return view('superadmin.violation');
    })->name('superadmin.violation');
    Route::get('/users', function () {
        return view('superadmin.users');
    })->name('superadmin.users');
    Route::get('/reports', function () {
        return view('superadmin.reports');
    })->name('superadmin.reports');
});


Route::prefix('complainant')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('complainant.dashboard');
    })->name('complainant.dashboard');
    Route::get('/complaint', function () {
        return view('complainant.complaint');
    })->name('complainant.complaint');
    Route::get('/records', function () {
        return view('complainant.records');
    })->name('complainant.records');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/complaints', function () {
        return view('admin.complaints');
    })->name('admin.complaints');
    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('admin.reports');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
