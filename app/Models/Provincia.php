<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    //
    protected $table = 'provincias';

    protected $fillable = ['provincia'];

    public function localidades()
    {
        return $this->hasMany(Localidad::class);
    }
}
