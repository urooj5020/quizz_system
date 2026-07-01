<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizzController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [RegisteredUserController::class , 'showUser'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard-overview');


Route::get('/quizz-factory', [QuizzController::class, 'index'])->name('quizz-factory');

Route::get('/factory-of-quizzes', [QuizzController::class, 'cancel'])->name('factory');

Route::get('/new-quizz', [QuizzController::class, 'create'])->name('add-new-quizz');

Route::post('/quizz-info', [QuizzController::class, 'store'])->name('add-quizz-info');

Route::get('/show-quizz/{id}', [QuizzController::class, 'showEach'])->name('show');

Route::get('/quizz-question', [QuestionController::class , 'create'])->name('question');

Route::post('/add-quizz-question', [QuestionController::class, 'store'])->name('add-new-question');

Route::delete('/delete/{id}', [QuizzController::class, 'delete'])->name('delete');

Route::get('/edit/{id}', [QuizzController::class, 'edit'])->name('edit');

Route::put('/update/{id}', [QuizzController::class, 'update'])->name('update-quizz');

Route::get('/add-new-q/{id}', [QuestionController::class, 'addFromExisting'])->name('add-new-q');

Route::get('/edit-question/{id}' , [QuestionController::class , 'edit'])->name('edit-question');

Route::put('/update-question/{id}' , [QuestionController::class , 'update'])->name('update-question');

Route::get('/delete-question/{id}' , [QuestionController::class , 'delete'])->name('delete-question');


Route::get('/users' , [RegisteredUserController::class , 'index'])->name('show-users');

Route::get('/user/{id}' , [RegisteredUserController::class , 'user'])->name('user-info');

Route::patch('/deactivate/{id}' , [RegisteredUserController::class , 'deactivate'])->name('deactivate');

Route::patch('/reactivate/{id}' , [RegisteredUserController::class , 'reactivate'])->name('reactivate');

Route::get('/start-quizz/{id}' , [QuizzController::class , 'startQuizz'])->name('start-quizz');


















