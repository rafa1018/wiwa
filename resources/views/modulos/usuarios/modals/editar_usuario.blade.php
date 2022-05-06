
<!-- Modal -->
<div class="modal left fade" id="editar-{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
   <div class="modal-content border-primary">
    <div class="modal-header bg-primary">
      <h5 class="modal-title text-white">EDITAR USUARIO</h5>
      <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<form method="POST" action="/usuarios/update">
    <div class="modal-body">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
       <input type="hidden" class="form-control" name="id_usuario" id="id_usuario"  value="{{ $usuario->id ?: Request::old('id') }}">
       
       <div class="col-lg-12">
         <div class="form-group">
           <label for="name">Usuario de acceso</label>
           <input type="text" class="form-control" id="name" name="name"  value="{{ $usuario->name ?: Request::old('name') }}" >
         </div>
       </div>

       <div class="col-lg-12">
         <div class="form-group">
           <label for="cedula">Cedula</label>
           <input type="text" class="form-control" id="cedula" name="cedula"  value="{{ $usuario->cedula ?: Request::old('cedula') }}">
         </div>
       </div>

        <div class="col-lg-12">
         <div class="form-group">
           <label for="first_name">Nombre</label>
           <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $usuario->first_name ?: Request::old('first_name') }}">
         </div>
       </div>



        <div class="col-lg-12">
         <div class="form-group">
           <label for="last_name">Apellidos</label>
            <input type="text" class="form-control" name="last_name" id="last_name"  value="{{ $usuario->last_name ?: Request::old('last_name') }}">
         </div>
       </div>

       <div class="col-lg-12">
         <div class="form-group">
           <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email"  value="{{ $usuario->email ?: Request::old('email') }}">
         </div>
       </div>

        <div class="col-lg-12">
         <div class="form-group">
           <label for="password">Contrase&ntilde;a</label>
            <input type="password" class="form-control" name="password" id="password"  value="{{ $usuario->email ?: Request::old('password') }}">
         </div>
       </div>
    


     </div> <!--end row -->
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar-{{$usuario->id}}"><i class="fa fa-trash"></i> Eliminar</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Actualizar</button>
  </div>
 </form>

</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->

@include('modulos.usuarios.modals.eliminar_usuario')