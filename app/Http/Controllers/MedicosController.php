<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Especialidad;
use App\Models\HorarioDeAtencion;
use App\Models\DiaSemana;
use App\Models\HOrarioDeAtencionDiaSemana;

class MedicosController extends Controller
{
    public function index(){
        return view('medico.index');
    }

    public function index_citas(){
        return view('medico.index_citas');
    }

    public function list() {

        $medicos = Medico::all();
        return view('admin.show_medicos', compact('medicos'));
    }

    public function store(Request $request) {

        $medico = Medico::where('DNI', $request->input('DNI'))->first();

        if ($medico != null) {
            return back()->withErrors([
                'message' => 'Error: Este médico ya está registrado',
            ]);
        }
        $medico = new Medico();

        $medico->username = $request->input('Username');
        $medico->password = $request->input('Password');
        $medico->DNI = $request->input('DNI');
        $medico->name = $request->input('Name');
        $medico->lastName = $request->input('LastName');
        $medico->email = $request->input('Email');
        $medico->phone = $request->input('Phone');
        $medico->estado = "Habilitado";
        $medico->especialidad = $request->input('Specialty');
        $medico->provincia = $request->input('Province');
        $medico->ciudad  = $request->input('City');

        $horarios = new HorarioDeAtencion();
        $horarios->horario_inicio = "08:00:00";
        $horarios->horario_fin = "12:00:00";
        $horarios->duracion = "30";

        $horarios->save();
        $medico->horarios_atencion = $horarios->id;

        foreach (DiaSemana::all() as $diaSemana) {
            $horarios_atencion_dia_semana = new HorarioDeAtencionDiaSemana();
            $horarios_atencion_dia_semana->id_horario_de_atencion = $horarios->id;
            $horarios_atencion_dia_semana->id_dias_semana = $diaSemana->id;
            $horarios_atencion_dia_semana->save();
        }

        $medico->save();

        return redirect('/admin')
            ->with('success','Médico registrado exitosamente')
            ->with('alert','success');
    }

    public function edit($id) {
        $medico = Medico::find($id);
        $especialidades = Especialidad::all();
        return view('admin.edit_medico', compact('medico'), compact('especialidades'));
    }

    public function update(Request $request, $id) {
        $medico = Medico::find($id);

        $medico->password = $request->input('Password');
        $medico->name = $request->input('Name');
        $medico->lastName = $request->input('LastName');
        $medico->email = $request->input('Email');
        $medico->phone = $request->input('Phone');
        $medico->especialidad = $request->input('Specialty');

        $medico->update();

        return redirect('/admin')
            ->with('success','Médico editado exitosamente')
            ->with('alert','success');
    }
}
