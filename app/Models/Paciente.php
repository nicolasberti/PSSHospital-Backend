<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Paciente extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;

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

    public function citas()
    {
        return $this->hasMany(PacienteMedico::class, 'paciente_id');
    }
}
