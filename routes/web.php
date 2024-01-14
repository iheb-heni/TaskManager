<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TaskController::class, 'index'])->name('index');
Route::get('/Ajouter_une_Tache', [TaskController::class, 'showAddTaskForm'])->name('Task.add');
Route::post('/', [TaskController::class, 'store'])->name('Task.Store');
Route::post('/update-task/{id}', [TaskController::class, 'update'])->name('Task.Update');
Route::Delete('/tasks/{id}', [TaskController::class, 'DeleteTask'])->name('Task.Delete');





