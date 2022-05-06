 @extends('templates.ver_procesos')

@section('content')

<form method="POST" action="/procesos/update" enctype="multipart/form-data">

     <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
        <h4 class="page-title">PROCESOS</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Principal</a></li>
             <li class="breadcrumb-item active" aria-current="page">Informacion del proceso</li>
         </ol>
     </div>
     <div class="col-sm-3">
       <div class="btn-group float-sm-right">
       <a class="btn btn-info" href="/procesos/imprimir/{{$proceso->id}}">VER PDF</a>
      
      
      </div>


     </div>
     </div>



       <input type="hidden" name="_token" value="{{ csrf_token() }}">


             <input type="hidden" name="id_proceso" value="{{$proceso->id }}">
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">Informacion </div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						 <div class="form-group">
                      <label for="tipo_id">Tipo de documento</label>
                      <select class="custom-select" id="tipo_id" name="tipo_id" required>
                      <option value="{{$proceso->tipo}}" selected>{{$proceso->tipo}}</option>
                        <option value="CC">CC</option>
                        <option value="NIT">NIT</option>
                        <option value="NUIP">NUIP</option>
                        <option value="TI">TI</option>
                      </select>
                    </div><!--end form-group-->
					</div><!--end col-lg-6 -->

                    <div class="col-lg-6">
                      <div class="form-group{{ $errors->has('identificacion') ? ' has-error' : ''}}">
                        <label for="identificacion">Identificacion</label>
                          <input type="text" name="identificacion" class="form-control" value="{{ $proceso->identificacion ?: Request::old('identificacion') }}">
                          @if ($errors->has('identificacion'))
                            <span class="help-block">{{ $errors->first('identificacion')}}</span>
                          @endif
                        </div><!--end form-group-->
                    </div><!--end col-lg-6-->


                     <div class="col-lg-6">
                    <div class="form-group{{ $errors->has('nombres') ? ' has-error' : ''}}">
                      <label for="nombres">Nombres</label>
                      <input type="text" name="nombres" class="form-control" value="{{ $proceso->nombres ?: Request::old('nombres') }}">
                       @if ($errors->has('nombres'))
                          <span class="help-block">{{ $errors->first('nombres')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->

                  <div class="col-lg-6">
                    <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : ''}}">
                      <label for="apellidos">Apellidos</label>
                      <input type="text" name="apellidos" class="form-control" value="{{ $proceso->apellidos ?: Request::old('apellidos') }}">
                       @if ($errors->has('apellidos'))
                          <span class="help-block">{{ $errors->first('apellidos')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->

                  <div class="col-lg-6">
                     <?php $fecha_naci = $proceso->fecha_nacimiento;
                     $fecha_nacimiento = date("d/m/Y", strtotime($fecha_naci)); ?>
                    <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : ''}}">
                      <label for="fecha_nacimiento">Fecha nacimiento</label>
                      <input type="text" id="default-datepicker" name="fecha_nacimiento" class="form-control" value="{{ $fecha_nacimiento ?: Request::old('fecha_nacimiento') }}">
                       @if ($errors->has('fecha_nacimiento'))
                          <span class="help-block">{{ $errors->first('fecha_nacimiento')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->



                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="tipo_id">Sexo</label><br>
                       	@if($proceso->sexo == "M")
                      <div class="icheck-material-primary icheck-inline">
                        <input type="radio" id="inline-radio-primary" name="sexo" value="M" checked/>
                        <label for="inline-radio-primary">Masculino </label>
                      </div>
                         <div class="icheck-material-info icheck-inline">
                        <input type="radio" id="inline-radio-info" value="F" name="sexo" />
                        <label for="inline-radio-info">Femenino</label>
                      </div>
                      @endif

                       @if($proceso->sexo == "F")
                          <div class="icheck-material-primary icheck-inline">
                        <input type="radio" id="inline-radio-primary" name="sexo" value="M" />
                        <label for="inline-radio-primary">Masculino </label>
                      </div>
                         <div class="icheck-material-info icheck-inline">
                        <input type="radio" id="inline-radio-info" value="F" name="sexo" checked />
                        <label for="inline-radio-info">Femenino</label>
                      </div>
                      @endif
                    </div>

                  </div><!--end col-lg-6-->



                  <div class="col-lg-12">
                    <div class="form-group{{ $errors->has('lugar_hechos') ? ' has-error' : ''}}">
                      <label for="lugar_hechos">Lugar de los hechos</label>
                      <input class="form-control" name="lugar_hechos" value="{{ $proceso->lugar_hechos ?: Request::old('lugar_hechos') }}">.
                       @if ($errors->has('lugar_hechos'))
                          <span class="help-block">{{ $errors->first('lugar_hechos')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->







				</div><!--end row -->



			</div><!--end card-body-->
	    </div>
	</div><!--end col-lg-6 -->



	          <div class="col-md-6">
            <div class="card">
              <div class="card-header">Ubicacion Exacta</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="searchmap" placeholder="Buscar ciudad o pais">
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->


                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control"   placeholder="Latitud" value="{{ $proceso->latitud ?: Request::old('latitud') }}" readonly disabled>
                      <input type="hidden" class="form-control"id="lat"  name="lat" placeholder="Latitud" value="{{ $proceso->latitud ?: Request::old('latitud') }}" >
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->


                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text"class="form-control"  placeholder="longitud" value="{{ $proceso->longitud ?: Request::old('longitud') }}" readonly disabled>
                      <input type="hidden"class="form-control" id="lng" name="lng"  placeholder="longitud" value="{{ $proceso->longitud ?: Request::old('longitud') }}" >
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->

                  <div class="col-lg-12">
                   <div id="map-canvas"></div>
                 </div>
               </div><!--end row -->
             </div><!--end card-body-->
           </div><!--end card-->

         </div> <!--col-md-6-->




</div><!--end row -->




     <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="row"> 
                <div class="col-lg-6">
                  <div class="row">
                   <div class="col-lg-12">
                    <?php $fecha_denun = $proceso->fecha_denuncia;
                     $fecha_denuncia = date("d/m/Y", strtotime($fecha_denun)); ?>
                    <div class="form-group{{ $errors->has('fecha_denuncia') ? ' has-error' : ''}}">
                      <label for="fecha_denuncia">Fecha denuncia</label>
                      <input type="text" id="autoclose-datepicker" name="fecha_denuncia" class="form-control" value="{{$fecha_denuncia?: Request::old('fecha_denuncia') }}">
                        @if ($errors->has('fecha_denuncia'))
                          <span class="help-block">{{ $errors->first('fecha_denuncia')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div>

                  <div class="col-lg-12">
                   <div class="form-group{{ $errors->has('fiscalia') ? ' has-error' : ''}}">
                    <label for="fiscalia">Fiscalia</label>
                    <input type="text" name="fiscalia" class="form-control" value="{{$proceso->fiscalia ?: Request::old('fiscalia') }}">
                      @if ($errors->has('fiscalia'))
                          <span class="help-block">{{ $errors->first('fiscalia')}}</span>
                       @endif
                  </div><!--end form-group-->
                </div><!--end col-lg-12-->

                <div class="col-lg-12">
                  <div class="form-group{{ $errors->has('radicado') ? ' has-error' : ''}}">
                    <label for="radicado">Radicado</label>
                    <input type="text" name="radicado" class="form-control" value="{{$proceso->radicado ?: Request::old('radicado') }}">
                    @if ($errors->has('radicado'))
                          <span class="help-block">{{ $errors->first('radicado')}}</span>
                       @endif

                  </div><!--end form-group-->
                </div><!--end col-lg-6-->



              </div><!--end row -->

            </div><!--end col-lg-6-->





            <div class="col-lg-6 text-center">
              <div class="form-group">
               <label for="tipo_id">Documento</label>
               <div class="subir_docs">
                   
                <a  class="text-success" id="link" href ="/storage/{{$proceso->constancia}}"  target="_blank">
                    <img src="{{ asset('assets/images/pdf.png') }}" style="width: 200px;">
                    
                    
                    
                </a>
                  
                </div>



             </div><!--end form-group-->
           </div><!--end col-lg-6-->

         </div><!--end row -->
       </div><!--end card-body-->
       </div><!--end card-->

       </div> <!--col-md-6-->


   <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group{{ $errors->has('hechos') ? ' has-error' : ''}}">
              <label for="hechos">Hechos</label>
              <textarea rows="8" id="hechos" name="hechos" class="form-control" id="basic-textarea" value="{{$proceso->hechos ?: Request::old('hechos') }}" placeholder="{{Request::old('hechos') }}">{{$proceso->hechos}}</textarea>
               @if ($errors->has('hechos'))
                          <span class="help-block">{{ $errors->first('hechos')}}</span>
                       @endif
            </div>
          </div><!--end col-lg-6-->
        </div><!--end row -->
      </div><!--end card-body-->
    </div><!--end card-->

  </div> <!--col-md-6-->

</div><!--end row -->




 <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Persona responsable</div>
                <div class="card-body">
                  <div class="row">
                   <div class="col-lg-12">

                     <div class="form-group{{ $errors->has('responsable') ? ' has-error' : ''}}">
                      <label for="responsable">Responsable</label>
                    <textarea rows="4" name="responsable" class="form-control" id="basic-textarea" value="{{$proceso->responsable ?: Request::old('responsable') }}">{{$proceso->responsable}}</textarea>
                       @if ($errors->has('responsable'))
                          <span class="help-block">{{ $errors->first('responsable')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->


                  <div class="col-lg-12">
                    <div class="form-group{{ $errors->has('victimizante') ? ' has-error' : ''}}">
                           <p>Hecho victimizante</p>
                        <input type="text" name="victimizante" class="form-control form-control-xl" data-role="tagsinput"  value="{{$proceso->victimizante ?: Request::old('victimizante') }}"/>
                         @if ($errors->has('victimizante'))
                          <span class="help-block">{{ $errors->first('victimizante')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->
                  
                  <div class="col-lg-5">
                    <div class="form-group">
                           <p>Usuario quien creo este proceso</p>
                        <input type="text"  class="form-control"  value="{{$proceso->first_name}} {{$proceso->last_name}}" disabled/>
                         
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->


                </div><!--end row -->
              </div><!--end card-body-->
            </div><!--end card-->

            </div> <!--col-md-6-->

       
       </div><!--end row -->

       <div class="row">
        <div class="col-lg-12">
          <div class="float-right">
          
          <button type="submit" class="btn btn-primary">Actualizar datos</button>
            </div>
        </div>
       </div>
</form>
@endsection