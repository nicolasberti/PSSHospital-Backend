<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'DNI',
        'username',
        'password',
        'email',
        'phone',
        'name',
        'lastname',
        'DOB',
        'address',
        'city',
        'provincia',
        'state',
    ];
    

    protected $hidden = [
        'password',
    ];
}
