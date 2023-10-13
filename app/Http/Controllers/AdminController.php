<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.index');
    }

    public function show_secretarios(){
        return view('admin.show_secretarios');
    }

    public function create_secretarios(){
        return view('admin.create_secretarios');
    }

    public function show_medicos() {
        return view('admin.show_medicos');
    }

    public function create_medico() {
        return view('admin.create_medico');
    }
}
