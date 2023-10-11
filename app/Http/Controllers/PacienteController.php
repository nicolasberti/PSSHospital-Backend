<?php

namespace App\Http\Controllers;
use App\Models\Paciente;

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
}
