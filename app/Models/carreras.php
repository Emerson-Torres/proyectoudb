<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carreras extends Model
{
    protected $fillable = ['titulo_carrera', 'descripcion_carrera', 'url_amigable', 'id_campus', 'id_tipocarrera'];
}
