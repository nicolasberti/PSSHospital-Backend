<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\HorarioDeAtencion;
use App\Models\PacienteMedico;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SecretarioController extends Controller
{
    public function index() {
        return view('secretario.index');
    }

    public function show_pacientes(){
        $pacientes = Paciente::all();
        return view('secretario.show_pacientes', compact('pacientes'));
    }

    public function create_pacientes(){
        return view('secretario.create_pacientes');
    }

    public function new_cita(){
        $medicos = Medico::all();
        return view('secretario.new_cita', compact('medicos'));
    }

    public function new_cita_fecha_medico(Request $request){
        $medicoId = $request->input('medico_id');
        $medico = Medico::find($medicoId);
    
        //$fechasDisponibles = $medico->obtenerFechasDisponibles(30);
        $fechasDisponibles = [
            '01/11/2023',
            '02/11/2023',
            '03/11/2023',
            '04/11/2023',
            '05/11/2023',
            '06/11/2023',
        ];

        return view('secretario.new_cita_fecha_medico', compact('fechasDisponibles', 'medico'));
    }

    public function new_cita_horarios_medico(Request $request){
        $medicoId = $request->input('medico_id');
        $medico = Medico::find($medicoId);
        $fechaSeleccionada = $request->input('fecha');
    
        $fecha = Carbon::createFromFormat('d/m/Y', $fechaSeleccionada)->format('Y-m-d');

        $numeroDiaSemana = Carbon::parse($fecha)->dayOfWeek;
    
        $horariosDisponibles = HorarioDeAtencion::where('dias', $numeroDiaSemana)->get();
        
        $citasEnHorario = PacienteMedico::where('fecha', $fecha)
            ->whereIn('horarioInicio', $horariosDisponibles->pluck('horario_inicio'))
            ->get();

        return view('secretario.new_cita_horarios_medico', compact('medico', 'horariosDisponibles', 'fechaSeleccionada', 'citasEnHorario'));
    }
    
}
