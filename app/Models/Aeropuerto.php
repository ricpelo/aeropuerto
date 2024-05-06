<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'nombre'];

    public function esOrigenDe()
    {
        return $this->hasMany(Vuelo::class, 'origen_id');
    }

    public function esDestinoDe()
    {
        return $this->hasMany(Vuelo::class, 'destino_id');
    }
}
