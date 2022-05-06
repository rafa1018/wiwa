 <!-- Modal -->
 <div class="modal fade" id="crear-usuario">
  <div class="modal-dialog ">
   <div class="modal-content border-primary">
    <div class="modal-header bg-primary">
      <h5 class="modal-title text-white">CREAR NUEVO USUARIO</h5>
      <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form method="POST" action="{{route('crear.usuario')}}">
     <div class="modal-body">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">

       <div class="row">

        <div class="col-lg-12">
           <div class="form-group{{ $errors->has('role_id') ? ' has-error' : ''}}">
            <label for="role_id">Tipo de rol</label>
          <select class="form-control" id="role_id" name="role_id" required>
            <option value="" selected="">Elegir rol...</option>
            @foreach($roles as $role)   
             @if(Auth::user()->role_id == 1)
             <option value="1">Administrador</option>
             @endif
            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
            @endforeach
          </select>
          </div>
        </div><!--end col-lg-12 -->


        <div class="col-lg-6">
         <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
           <label for="name">Usuario</label>
           <input type="text" class="form-control" id="name" name="name" value="{{Request::old('name') }}"  placeholder="Usuario de acceso" autocomplete="off" required>
           @if ($errors->has('name'))
           <span class="help-block">{{ $errors->first('name')}}</span>
           @endif
         </div>
       </div>

        <div class="col-lg-6">
         <div class="form-group{{ $errors->has('cedula') ? ' has-error' : ''}}">
           <label for="name">Cedula</label>
           <input type="text" class="form-control" id="cedula" name="cedula" value="{{Request::old('cedula') }}"  placeholder="Cedula" autocomplete="off" required>
           @if ($errors->has('name'))
           <span class="help-block">{{ $errors->first('cedula')}}</span>
           @endif
         </div>
       </div>


       <div class="col-lg-6">
         <div class="form-group{{ $errors->has('first_name') ? ' has-error' : ''}}">
           <label for="first_name">Nombres</label>
           <input type="text" class="form-control" id="first_name" name="first_name" value="{{Request::old('first_name') }}"  placeholder="Ej: Juan Andres" autocomplete="off"  required>
           @if ($errors->has('first_name'))
           <span class="help-block">{{ $errors->first('first_name')}}</span>
           @endif
         </div>
       </div>

        <div class="col-lg-6">
         <div class="form-group{{ $errors->has('last_name') ? ' has-error' : ''}}">
           <label for="last_name">Apellidos</label>
           <input type="text" class="form-control" id="last_name" name="last_name" value="{{Request::old('last_name') }}"  placeholder="Ej: Perez" autocomplete="off"  required>
           @if ($errors->has('last_name'))
           <span class="help-block">{{ $errors->first('last_name')}}</span>
           @endif
         </div>
       </div>

        <div class="col-lg-12">
         <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
           <label for="email">Correo Electronico</label>
           <input type="text" class="form-control" id="email" name="email" value="{{Request::old('email') }}"  placeholder="usuario@owybt.com" autocomplete="off"  required>
           @if ($errors->has('email'))
           <span class="help-block">{{ $errors->first('email')}}</span>
           @endif
         </div>
       </div>

         <div class="col-lg-12">
         <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
           <label for="password">Contrase&ntilde;a</label>
           <input type="password" class="form-control" id="password" name="password" value="{{Request::old('password') }}" required>
           @if ($errors->has('password'))
           <span class="help-block">{{ $errors->first('password')}}</span>
           @endif
         </div>
       </div>





     </div> <!--end row -->





   </div><!--edn modal-body-->
   <div class="modal-footer">
    <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Guardar</button>
  </div>


</form>
</div>
</div>
</div>