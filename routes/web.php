<?php

use App\Http\Livewire\Calculations;
use App\Http\Livewire\DecissionSupportSystem;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/decission-support-system', DecissionSupportSystem::class)->middleware(['auth'])->name('decission-support-system');
Route::get('/decission-support-system/{project}', DecissionSupportSystem::class)->middleware(['auth'])->name('project.show');
// Route::get('/calculations', Calculations::class)->middleware(['auth'])->name('calculations');

