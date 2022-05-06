<?php

namespace App\Imports;

use App\Proceso;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ProcesosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
           return new Proceso([
           'tipo' => $row['Tipo'],
            'identificacion' => $row['Identificacion'],
            'nombres' => $row['Nombres'],
            'apellidos' => $row['Apellidos'],
           'fecha_nacimiento' => $row['Fecha nacimiento'],
            'sexo' => $row['Sexo'],
            'lugar_hechos' => $row['Direccion'],
            'fecha_denuncia' => $row['Fecha denuncia'],
            'fiscalia' => $row['Fiscalia'],
            'radicado' => $row['Radicado'],
            'hechos' => $row['Hechos'],
            'responsable' => $row['Responsable'],
             'victimizante' => $row['Hecho victimizante'],
            'estado_proceso' => "activo",
             'id_usuario' => "1"
    

            
        ]);
    }
    
     
    public function headingRow(): int
    {
        return 1;
    }
    
    
    
}
