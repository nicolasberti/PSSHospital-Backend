<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaSemana extends Model
{
    use HasFactory;
    protected $table = 'dias_semana';

    public function horarioAtencion()
    {
        return $this->belongsTo(HorarioDeAtencionDiaSemana::class);
    }
}
