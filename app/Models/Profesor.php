<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesores';//Protegido

    protected $fillable = [
        
        'nombre',
        'apellido_paterno',
        'apellido_materno',
    ];

    protected $primaryKey = 'id_profesor';

    public $incrementing = true;

    public $timestamps = false;


public function grupos()
{
    return $this->hasMany(Grupo::class, 'profesor_id');
}


    
}

