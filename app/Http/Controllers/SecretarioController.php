<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;

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
            '01/11/23',
            '02/11/23',
            '03/11/23',
            '04/11/23',
            '05/11/23',
            // Agrega más fechas disponibles según sea necesario
        ];

        return view('secretario.new_cita_fecha_medico', compact('fechasDisponibles', 'medico'));
    }

    public function new_cita_horarios_medico(Request $request){
        $medicoId = $request->input('medico_id');
        $medico = Medico::find($medicoId);
        $fechaSeleccionada = $request->input('fecha');

        $horariosDisponibles = [
            [
                'horario' => '08:00 AM - 09:00 AM',
            ],
            [
                'horario' => '09:15 AM - 10:15 AM',
            ],
            [
                'horario' => '10:30 AM - 11:30 AM',
            ],
            [
                'horario' => '11:45 AM - 12:45 PM',
            ],
            [
                'horario' => '14:00 AM - 16:00 PM',
            ],
        ];
        
        return view('secretario.new_cita_horarios_medico', compact('medico', 'horariosDisponibles', 'fechaSeleccionada'));
    }

}
