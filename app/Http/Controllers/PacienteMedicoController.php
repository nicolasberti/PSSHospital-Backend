<?php

namespace App\Http\Controllers;
use App\Models\Paciente;
use App\Models\PacienteMedico;
use App\Models\Medico;
use Illuminate\Http\Request;

class PacienteMedicoController extends Controller
{

    public function create_cita(Request $request)
    {
        
       $request->validate([
            'dni' => 'required|digits:8', 
            'fecha' => 'required',
            'horarioInicio' => 'required',
            'horarioFin' => 'required',
            'duracion' => 'required',
            'medico_id' => 'required',
        ]); 

        
        $dni = $request->input('dni');
        $paciente = Paciente::where('DNI', $dni)->first();
       
        if ($paciente) {
            $cita = new PacienteMedico();
            $cita->fecha = $request->input('fecha');
            $cita->horarioInicio = $request->input('horarioInicio');
            $cita->horarioFin = $request->input('horarioFin');
            $cita->duracion = $request->input('duracion');
            $cita->paciente_id = $paciente->id; 
            $cita->medico_id = $request->input('medico_id'); 
            $cita->state = 'Pendiente'; 
            $cita->diagnostico = '';
            $cita->save();

            $nombrePaciente = $paciente->name; 
            $apellidoPaciente = $paciente->lastname;
            $medico = Medico::find($cita->medico_id)->first();
            $nombreMedico = $medico->name; 
            $apellidoMedico = $medico->lastName;

            $mensaje = "Solicitud Exitosa. El paciente $nombrePaciente $apellidoPaciente tendrá un turno con el médico $nombreMedico $apellidoMedico el día $cita->fecha a las $cita->horarioInicio";

            return redirect('/secretario')
                ->with('success', $mensaje)
                ->with('alert', 'success');
        } else {
            return redirect('/secretario')
            ->with('success', 'La cita no se pudo registrar, intentelo de nuevo.')
            ->with('alert', 'success');
        }
    }
}
    