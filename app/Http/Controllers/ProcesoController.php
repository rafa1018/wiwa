<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Permission;
use App\Proceso;
use Input;
use Date;
use DB;
use Session;
use Auth;
use Barryvdh\DomPDF\PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProcesosExport;
use App\Imports\ProcesosImport;


class ProcesoController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function listado(){
          $procesos = Proceso::all();     
        return view('listado_procesos',compact('procesos'));
    }


    public function nuevo_proceso(Request $data){
     $key = "read_procesos";
     $id_key = \App\Permission::findByidKey($key);
     $rol_user = Auth::user()->role_id;
     $Permission_roles = DB::table('permission_roles')->where('permission_id',$id_key)->where('role_id',$rol_user)->first();

     if($Permission_roles != null){


     $v = Validator::make($data->all(), [
        'identificacion' => 'required|unique|max:255',
        'nombres' => 'required',
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors());
    }

    

          $id_user = Auth::user()->id;
        if($data->hasFile('constancia')){



              //obtenemos el campo file definido en el formulario
       $file = $data->file('constancia');
 
       //obtenemos el nombre del archivo
       $nombre = time().$file->getClientOriginalName();
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('documentos')->put($nombre,  \File::get($file));
        }else{
            $nombre = null;
        }
          
        
      $fecha_nacimient = $data->fecha_nacimiento;
      $fecha_nacimiento = date("Y-m-d", strtotime($fecha_nacimient));

      $fecha_denunci = $data->fecha_denuncia;
      $fecha_denuncia = date("Y-m-d", strtotime($fecha_denunci));
 


        $usuarios = new \App\Proceso;
        $usuarios->tipo = $data['tipo_id'];
        $usuarios->identificacion = $data['identificacion'];
        $usuarios->nombres = $data['nombres'];
        $usuarios->apellidos = $data['apellidos'];
        $usuarios->fecha_nacimiento = $fecha_nacimiento;
        $usuarios->sexo = $data['sexo'];
        $usuarios->lugar_hechos = $data['lugar_hechos'];
        $usuarios->latitud = $data['lat'];
        $usuarios->longitud = $data['lng'];
        $usuarios->fecha_denuncia = $fecha_denuncia;
        $usuarios->fiscalia = $data['fiscalia'];
        $usuarios->radicado = $data['radicado'];
        $usuarios->constancia = "documentos/".$nombre;
       $usuarios->radicado = $data['radicado'];
$usuarios->hechos = $data['hechos'];
       $usuarios->responsable = $data['responsable'];
$usuarios->victimizante = $data['victimizante'];
        $usuarios->estado_proceso = "activo";
        $usuarios->id_usuario = Auth::user()->id;
       
        $usuarios->save();
        Session::flash('flash_success_fadeOutDown', 'Proceso creado correctamente ');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
     }else{
        Session::flash('flash_error_fadeOutDown', 'Usted no tiene permiso para realizar esta operación ');
        Session::flash('flash_type', 'alert-warning');
        return redirect()->back();
     }
    
    }


    /****** VER PROCESO */


    public function ver_proceso($id){  
     //$proceso = Proceso::where('id',$id)->first();
     
     $proceso = DB::table('procesos')
     ->join('users','users.id','=','procesos.id_usuario')->where('procesos.id', $id)->select('procesos.*','users.first_name','users.last_name')->first();
     if($proceso == null){
      return redirect()->route('home');
     }else{
        return view('modulos.procesos.detalles',compact('proceso'));
     }

    }



      public function imprimir($id){  
     //$proceso = Proceso::where('id',$id)->first();
     
     $proceso = DB::table('procesos')
     ->join('users','users.id','=','procesos.id_usuario')->where('procesos.id', $id)->select('procesos.*','users.first_name','users.last_name')->first();
     if($proceso == null){
      return redirect()->route('home');
     }else{
        return view('modulos.procesos.pdf',compact('proceso'));
     }

    }




    /*********** ACTUALIZAR PROCESOS */

    public function actualizar_procesos(Request $data){

 $key = "edit_procesos";
     $id_key = \App\Permission::findByidKey($key);
     $rol_user = Auth::user()->role_id;
     $Permission_roles = DB::table('permission_roles')->where('permission_id',$id_key)->where('role_id',$rol_user)->first();

     if($Permission_roles != null){ 


 


     $id = $data->id_proceso;     
      $fecha_nacimient = $data->fecha_nacimiento;
      $fecha_nacimiento = date("Y-m-d", strtotime($fecha_nacimient));

      $fecha_denunci = $data->fecha_denuncia;
      $fecha_denuncia = date("Y-m-d", strtotime($fecha_denunci));
 


        $usuarios = Proceso::find($id);
        $usuarios->tipo = $data['tipo_id'];
        $usuarios->identificacion = $data['identificacion'];
        $usuarios->nombres = $data['nombres'];
        $usuarios->apellidos = $data['apellidos'];
        $usuarios->fecha_nacimiento = $fecha_nacimiento;
        $usuarios->sexo = $data['sexo'];
        $usuarios->lugar_hechos = $data['lugar_hechos'];
        $usuarios->latitud = $data['lat'];
        $usuarios->longitud = $data['lng'];
        $usuarios->fecha_denuncia = $fecha_denuncia;
        $usuarios->fiscalia = $data['fiscalia'];
        $usuarios->radicado = $data['radicado'];
       $usuarios->radicado = $data['radicado'];
$usuarios->hechos = $data['hechos'];
       $usuarios->responsable = $data['responsable'];
$usuarios->victimizante = $data['victimizante'];
        //$usuarios->estado_proceso = "activo";
       
        $usuarios->save();
        Session::flash('flash_success_fadeOutDown', 'Proceso Actualizado correctamente ');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
     }else{
        Session::flash('flash_error_fadeOutDown', 'Usted no tiene permiso para realizar esta operación ');
        Session::flash('flash_type', 'alert-warning');
        return redirect()->back();
     }

    }






public function exportExcel(){
  return Excel::download(new ProcesosExport, 'procesos-list.xlsx');
}


public function importExcel(Request $data){
  $file = $data->file('file');
       try{
        Excel::import(new ProcesosImport, $file);
       }catch(\Exception $ex){
          Session::flash('flash_error_fadeOutDown', 'Importación fallida, verifique  que el formato sea correcto y que los campos no esten vacios ');
        Session::flash('flash_type', 'alert-warning');
        return redirect()->back();
       }
          Session::flash('flash_success_fadeOutDown', 'Importación completa');
        Session::flash('flash_type', 'alert-success');
  return redirect()->back();
   }






   
}
