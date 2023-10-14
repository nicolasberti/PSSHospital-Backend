<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SecretarioController;

use App\Http\Controllers\SessionsController;


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
    return view('home');
})->middleware('auth');


Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

Route::get('/admin', AdminController::class . '@index')->name('admin.index');
Route::get('/medico', MedicosController::class . '@index')->name('medico.index');

Route::get('/paciente', PacienteController::class . '@index')->name('paciente.index');

Route::get('/secretario', SecretarioController::class . '@index')->name('secretario.index');
Route::get('/secretario/pacientes', SecretarioController::class .'@show_pacientes')->name('secretario.show_pacientes');
Route::get('/secretario/pacientes/create', SecretarioController::class .'@create_pacientes')->name('secretario.create_pacientes');

Route::get('/', function () {
    return view('home');
});
