<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';//Prote

    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion',
    ];

    protected $primaryKey = 'id_curso';

    public $incrementing = true;

    public $timestamps = false;
    
}