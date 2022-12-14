<?php

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



Auth::routes();


$cronograma = App\Http\Controllers\CronogramaController::class;

Route::get('/', [$cronograma, 'index'])->name('home');
Route::get('/getAll', [$cronograma, 'getAll'])->name('get.all.cronogramas');
Route::get('/create', [$cronograma, 'create'])->name('create.atividade');
Route::post('/store', [$cronograma, 'store'])->name('store.atividade');
Route::get('/destroy/{id}', [$cronograma, 'destroy'])->name('destroy.atividade');
