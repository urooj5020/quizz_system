<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizzController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| 1. GUEST / PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| 2. USER AUTHENTICATED CORE DASHBOARD & PROFILE MATRIX
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [RegisteredUserController::class, 'showUser'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//  3. PUBLIC FRONTEND QUIZ 


Route::get('/start-quizz/{id}', [QuestionController::class, 'startQuizz'])->name('start-quizz');
Route::get('/show-quizz-question', [QuestionController::class, 'showQuestion'])->name('show-quizz-question');
Route::post('/submit-answer', [QuestionController::class, 'submitAnswer'])->name('submit-answer');
Route::get('/quizz-completed', [QuestionController::class, 'quizzCompletion'])->name('quizz-complete');
Route::get('/review', [QuestionController::class, 'review'])->name('review');
Route::get('/evaluation-complete', [QuestionController::class, 'evaluation'])->name('evaluation-complete');



// 4. PROTECTED ADMINISTRATIVE 

Route::middleware(['auth'])->group(function () {

    // --- System Control Panels ---
    Route::get('/admin-dashboard', [QuizzController::class, 'adminData'])->name('dashboard-overview');
    Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware('can:access-admin');
    Route::get('/admin-detail', [RegisteredUserController::class, 'adminDetail'])->name('admin-detail');
    // --- User Management Node Matrices ---
    Route::get('/users', [RegisteredUserController::class, 'index'])->name('show-users');
    Route::get('/user/{id}', [RegisteredUserController::class, 'user'])->name('user-info');
    Route::patch('/deactivate/{id}', [RegisteredUserController::class, 'deactivate'])->name('deactivate');
    Route::patch('/reactivate/{id}', [RegisteredUserController::class, 'reactivate'])->name('reactivate');

    // --- Quiz Management Node Clusters ---
    Route::get('/quizz-factory', [QuizzController::class, 'index'])->name('quizz-factory');
    Route::get('/factory-of-quizzes', [QuizzController::class, 'cancel'])->name('factory');
    Route::get('/new-quizz', [QuizzController::class, 'create'])->name('add-new-quizz');
    Route::post('/quizz-info', [QuizzController::class, 'store'])->name('add-quizz-info');
    Route::get('/show-quizz/{id}', [QuizzController::class, 'showEach'])->name('show');
    Route::get('/edit/{id}', [QuizzController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [QuizzController::class, 'update'])->name('update-quizz');
    Route::delete('/delete/{id}', [QuizzController::class, 'delete'])->name('delete');

    // --- Evaluation Question Vector Operations ---
    Route::get('/quizz-question', [QuestionController::class, 'create'])->name('question');
    Route::post('/add-quizz-question', [QuestionController::class, 'store'])->name('add-new-question');
    Route::get('/add-new-q/{id}', [QuestionController::class, 'addFromExisting'])->name('add-new-q');
    Route::get('/edit-question/{id}', [QuestionController::class, 'edit'])->name('edit-question');
    Route::put('/update-question/{id}', [QuestionController::class, 'update'])->name('update-question');
    Route::get('/delete-question/{id}', [QuestionController::class, 'delete'])->name('delete-question');

    // --- Category Management Modules ---
    Route::get('category', [CategoryController::class, 'index'])->name('categories');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('add-category');
    Route::post('/save-category', [CategoryController::class, 'add'])->name('save-category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
    Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('update-category');

});

/*
|--------------------------------------------------------------------------
| 5. INTERNAL AUTHENTICATION SUBSYSTEM VECTORS (Laravel Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
