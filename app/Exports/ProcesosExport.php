<?php

namespace App\Exports;

use App\Proceso;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProcesosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Proceso::select('tipo','Identificacion','nombres','apellidos','fecha_nacimiento','sexo','lugar_hechos','fecha_denuncia','fiscalia','radicado','hechos','responsable','victimizante')->get();
    }


      public function headings(): array
        {
            return [
                'Tipo',
                'Identificacion',
                'Nombres',  
                'Apellidos',
                'Fecha nacimiento',
                'Sexo', 
                'Direccion',
                'Fecha denuncia',
                'Fiscalia',
                'Radicado',  
                'Hechos',
                 'Responsable',
                'Hecho victimizante',
            ];

        }
}

