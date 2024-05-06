<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'origen_id',
        'destino_id',
        'compania_id',
        'salida',
        'llegada',
        'plazas',
        'precio'
    ];

    public function compania()
    {
        return $this->belongsTo(Compania::class);
    }

    public function origen()
    {
        return $this->belongsTo(Aeropuerto::class, 'origen_id');
    }

    public function destino()
    {
        return $this->belongsTo(Aeropuerto::class, 'destino_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
