<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_curso',
        'nombre',
        'cupo',
        'salon',
        'horario_inicio',
        'horario_fin',
        'curso_id',
        'profesor_id',
    ];
    protected $primaryKey = 'id_curso';

    public $incrementing = true;

    public $timestamps = false;
}
