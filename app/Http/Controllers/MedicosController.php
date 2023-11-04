<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Especialidad;

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

        $medico = Medico::where('DNI', $request->input('DNI'))->first();

        if ($medico != null) {
            return back()->withErrors([
                'message' => 'Error: Este médico ya está registrado',
            ]);
        }
        $medico = new Medico();

        $medico->username = $request->input('Username');
        $medico->password = $request->input('Password');
        $medico->DNI = $request->input('DNI');
        $medico->name = $request->input('Name');
        $medico->lastName = $request->input('LastName');
        $medico->email = $request->input('Email');
        $medico->phone = $request->input('Phone');
        $medico->estado = "Habilitado";
        $medico->especialidad = $request->input('Specialty');
        $medico->provincia = $request->input('Province');
        $medico->ciudad  = $request->input('City');
        $medico->horarios_atencion = 1;

        $medico->save();

        return redirect('/admin')
            ->with('success','Médico registrado exitosamente')
            ->with('alert','success');
    }

    public function edit($id) {
        $medico = Medico::find($id);
        $especialidades = Especialidad::all();
        return view('admin.edit_medico', compact('medico'), compact('especialidades'));
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
