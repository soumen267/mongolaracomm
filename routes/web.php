<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/info', function () {
    phpinfo();
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/users/send', [App\Http\Controllers\UserController::class, 'sendMail'])->name('user.send');
Route::get('/users/getData', [App\Http\Controllers\UserController::class, 'getData'])->name('user.getdata');
Route::get('status', [UserController::class, 'userOnlineStatus']);
Route::resource('users', UserController::class);


Route::get('/project/', [App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
Route::get('/project/view/{id}', [App\Http\Controllers\ProjectController::class, 'view'])->name('project.view');
Route::any('/project/store/', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
Route::get('/project/edit/', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/update/', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
Route::post('/project/copy/', [App\Http\Controllers\ProjectController::class, 'copy'])->name('project.copy');
Route::delete('/project/deleteAll/', [App\Http\Controllers\ProjectController::class, 'deleteAll'])->name('project.deleteAll');
Route::any('/project/delete/', [App\Http\Controllers\ProjectController::class, 'delete'])->name('project.delete');
Route::get('/project/assign/', [App\Http\Controllers\ProjectController::class, 'assign'])->name('project.assign');
Route::any('/project/assignstore/', [App\Http\Controllers\ProjectController::class, 'assignproject'])->name('project.assignstore');
Route::get('/project/taskAssign/', [App\Http\Controllers\ProjectController::class, 'taskAssign'])->name('project.taskAssign');
Route::post('/project/addtask/', [App\Http\Controllers\ProjectController::class, 'addtask'])->name('task.store');
Route::get('/task/', [App\Http\Controllers\ProjectController::class, 'taskShow'])->name('task.show');
Route::put('/task/update-items', [App\Http\Controllers\ProjectController::class,'updateItems'])->name('update.items');