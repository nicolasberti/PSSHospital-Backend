<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medico;

class MedicosController extends Controller
{
    public function index(){
        return view('medico.index');
    }

    public function store(Request $request) {

        $medico = new Medico();

        $medico->username = $request->input('Username');
        $medico->password = $request->input('Password');
        $medico->DNI = $request->input('DNI');
        $medico->name = $request->input('Name');
        $medico->email = $request->input('Email');
        $medico->phone = $request->input('Phone');
        $medico->state = "Activo";
        $medico->especialidad = $request->input('Specialty');


        $medico->save();

        return redirect('/admin')
            ->with('success','Médico registrado exitosamente')
            ->with('alert','success');
    }
}
