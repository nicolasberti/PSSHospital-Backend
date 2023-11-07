<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioAtencion extends Model
{
    use HasFactory;
    protected $table = 'horarios_de_atencion';

    public function diaSemana()
    {
        return $this->belongsTo(HorarioDeAtencionDiaSemana::class, 'id_horario_de_atencion');
    }

    public function medico() {
        return $this->belongsTo(Medico::class, 'medico_id');
    }

}
