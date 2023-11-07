<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioDeAtencionDiaSemana extends Model
{
    use HasFactory;
    protected $table = 'horarios_de_atencion_dias_semana';

    public function horarioAtencion()
    {
        return $this->hasMany(HorarioAtencion::class, 'id_horario_de_atencion');
    }

    public function diaSemana()
    {
        return $this->hasMany(DiaSemana::class, 'id_horario_de_atencion');
    }

}
