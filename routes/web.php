<?php

use App\Http\Controllers\PaginasController;
use App\Http\Controllers\PersonaController;
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
Route::get('/info', [PaginasController::class,'info']) ->name('info');
Route::get('/contacto', [PaginasController::class,'contacto'])->name('contacto');
Route::post('/contacto', [PaginasController::class, 'recibeContacto'])->name('recibe-contacto');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('persona', PersonaController::class);
//Route::get('/persona', [PersonaController::class,'index']) ->name('persona.listado');
//Route::get('/persona/create', [PersonaController::class,'create']);
//Route::post('/persona/create', [PersonaController::class,'store']);
