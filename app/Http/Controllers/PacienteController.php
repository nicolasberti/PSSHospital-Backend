<?php

namespace App\Http\Controllers;

class PacienteController extends Controller
{
    public function index(){
        return view('paciente.index');
    }
}
