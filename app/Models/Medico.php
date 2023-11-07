<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Medico extends Model
{
    use HasFactory;
    protected $table = 'medicos';

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];


    public function horarios_atencion() {
        return $this->hasMany(HorarioDeAtencion::class, 'horarios_atencion'); //relacion un medico a muchos horarios de atención
    }    

    public function citas()
    {
        return $this->hasMany(PacienteMedico::class, 'medico_id');
    }
    
    
}
