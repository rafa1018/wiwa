<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\User;
use App\Permission;

class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
     $key = "browse_users";
     $id_key = \App\Permission::findByidKey($key);
     $rol_user = Auth::user()->role_id;
     $Permission_roles = DB::table('permission_roles')->where('permission_id',$id_key)->where('role_id',$rol_user)->first();

     if($Permission_roles != null){
        $roles = DB::table('roles')->where('id','<>',1)->get();
        $usuarios = DB::table('users')->join('roles','roles.id','=','users.role_id')->select('users.*','roles.display_name')->get();
        return view('modulos.usuarios.inicio',compact('usuarios','roles'));
    }else{
         Session::flash('flash_error_fadeOutDown', 'Usted no tiene permiso para acceder a esta ruta ');
        Session::flash('flash_type', 'alert-warning');
        return redirect()->route('home');
    }
    }



    public function crear_usuario(Request $data){
     $key = "read_users";
     $id_key = \App\Permission::findByidKey($key);
     $rol_user = Auth::user()->role_id;
     $Permission_roles = DB::table('permission_roles')->where('permission_id',$id_key)->where('role_id',$rol_user)->first();

     if($Permission_roles != null){
        $usuarios = new \App\User;
        $usuarios->role_id = $data['role_id'];
        $usuarios->name = $data['name'];
        $usuarios->cedula = $data['cedula'];
        $usuarios->first_name = $data['first_name'];
        $usuarios->last_name = $data['last_name'];
        $usuarios->email = $data['email'];
        $usuarios->password = Hash::make($data['password']);
        $usuarios->save();
        Session::flash('flash_success_fadeOutDown', 'Usuario creado correctamente ');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
     }else{
        Session::flash('flash_error_fadeOutDown', 'Usted no tiene permiso para realizar esta operación ');
        Session::flash('flash_type', 'alert-warning');
        return redirect()->back();
     }
    
    }


    /********* EDITAR USUARIO  ******/
     public function editar_usuario(Request $data){
    $key = "edit_users";
     $id_key = Permission::findByidKey($key);
     $rol_user = Auth::user()->role_id;
     $Permission_roles = DB::table('permission_roles')->where('permission_id',$id_key)->where('role_id',$rol_user)->first();

     if($Permission_roles != null){
        $id = $data['id_usuario'];
        $usuarios = User::find($id);
        $usuarios->name = $data['name'];
        $usuarios->cedula = $data['cedula'];
        $usuarios->first_name = $data['first_name'];
        $usuarios->email = $data['email'];
        $usuarios->password = Hash::make($data['password']);
        $usuarios->save();
        Session::flash('flash_success_fadeOutDown', 'Usuario editado correctamente ');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
     }else{
        Session::flash('flash_error_fadeOutDown', 'Usted no tiene permiso para realizar esta operación ');
        Session::flash('flash_type', 'alert-warning');
        return redirect()->back();
     }
  }


    /********** ELIMINAR USUARIO *****/
     
    public function eliminar_usuario($id){
     $key = "delete_users";
     $id_key = Permission::findByidKey($key);
     $rol_user = Auth::user()->role_id;
     $Permission_roles = DB::table('permission_roles')->where('permission_id',$id_key)->where('role_id',$rol_user)->first();

     if($Permission_roles != null){
        $usuarios = User::find($id);
        $usuarios->delete();
        Session::flash('flash_success_fadeOutDown', 'Usuario eliminado correctamente ');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
     }else{
        Session::flash('flash_error_fadeOutDown', 'Usted no tiene permiso para realizar esta operación ');
        Session::flash('flash_type', 'alert-warning');
        return redirect()->back();
     }
  
     
  }



      public function editar_categoria(Request $data){
     $key = "edit_proveedores";
     $id_key = Permission::findByidKey($key);
     $rol_user = Auth::user()->role_id;
     $Permission_roles = DB::table('permission_roles')->where('permission_id',$id_key)->where('role_id',$rol_user)->first();

     if($Permission_roles != null){
        $id = $data['id_categoria'];
        $categoriaProducto = Categoriaproducto::find($id);
        $categoriaProducto->categoria = $data['categoria'];
        $categoriaProducto->estado = "Activo";
        $categoriaProducto->save();
        Session::flash('flash_success_fadeOutDown', 'Categoria actualizada correctamente ');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
     }else{
        Session::flash('flash_error_fadeOutDown', 'Usted no tiene permiso para realizar esta operación ');
        Session::flash('flash_type', 'alert-warning');
        return redirect()->back();
     }
  }


   
}
