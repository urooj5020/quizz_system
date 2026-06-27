<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::get('/admin-dashboard' , function(){
     return view('admin.dashboard');
})->name('dashboard-overview');


Route::get('/quizz-factory' , function(){
     return view('admin.quizzFactory');
})->name('quizz-factory');

Route::get('/new-quizz' , function(){
    return view('admin.form');
})->name('add-new');