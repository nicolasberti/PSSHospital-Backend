<?php

namespace App\Http\Controllers;

use App\Models\DiaSemana;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\PacienteMedico;
use Illuminate\Support\Carbon;

class PacienteController extends Controller
{
    public function index($username){
        $paciente = Paciente::where('username', $username)->first();
        if($paciente)
            return view('paciente.index', ['username' => $username, 'paciente' => $paciente]); 
        else
            return view('paciente.404');
    }

    public function datos($username){
        // obtener datos
        $paciente = Paciente::where('username', $username)->first();
        return view('paciente.datos', ['username' => $username, 'paciente' => $paciente]); 
    }

    public function store(Request $request) {
        $request->validate([
            'DNI' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'DOB' => 'required',
            'address' => 'required',
            'city' => 'required',
            'provincia' => 'required',
        ]);
    
        $paciente = new Paciente([
            'DNI' => $request->input('DNI'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'DOB' => $request->input('DOB'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'provincia' => $request->input('provincia'),
            'state' => 'activo',
        ]);
    
        $paciente->save(); 

        return redirect('/secretario/pacientes/create')
        ->with('success', 'El paciente se ha registrado con éxito')
        ->with('alert', 'success');
    }
    
    public function edit($id) {
        $paciente = Paciente::find($id);
        return view('secretario.edit_paciente', compact('paciente'));
    }

    public function update(Request $request, $id) {
        $paciente = Paciente::find($id);

        $paciente->DNI = $request->input('DNI');
        $paciente->email = $request->input('email');
        $paciente->phone = $request->input('phone');
        $paciente->name = $request->input('name');
        $paciente->lastname = $request->input('lastname');
        $paciente->DOB = $request->input('DOB');
        $paciente->address = $request->input('address');
        $paciente->city = $request->input('city');
        $paciente->provincia = $request->input('provincia');

        $paciente->update();

        return redirect('/secretario/pacientes')
            ->with('success','Paciente editado exitosamente')
            ->with('alert','success');
    }

    public function cita($id_paciente){
        $paciente = Paciente::find($id_paciente);
        $medicos = Medico::orderBy('name', 'asc')->get();
        return view('paciente.new_cita', ['username' => $paciente, 'paciente' => $paciente, 'medicos' => $medicos]);
    }

    public function cita_medico(Request $request){
        $paciente = Paciente::find($request->input('id'));
        $medico = Medico::find($request->input('medico_id'));
        $fechaInicio = now();
        $fechaFin = now()->addDays(30);

        //$diasDeAtencion = $medico->diasDeAtencion->pluck('diaSemana')->toArray();
        /*
        $fechasHabilitadas = [];
        $currentDate = $fechaInicio;

        while ($currentDate <= $fechaFin) {
            $currentDay = $currentDate->dayOfWeek; // Obtén el número del día de la semana (0 para domingo, 1 para lunes, 2 para martes, etc.)

            if (in_array($currentDay, $diasDeAtencion)) {
                $fechasHabilitadas[] = $currentDate->toDateString();
            }
            $currentDate->addDay();
        }
*/
        return view('paciente.new_cita_medico', ['paciente' => $paciente, 'username' => $paciente->username, 'medico' => $medico]);
    }

    public function mis_citas($id_paciente){
        $paciente = Paciente::find($id_paciente);
        $citas = $paciente->citas;
        return view('paciente.mis_citas', ['username' => $paciente->username, 'paciente' => $paciente, 'citas' => $citas]);
    }

    public function mis_fichas($id_paciente){
        $paciente = Paciente::find($id_paciente);
        $citas = $paciente->citas;
        return view('paciente.fichas_medicas', ['username' => $paciente->username, 'paciente' => $paciente, 'citas' => $citas]);
    }

    public function cancelar_cita($id_cita, $id_paciente){
        $paciente = Paciente::find($id_paciente);
        $citas = $paciente->citas;
        $cita = PacienteMedico::find($id_cita);
        $cita->state = 'Cancelada';
        $cita->save();
        return redirect()->route('paciente.mis_citas', ['id' => $id_paciente]);
    }
    
    public function cita_medico_date(Request $request){
        $paciente = Paciente::find($request->input('id_paciente'));
        $medico = Medico::find($request->input('id_medico'));
        $dia = $request->cita; //yyyy-mm-dd
        $citasMedico = $medico->citas;
        $citasEnElMismoDia = [];

        // Crea una instancia de Carbon a partir de la fecha
        $fecha = Carbon::parse($dia);

        // Configura el idioma en español
        $fecha->locale('es');

        // Obtén el nombre del día de la semana en español
        $nombreDia = $fecha->formatLocalized('%A');

        // Capitaliza la primera letra del nombre del día
        $nombreDia = ucfirst($nombreDia);
        $nombreDiaEsp = "";
        // $nombreDia contendrá el nombre del día en español con la primera letra en mayúscula, por ejemplo, "Lunes" para lunes
        switch ($nombreDia) {
            case "Monday":
                $nombreDiaEsp = "Lunes";
                break;
            case "Tuesday":
                $nombreDiaEsp = "Martes";
                break;
            case "Wednesday":
                $nombreDiaEsp = "Miércoles";
                break;
            case "Thursday":
                $nombreDiaEsp = "Jueves";
                break;
            case "Friday":
                $nombreDiaEsp = "Viernes";
                break;
            case "Saturday":
                $nombreDiaEsp = "Sábado";
                break;
            case "Sunday":
                $nombreDiaEsp = "Domingo";
                break;
        }


        $instanciaDia = DiaSemana::where('dia', $nombreDiaEsp)->first();//hasta aca anda
        
        $horario_atencion_diasemana = $instanciaDia->horarioAtencion; 
        $horario_atencion = $horario_atencion_diasemana->horarioAtencion; //aca se rompe

        $inicio = $horario_atencion->horario_inicio;
        $fin = $horario_atencion->horario_fin;
        $duracion = $horario_atencion->duracion;

        //$inicioSegundos = TIME_TO_SEC($inicio);
        //$finSegundos = TIME_TO_SEC($fin);
        //$duracionSegundos = TIME_TO_SEC($duracion);
       // foreach ($citasMedico as $cita) {
            // Supongamos que la fecha de la cita está en un campo llamado 'fecha' en el formato 'yyyy-mm-dd'
         //   if ($cita->fecha === $dia) {
           //     $citasEnElMismoDia[] = $cita;
            //}
        //}
        //falta buscar para el medico los horarios disponibles y pasar esos horarios.
        
        $citas_disponibles = [];
        $horario_actual = $inicio;
        while($horario_actual < $fin) {
            $citas_disponibles[] = $horario_actual;
            $horario_actual += $duracion;
        }

    return view('paciente.new_cita_medico_date', ['dia' => $dia, 'paciente' => $paciente, 'username' => $paciente->username, 'medico' => $medico,  /*'citas_disponibles' => $citas_disponibles, */'instanciaDia'=>$instanciaDia]);
    }

    public function solicitar_cita(Request $request){
        $cita = new PacienteMedico();
        $cita->fecha = $request->fecha;
        $cita->horarioInicio = $request->horarioInicio;
        $cita->horarioFin = $request->horarioFin;
        $cita->duracion = $request->duracion;
        $cita->state = "Pendiente";
        $cita->diagnostico = "";
        $cita->paciente_id = $request->paciente_id;
        $cita->medico_id = $request->medico_id;
        $cita->save();

        return redirect('/paciente/{$paciente->username}')
        ->with('success','La cita fue solicitada correctamente')
        ->with('alert','success');
    }

    public function destroy(string $id){
        $paciente = Paciente::find($id);
        $paciente->state = 'Inactivo';

        $paciente->save();
        return redirect('/secretario/pacientes')
        ->with('success', 'El paciente se ha dado de baja con éxito')
        ->with('alert', 'success');
    }
}
