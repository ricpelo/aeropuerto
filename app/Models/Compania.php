<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function vuelos()
    {
        return $this->hasMany(Vuelo::class);
    }
}
