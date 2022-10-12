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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


$cronograma = App\Http\Controllers\CronogramaController::class;

Route::get('/home', [$cronograma, 'index'])->name('home');
Route::get('/getAll', [$cronograma, 'getAll'])->name('get.all.cronogramas');
Route::get('/new', [$cronograma, 'create'])->name('create.atividade');
Route::post('/store', [$cronograma, 'store'])->name('store.atividade');
