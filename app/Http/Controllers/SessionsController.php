<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\PacienteController;

class SessionsController extends Controller {

    public function create() {

        return view('auth.login');
    }

    public function store(Request $request) {

        $credenciales = $request->only('username', 'password');


        if ($credenciales['username'] == 'admin1' && $credenciales['password'] == '1234') {
            return redirect()->route('admin.index');
        } elseif ($credenciales['username'] == 'medico1' && $credenciales['password'] == '1234') {
            return redirect()->route('medico.index');
        } elseif ($credenciales['username'] == 'paciente1' && $credenciales['password'] == '1234') {
            return redirect()->action([PacienteController::class, 'index'], ['username' => 'paciente1']);
            // hardcodeado, podriamos programarlo para q encuentre en la db si nos sobra tiempo
        } elseif ($credenciales['username'] == 'secretario1' && $credenciales['password'] == '1234') {
            return redirect()->route('secretario.index');
        } else {
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
