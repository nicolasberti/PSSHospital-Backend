<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\HorarioDeAtencion;
use App\Models\HorarioDeAtencionDiaSemana;
use App\Models\PacienteMedico;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonInterval;

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
    
        $horario_atencion_dia = HorarioDeAtencionDiaSemana::where('id_dias_semana', $numeroDiaSemana)->first();
        $horario_id = $horario_atencion_dia->id_horario_de_atencion;
        $horario = HorarioDeAtencion::find($horario_id)->first();
        
        $horarioInicio = Carbon::parse($horario->horario_inicio);
        $horarioFin = Carbon::parse($horario->horario_fin);
        $duracion = CarbonInterval::minutes($horario->duracion);
       // $citas = [];

        $citas = [
            [
                'horario_inicio' => '08:00:00',
                'horario_fin' => '08:30:00',
            ],
            [
                'horario_inicio' => '08:30:00',
                'horario_fin' => '09:00:00',
            ],
            [
                'horario_inicio' => '09:00:00',
                'horario_fin' => '09:30:00',
            ],
        ];

        $citasMedicoBD = PacienteMedico::where('medico_id', $medicoId)->get();
       /* while ($horarioInicio->lt($horarioFin)) {
            $cita = [
                'horario_inicio' => $horarioInicio->format('H:i:s'),
                'horario_fin' => $horarioInicio->add($duracion)->format('H:i:s'),
            ];
            $citas[] = $cita;
        }*/

        return view('secretario.new_cita_horarios_medico', compact('medico', 'horario', 'fechaSeleccionada', 'citas', 'citasMedicoBD'));
    }

    public function cancel_cita(Request $request){
        return view('secretario.cancel_cita');
    }

    public function cancel_cita_paciente(Request $request){
        $request->validate([
            'dni' => 'required|digits:8',
        ]); 

        
        $dni = $request->input('dni');
        $paciente = Paciente::where('DNI', $dni)->first();

        //aca hay q pasar las citas del paciente

        if($paciente){
            return view('secretario.show_citas_paciente', compact('paciente'));
        }
        else{
            return redirect('/secretario/cancel_cita')
            ->with('success', 'Ingrese un DNI válido.')
            ->with('alert', 'success');
        }
    }
    
}
