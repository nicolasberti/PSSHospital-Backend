<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PacienteMedico extends Model
{
    protected $table = 'paciente_medico';

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
    
}