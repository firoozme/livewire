<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Todo;
use App\Http\Livewire\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', User::class)->name('users');
Route::get('task/user/{id}', Todo::class)->name('user.task');
