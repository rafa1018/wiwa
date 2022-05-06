<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Proceso extends Model
{
    
    protected $fillable = [
        'tipo',
        'identificacion',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'sexo',
        'lugar_hechos',
        'latitud',
        'longitud',
        'fecha_denuncia',
        'fiscalia',
        'radicado',
        'constancia',
        'hechos',
        'responsable',
        'victimizante',
        'estado_proceso',
        'id_usuario',

    ];

 



}
