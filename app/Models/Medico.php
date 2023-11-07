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
        return $this->hasMany(HorarioDeAtencion::class, 'horarios_atencion');
    }    

    public function citas()
    {
        return $this->hasMany(PacienteMedico::class, 'medico_id');
    }
    
    public function obtenerFechasDisponibles($diasHaciaElFuturo){
        $fechasDisponibles = [];
    
        $horarios = $this->horarios_atencion; // Asumiendo que tienes una relación en el modelo Medico
    
        foreach ($horarios as $horario) {
            // Agrega la lógica para generar fechas disponibles según los horarios
            // Puedes utilizar la función Carbon para trabajar con fechas
            $fechaInicio = Carbon::now();
            $fechaFin = Carbon::now()->addDays($diasHaciaElFuturo);
            
            while ($fechaInicio->lessThan($fechaFin)) {
                if ($fechaInicio->dayOfWeek == $horario->dias) {
                    $fechasDisponibles[] = $fechaInicio->format('Y-m-d');
                }
                
                $fechaInicio->addDay();
            }
        }
    
        return $fechasDisponibles;
    }
    
}
