<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
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

}
