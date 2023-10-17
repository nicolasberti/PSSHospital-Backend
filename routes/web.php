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


Route::get('/admin/pacientes/editar', AdminController::class .'@show_solicitudes')->name('admin.show_solicitudes');


Route::get('/secretario', SecretarioController::class . '@index')->name('secretario.index');
Route::get('/admin/secretarios', AdminController::class .'@show_secretarios')->name('admin.show_secretarios');
Route::get('/admin/secretarios/create', AdminController::class .'@create_secretarios')->name('admin.create_secretarios');
Route::get('/admin/secretarios/edit/{secretario}', AdminController::class.'@edit_secretario')->name('admin.edit_secretario');
Route::post('admin/edit/{secretario}', AdminController::class. '@update_secretario')->name('update_secretario');
Route::get('/admin/baja_secretarios', AdminController::class .'@show_baja_secretarios')->name('admin.show_baja_secretarios');
Route::get('admin/baja_secretarios/{secretario}', AdminController::class. '@baja_secretario')->name('admin.baja_secretario');
Route::post('admin/create/secretario', AdminController::class. '@create_new_secretario')->name('create_new_secretario');

Route::get('/admin/solicitudes', AdminController::class .'@show_solicitudes')->name('admin.show_solicitudes');


Route::get('/', function () {
    return view('home');
});
