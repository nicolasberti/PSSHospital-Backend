<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function index(){
        return view('medico.index');
    }

}
