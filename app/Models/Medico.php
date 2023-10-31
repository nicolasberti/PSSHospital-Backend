<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function horarioAtencion()
    {
        return $this->hasMany(HorarioAtencion::class);
    }

    public function diasDeAtencion()
    {
        $diasDeAtencion = $this->horarioAtencion()
            ->with('diasemanas') // Asegura que la relación diaSemana se cargue
            ->get()
            ->pluck('diasemanas.name') // Pluck en la colección resultante
            ->unique()
            ->toArray();

        return $diasDeAtencion;
    }
}
