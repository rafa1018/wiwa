<?php

use Illuminate\Support\Facades\Route;

/*
|-------------------------------------------------------------
| RUTAS 
|-------------------------------------------------------------
| Aquí es donde puede registrar rutas web para su aplicación. 
*/

Route::get('/', function (){
return redirect()->route('login'); });

Auth::routes();  //Vendor/laravel/ui/src/AuthRouteMethods.php



//Restablecer contraseña

Route::get('/restablecer', 'Auth\loginController@restablecer')->name('restablecer.password');

//Pagina principal
Route::get('/home', 'HomeController@index')->name('home');
// Procesos
Route::post('/home', 'ProcesoController@nuevo_proceso')->name('guardar.procesos');
Route::get('/procesos', 'ProcesoController@listado')->name('listado.procesos');
Route::get('/procesos/{id}', 'ProcesoController@ver_proceso');
Route::post('/procesos/update', 'ProcesoController@actualizar_procesos');
Route::get('/procesos/imprimir/{id}', 'ProcesoController@imprimir');

Route::get('/exportar_procesos', 'ProcesoController@exportExcel');
Route::post('/importar_procesos', 'ProcesoController@importExcel')->name('importar_procesos');






// Usuarios
Route::get('/usuarios', 'UsuarioController@index')->name('usuarios');
Route::post('/usuarios', 'UsuarioController@crear_usuario')->name('crear.usuario');
Route::post('/usuarios/update', 'UsuarioController@editar_usuario')->name('editar.usuario');
Route::get('/usuarios/delete/delete-{id}','UsuarioController@eliminar_usuario');



Route::get('/limpiar_cache', function () {
    $exitCode = Artisan::call('cache:clear');
});





Route::get('/backup', public function execute(){

Artisan::call("backup:mysql-dump");

 });


