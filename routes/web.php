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
Route::get('/medico/citas/{id}', [MedicosController::class, 'index_citas'])->name('medico.index_citas');
Route::get('/medico/citas/cancelar/{id}', [MedicosController::class, 'cancelarCita'])->name('medico.cancelarCita');

Route::get('/paciente/{username}', PacienteController::class . '@index')->name('paciente.index');
Route::get('/paciente/mis-datos/{username}', PacienteController::class . '@datos')->name('mis-datos-paciente');
Route::get('/paciente/create_cita/{id}', PacienteController::class . '@cita')->name('paciente.newcita');
Route::post('/paciente/create_cita/{id}/medico', PacienteController::class . '@cita_medico')->name('paciente.newcita_medico');
Route::post('/paciente/create_cita/{id}/medico/date', PacienteController::class . '@cita_medico_date')->name('paciente.newcita_medico_date');

Route::get('/paciente/mis_citas/{id}', PacienteController::class . '@mis_citas')->name('paciente.mis_citas');
Route::get('/paciente/mis_fichas/{id}', PacienteController::class . '@mis_fichas')->name('paciente.mis_fichas');
Route::post('/paciente/cancelar/{id_cita}/{id_paciente}', PacienteController::class . '@cancelar_cita')->name('cita.cancelar');

Route::get('/admin/pacientes/editar', AdminController::class .'@show_solicitudes')->name('admin.show_solicitudes');


Route::get('/secretario', SecretarioController::class . '@index')->name('secretario.index');
Route::get('/admin/secretarios', AdminController::class .'@show_secretarios')->name('admin.show_secretarios');
Route::get('/admin/secretarios/create', AdminController::class .'@create_secretarios')->name('admin.create_secretarios');
Route::get('/admin/secretarios/edit/{secretario}', AdminController::class.'@edit_secretario')->name('admin.edit_secretario');
Route::post('admin/edit/{secretario}', AdminController::class. '@update_secretario')->name('update_secretario');
Route::get('/admin/baja_secretarios', AdminController::class .'@show_baja_secretarios')->name('admin.show_baja_secretarios');
Route::get('admin/baja_secretarios/{secretario}', AdminController::class. '@baja_secretario')->name('admin.baja_secretario');
Route::get('admin/baja_secretarios/{secretario}', AdminController::class. '@alta_secretario')->name('admin.alta_secretario');
Route::post('admin/create/secretario', AdminController::class. '@create_new_secretario')->name('create_new_secretario');

Route::get('/admin/solicitudes', AdminController::class .'@show_solicitudes')->name('admin.show_solicitudes');
Route::get('/admin/editar-datos-criticos-paciente/{solicitud}', AdminController::class.'@edit_datos_criticos_paciente')->name('admin.edit_datos_criticos_paciente');
Route::get('/admin/guardar-datos-criticos-paciente/{$id}', AdminController::class .'@update_datos_criticos_paciente')->name('admin.update_datos_criticos_paciente');

Route::get('/admin/medicos/create', AdminController::class .'@create_medico')->name('admin.create_medico');
Route::post('/admin', [MedicosController::class, 'store']);
Route::get('/admin/perfil', [AdminController::class, 'show'])->name('admin.show_admin');
Route::get('/admin/medicos', MedicosController::class .'@list')->name('admin.show_medicos');
Route::get('/admin/medicos/{id}/edit', MedicosController::class .'@edit')->name('admin.edit_medico');
Route::put('/admin/medicos/{id}/', MedicosController::class .'@update')->name('admin.update_medico');
Route::get('/secretario/pacientes', SecretarioController::class .'@show_pacientes')->name('secretario.show_pacientes');
Route::get('/secretario/pacientes/create', SecretarioController::class .'@create_pacientes')->name('secretario.create_pacientes');
Route::post('/secretario/pacientes/create', PacienteController::class . '@store')->name('paciente.store');
Route::get('/secretario/pacientes/{id}/edit', PacienteController::class .'@edit')->name('secretario.edit_paciente');
Route::put('/secretario/pacientes/{id}/', PacienteController::class .'@update')->name('secretario.update_paciente');
Route::get('/admin/baja_secretarios', AdminController::class .'@show_baja_secretarios')->name('admin.show_baja_secretarios');
Route::get('/secretario/baja_pacientes/{paciente}', PacienteController::class. '@destroy')->name('secretario.baja_paciente');
Route::get('/secretario/pacientes/new_cita', SecretarioController::class .'@new_cita')->name('secretario.new_cita');
Route::post('/secretario/pacientes/new_cita/medico', SecretarioController::class .'@new_cita_fecha_medico')->name('secretario.new_cita_fecha_medico');
Route::post('/secretario/pacientes/new_cita/medico/horarios', SecretarioController::class .'@new_cita_horarios_medico')->name('secretario.new_cita_horarios_medico');

Route::get('/admin/medicos/horarios', AdminController::class .'@index_horarios_medicos')->name('admin.index_horarios_medicos');
Route::get('/admin/medicos/horarios/{id}/show', AdminController::class .'@show_horarios_medico')->name('admin.show_horarios_medico');
Route::get('/admin/medicos/horarios/{id}/edit', AdminController::class .'@edit_horarios_medico')->name('admin.edit_horarios_medico');
Route::put('/admin/medicos/horarios/{id}/', MedicosController::class .'@update_horarios_medico')->name('admin.update_horarios_medico');

Route::get('/admin/citas/agregar_cita/select_medico', AdminController::class .'@select_medico_agregar_cita')->name('admin.select_medico_agregar_cita');
Route::get('/admin/citas/agregar_cita/select_fecha/{id}', [AdminController::class, 'select_fecha_atencion_agregar_cita'])->name('admin.select_fecha_atencion_agregar_cita');
Route::get('/admin/citas/consultar_citas_paciente', AdminController::class .'@select_paciente_consultar_citas')->name('admin.select_paciente_consultar_citas');
Route::get('/admin/citas/consultar_citas_paciente/{dni}', [AdminController::class, 'show_paciente_citas'])->name('admin.show_paciente_citas');
Route::get('/admin/citas/cancelar_citas_paciente', AdminController::class .'@select_paciente_cancelar_citas')->name('admin.select_paciente_cancelar_citas');
Route::get('/admin/citas/cancelar_citas_paciente/{dni}', [AdminController::class, 'show_paciente_cancelar_citas'])->name('admin.show_paciente_cancelar_citas');
Route::get('/admin/citas/cancelar_citas_paciente/cita/{id}', [AdminController::class, 'cancelarCita'])->name('admin.cancelarCita');



Route::get('/', function () {
    return view('home');
});
