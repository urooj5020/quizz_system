<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizzController;
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


Route::get('/quizz-factory' , [QuizzController::class, 'index'])->name('quizz-factory');

Route::get('/new-quizz' , function(){
    return view('admin.form');
})->name('add-new');

Route::post('/quizz-info' , [QuizzController::class , 'create'])->name('add-quizz-info');

Route::get('/show-quizz/{id}' , [QuizzController::class, 'showEach' ])->name('show');

Route::get('/quizz-question' , function(){
    return view('admin.question');
})->name('question');
Route::post('/add-quizz-question' , [QuestionController::class , 'create'])->name('add-new-question');
