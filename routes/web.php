<?php

use App\Http\Controllers\AuthManagerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// home page
Route::get('/', [AuthManagerController::class, 'view'])->name('home');
// login
Route::get('/login', [AuthManagerController::class, 'login'])->name('login');
Route::post('/login-post', [AuthManagerController::class, 'loginPost'])->name('login.post');
// Registration
Route::get('/registration', [AuthManagerController::class, 'registration'])->name('registration');
Route::post('/registration-post', [AuthManagerController::class, 'registrationPost'])->name('registration.post');
// logout
Route::get('/logout', [AuthManagerController::class, 'logout'])->name('logout');
// Authorization
Route::group(['middleware' => 'auth'], function () {
    Route::get('/index', [AuthManagerController::class, 'index'])->name('index');
    Route::get('/profile', function() {
        return "Hi";
    });
});

// To do list Routers
// 1. save post
Route::post('/save-task', [AuthManagerController::class, 'saveTask'])->name('save-task');
Route::get('/delete-task/{id}', [AuthManagerController::class, 'deleteTask'])->name('deleteTask');
Route::get('/update-task/{id}', [AuthManagerController::class, 'updateTask'])->name('updateTask');
Route::post('/save-updated-task', [AuthManagerController::class, 'saveUpdatedTask'])->name('saveUpdatedTask');
Route::get('/update-taskList', [AuthManagerController::class, 'TaskList'])->name('TaskList');

