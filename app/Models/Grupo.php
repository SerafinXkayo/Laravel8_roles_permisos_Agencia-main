<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cupo',
        'salon',
        'hora_inicio',
        'hora_fin',
        'curso_id',
        'profesor_id',
    ];

    protected $primaryKey = 'id_grupo';

    public $incrementing = true;

    public $timestamps = false;
    //aaaaaaaaaaaaaaaaaaa
}