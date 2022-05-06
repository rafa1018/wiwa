 @extends('templates.usuarios')

@section('content')

  <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
        <h4 class="page-title">ADMINISTRACION DE USUARIOS</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Principal</a></li>
            <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
         </ol>
     </div>
     <div class="col-sm-3">
       <div class="btn-group float-sm-right">
    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#crear-usuario" ><i class="fa fa-cog mr-1"></i> CREAR USUARIO</button>
      @include('modulos.usuarios.modals.crear_usuario')
       
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
     
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> LISTADO DE USUARIOS</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th>Usuario</th>
                        <th>Identificacion</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($usuarios as $usuario)
                   <tr>
                        <td><a href="#" data-toggle="modal" data-target="#editar-{{$usuario->id}}" >{{$usuario->display_name}}</a></td>
                        <td><a href="#" data-toggle="modal" data-target="#editar-{{$usuario->id}}" >{{$usuario->name}}</a></td>
                        <td><a href="#" data-toggle="modal" data-target="#editar-{{$usuario->id}}" >{{$usuario->cedula}}</a></td>
                        <td><a href="#" data-toggle="modal" data-target="#editar-{{$usuario->id}}" >{{$usuario->first_name}}</a></td>
                        <td><a href="#" data-toggle="modal" data-target="#editar-{{$usuario->id}}" >{{$usuario->last_name}}</a></td>
                        <td><a href="#" data-toggle="modal" data-target="#editar-{{$usuario->id}}" >{{$usuario->email}}</a></td>
                    </tr>

                    @include('modulos.usuarios.modals.editar_usuario')
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Rol</th>
                        <th>Usuario</th>
                        <th>Identificacion</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                    </tr>
                </tfoot>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->

  @endsection