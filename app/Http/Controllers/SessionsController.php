<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\PacienteController;

use App\Models\Admin;
use App\Models\Medico;
use App\Models\Secretario;
use App\Models\Paciente;
class SessionsController extends Controller {

    public function create() {

        return view('auth.login');
    }

    public function store(Request $request) {
        $credenciales = $request->only('username', 'password', 'rol');

        switch ($credenciales['rol']) {
            case 'administrador':
                $user = Admin::where('username', $credenciales['username'])
                    ->where('password', $credenciales['password'])
                    ->first();
                break;
            case 'secretario':
                $user = Secretario::where('username', $credenciales['username'])
                    ->where('password', $credenciales['password'])
                    ->first();
                break;
            case 'medico':
                $user = Medico::where('username', $credenciales['username'])
                    ->where('password', $credenciales['password'])
                    ->first();
                break;
            case 'paciente':
                $user = Paciente::where('username', $credenciales['username'])
                    ->where('password', $credenciales['password'])
                    ->first();
                break;
            default:
                $user = null;
                break;
        }
        if ($user) {
            // El usuario se encontró
            switch ($credenciales['rol']) {
                case 'administrador':
                    return redirect()->route('admin.index')->with(compact('user'));
                    break;
                case 'secretario':
                    return redirect()->route('secretario.index')->with(compact('user'));
                    break;
                case 'medico':
                    return redirect()->route('medico.index')->with(compact('user'));
                    break;
                case 'paciente':
                    return redirect()->route('paciente.index')->with(compact('user'));
                    break;
                default:
                    // El rol del usuario no es válido
                    return back()->withErrors([
                        'message' => 'Error: Rol no válido',
                    ]);
                    break;
            }
        } else {
            // El usuario no se encontró
            // Retorna un mensaje de error
            return back()->withErrors([
                'message' => 'Error: Credenciales Incorrectas',
            ]);
        }
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/');
    }
}
