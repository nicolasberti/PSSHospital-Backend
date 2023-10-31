<?php

namespace App\Http\Controllers;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Medico;

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

        return view('paciente.new_cita_medico', ['id' => $paciente->id, 'medico_id' => $medico->id]);
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
