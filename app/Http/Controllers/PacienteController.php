<?php

namespace App\Http\Controllers;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(){
        return view('paciente.index');
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
}
