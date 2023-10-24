<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secretario;
use App\Models\SecretarioPaciente;
use App\Models\Especialidad;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.index');
    }

    public function show() {
        return view('admin.show_admin');
    }

    public function show_secretarios(){
        $secretarios = Secretario::all();
        return view('admin.show_secretarios', ['secretarios' => $secretarios]);
    }

    public function create_secretarios(){
        return view('admin.create_secretarios');
    }

    public function show_medicos() {
        return view('admin.show_medicos');
    }

    public function create_medico() {
        $especialidades = Especialidad::all();
        return view('admin.create_medico',  compact('especialidades'));
    }

        
    public function create_new_secretario(Request $request){
        $secretario = new Secretario();
        $secretario->DNI = $request->DNI;
        $secretario->username = $request->username;
        $secretario->password = $request->password;
        $secretario->name = $request->name;
        $secretario->lastname = $request->lastname;
        $secretario->email = $request->email;
        $secretario->phone = $request->phone;
        $secretario->dateOfBirth = $request->birthday;
        $secretario->adress = $request->adress;
        $secretario->city = $request->city;
        $secretario->state = $request->state;

        $secretario->save();
        $secretarios = Secretario::all();
        return redirect()->route('admin.show_secretarios', ['secretarios' => $secretarios]);
    }

    public function edit_secretario(string $secretario){
        $secretario = Secretario::find($secretario);    
        return view('admin.edit_secretario', ['secretario' => $secretario]);
    }

    public function update_secretario(Request $request, string $secretarioid) {
        $secretario = Secretario::find($secretarioid);
    
        $passwordAnterior = $secretario->password;
        $dniAnterior = $secretario->DNI;
        $nombreAnterior = $secretario->name;
        $apellidoAnterior = $secretario->lastname;
        $emailAnterior = $secretario->email;
        $telefonoAnterior = $secretario->phone;
        $fechaAnterior = $secretario->dateOfBirth;
        $direccionAnterior = $secretario->adress;
        $ciudadAnterior = $secretario->city;
        $estadoAnterior = $secretario->state;

        
    
        // Actualiza los campos solo si son diferentes a los valores anteriores
        //falta validar bien si los valores corresponden a nombres, emails, numeros, etc.
        
        $secretario->name = $request->filled('name') ? $request->input('name') : $nombreAnterior;
        $secretario->email = $request->filled('email') ? $request->input('email') : $emailAnterior;
        $secretario->phone = $request->filled('phone') ? $request->input('phone') : $telefonoAnterior;
        $secretario->lastname = $request->filled('lastname') ? $request->input('lastname') : $apellidoAnterior;
        $secretario->DNI = $request->filled('DNI') ? $request->input('DNI') : $dniAnterior;
        $secretario->dateOfBirth = $request->filled('dateOfBirth') ? $request->input('dateOfBirth') : $fechaAnterior;
        $secretario->adress = $request->filled('adress') ? $request->input('adress') : $direccionAnterior;
        $secretario->city = $request->filled('city') ? $request->input('city') : $ciudadAnterior;
        $secretario->state = $request->filled('state') ? $request->input('state') : $estadoAnterior;
        
        // Actualiza la contraseña solo si se proporciona una nueva contraseña
        if ($request->filled('password')) {
            $secretario->password = bcrypt($request->input('password'));
        } else {
            $secretario->password = $passwordAnterior;
        }
    
        $secretario->save();
    
        $secretarios = Secretario::all();
        return redirect()->route('admin.show_secretarios', ['secretarios' => $secretarios]);
    }

    public function show_baja_secretarios(){
        $secretarios = Secretario::all();
        return view('admin.show_baja_secretarios', ['secretarios' => $secretarios]);
    }

    public function baja_secretario(string $id){
        $secretario = Secretario::find($id);
        $secretario->state = 'Inhabilitado';

        $secretario->save();
        return view('admin.index');
    }

    public function show_solicitudes(){
        $secretario_paciente = SecretarioPaciente::all(); 
        return view('admin.show_solicitudes', ['secretario_paciente' => $secretario_paciente]);
    }

    public function edit_datos_criticos_paciente(string $solicitud){
        $solicitud = SecretarioPaciente::find($solicitud);    
        return view('admin.edit_datos_criticos_paciente', ['solicitud' => $solicitud]);
    }
}
