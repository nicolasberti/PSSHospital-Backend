<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaSemana extends Model
{
    use HasFactory;

    public function horarioAtenciones()
    {
        return $this->hasMany(Horarioatencion::class);
    }

}
