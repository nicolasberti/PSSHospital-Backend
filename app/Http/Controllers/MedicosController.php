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

    public function list() {

        $medicos = Medico::all();
        return view('admin.show_medicos', compact('medicos'));
    }

    public function store(Request $request) {

        $medico = new Medico();

        $medico->username = $request->input('Username');
        $medico->password = $request->input('Password');
        $medico->DNI = $request->input('DNI');
        $medico->name = $request->input('Name');
        $medico->lastName = $request->input('LastName');
        $medico->email = $request->input('Email');
        $medico->phone = $request->input('Phone');
        $medico->state = "Activo";
        $medico->especialidad = $request->input('Specialty');


        $medico->save();

        return redirect('/admin')
            ->with('success','Médico registrado exitosamente')
            ->with('alert','success');
    }

    public function edit($id) {
        $medico = Medico::find($id);
        return view('admin.edit_medico', compact('medico'));
    }

    public function update(Request $request, $id) {
        $medico = Medico::find($id);

        $medico->password = $request->input('Password');
        $medico->name = $request->input('Name');
        $medico->lastName = $request->input('LastName');
        $medico->email = $request->input('Email');
        $medico->phone = $request->input('Phone');
        $medico->especialidad = $request->input('Specialty');

        $medico->update();

        return redirect('/admin')
            ->with('success','Médico editado exitosamente')
            ->with('alert','success');
    }
}
