<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecretarioPaciente extends Model
{
    protected $table = 'secretario_paciente';

    public function secretario()
    {
        return $this->belongsTo(Secretario::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
