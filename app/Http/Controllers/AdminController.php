<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secretario;
use App\Models\SecretarioPaciente;
use App\Models\Medico;
use App\Models\Especialidad;
use App\Models\Localidad;
use App\Models\Provincia;
use App\Models\HorarioDeAtencion;
use App\Models\DiaSemana;
use App\Models\HorarioDeAtencionDiaSemana;

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

    public function index_horarios_medicos() {
        $medicos = Medico::all();
        return view('admin.index_horarios_medicos', compact('medicos'));
    }

    public function create_medico() {
        $especialidades = Especialidad::all();
        $provincias = Provincia::all();
        $localidades = Localidad::all();
        return view('admin.create_medico',  compact('especialidades', 'localidades', 'provincias'));
    }

    public function show_horarios_medico($id) {
        $medico = Medico::find($id);
        $horarios = HorarioDeAtencion::where('id',$medico->horarios_atencion)->first();
        $id_dias = HorarioDeAtencionDiaSemana::where('id_horario_de_atencion', $medico->horarios_atencion)->get();
        $id_dias = $id_dias->pluck('id_dias_semana');
        $dias = DiaSemana::whereIn('id', $id_dias)->get();
        return view('admin.show_horarios_medico', compact('medico','horarios', 'dias'));
    }

    public function edit_horarios_medico($id) {
        $medico = Medico::find($id);
        $horarios = HorarioDeAtencion::where('id',$medico->horarios_atencion)->first();
        $id_dias = HorarioDeAtencionDiaSemana::where('id_horario_de_atencion', $medico->horarios_atencion)->get();
        $id_dias = $id_dias->pluck('id_dias_semana');
        $dias = DiaSemana::whereIn('id', $id_dias)->get();
        $dias_semana = DiaSemana::all();
        return view('admin.edit_horarios_medico', compact('medico','horarios', 'dias', 'dias_semana'));
    }

    public function create_new_secretario(Request $request){
        $validatedData = $request->validate([
            'DNI' => 'required|numeric|unique:secretarios,DNI|digits:8',
            'username' => 'required|string|unique:secretarios,username',
            'password' => 'required|string',
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'birthday' => 'required|date|before:today',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
        ], [
            'DNI.required' => 'El campo DNI es obligatorio.',
            'DNI.numeric' => 'El campo DNI debe ser numérico.',
            'DNI.unique' => 'Ya existe un usuario con este DNI.',
            'DNI.digits' => 'El campo DNI debe tener 8 dígitos.',
            'username.required' => 'El campo Usuario es obligatorio.',
            'username.string' => 'El campo Usuario debe ser un string.',
            'username.unique' => 'Ya existe un usuario con este nombre de usuario.',
            'password.required' => 'El campo Contraseña es obligatorio.',
            'password.string' => 'El campo Contraseña debe ser un string',
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.string' => 'El campo Nombre debe ser un string',
            'lastname.required' => 'El campo Apellido es obligatorio.',
            'lastname.string' => 'El campo Apellido debe ser un string',
            'email.required' => 'El campo Email es obligatorio.',
            'email.string' => 'El campo Email debe ser un string',
            'email.email' => 'El campo Email debe contener el simbolo @.',
            'phone.required' => 'El campo Celular es obligatorio.',
            'phone.string' => 'El campo Celular debe ser un string',
            'birthday.required' => 'El campo Fecha de Cumpleaños es obligatorio.',
            'address.required' => 'El campo Direccion es obligatorio.',
            'address.string' => 'El campo Direccion debe ser un string',
            'city.required' => 'El campo Ciudad es obligatorio.',
            'city.string' => 'El campo Ciudad debe ser un string',
            'state.required' => 'El campo Estado es obligatorio.',
            'state.string' => 'El campo Estado debe ser un string',
        ]);

        $secretario = new Secretario();
        $secretario->DNI = $validatedData['DNI'];
        $secretario->username = $validatedData['username'];
        $secretario->password = $validatedData['password'];
        $secretario->name = $validatedData['name'];
        $secretario->lastname = $validatedData['lastname'];
        $secretario->email = $validatedData['email'];
        $secretario->phone = $validatedData['phone'];
        $secretario->dateOfBirth = $validatedData['birthday'];
        $secretario->address = $validatedData['address'];
        $secretario->city = $validatedData['city'];
        $secretario->state = $validatedData['state'];

        $secretario->save();

        $secretarios = Secretario::all();

        return redirect()->route('admin.show_secretarios', ['secretarios' => $secretarios])
        ->with('success', 'El secretario se ha registrado con éxito')
        ->with('alert', 'success');
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

    public function alta_secretario(string $id){
        $secretario = Secretario::find($id);
        $secretario->state = 'Disponible';

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

    public function select_medico_agregar_cita(){
        $medicos = Medico::all('name');
        return view('admin.select_medico_agregar_cita', ['medicos' => $medicos]);
    }

    public function select_paciente_consultar_citas(){
        return view('admin.select_paciente_consultar_citas');
    }

    public function select_paciente_cancelar_citas(){
        return view('admin.select_paciente_cancelar_citas');
    }


    public function show_lista_citas_paciente(){//string $id como parametro
        return view('admin.show_lista_citas_paciente');
    }


}
