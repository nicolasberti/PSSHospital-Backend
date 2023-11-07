<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Especialidad;
use App\Models\HorarioDeAtencion;
use App\Models\DiaSemana;
use App\Models\HOrarioDeAtencionDiaSemana;
use App\Models\PacienteMedico;
use Illuminate\Support\Facades\Auth;
use App\Models\Paciente;

class MedicosController extends Controller
{
    public function index(){
        return view('medico.index');
    }

    public function index_citas(string $id){
        $citas = PacienteMedico::where('id_medico', $id)->get();
        return view('medico.index_citas', ['citas' => $citas]);
    }

    public function cancelarCita(string $id){
        $cita = PacienteMedico::find($id);
        $cita->state = 'cancelada';
        $cita->save();
        $medico = Medico::find($cita->id_medico); 
        return redirect()->route('medico.index_citas', ['id' => $medico->id]);
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

    public function update_horarios_medico(Request $request, $id) {
        $medico = Medico::find($id);
        $horarios = HorarioDeAtencion::find($medico->horarios_atencion);
        $horarios_atencion_dia_semana = HorarioDeAtencionDiaSemana::where('id_horario_de_atencion', $medico->horarios_atencion)->get();
        HorarioDeAtencionDiaSemana::where('id_horario_de_atencion', $horarios->id)->delete();

        $horarios->horario_inicio = $request->input('horario_inicio');
        $horarios->horario_fin = $request->input('horario_fin');
        $horarios->duracion = $request->input('duracion');
        $horarios->update();

        foreach ($request->dias as $diaSemana) {
            $horarios_atencion_dia_semana = new HorarioDeAtencionDiaSemana();
            $horarios_atencion_dia_semana->id_horario_de_atencion = $horarios->id;
            $horarios_atencion_dia_semana->id_dias_semana = DiaSemana::where('dia',$diaSemana)->first()->id;
            $horarios_atencion_dia_semana->save();
        }

        return redirect('/admin')
            ->with('success','Horario editado exitosamente')
            ->with('alert','success');
    }
    public function consultar_ficha_medica(){
        return view('medico.consultar_ficha_paciente');
    }

    public function consultar_ficha_paciente(Request $request){
        $request->validate([
            'dni' => [
                'required',
                'regex:/^\d{8}$/',
            ],
        ]); 

        $dni = $request->input('dni');
        $paciente = Paciente::where('DNI', $dni)->first();

        if($paciente){
            $fichas = $paciente->citas()->where('medico_id', '1')->get(); //modificar para obtener el id del medico logueado

            return view('medico.show_fichas_paciente', compact('paciente', 'fichas'));
        }
        else{
            return redirect('/medico/consultar_ficha_medica')
            ->with('success', 'Ingrese un DNI válido.')
            ->with('alert', 'success');
        }
    }
}
