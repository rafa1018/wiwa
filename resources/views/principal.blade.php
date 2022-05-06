  
@extends('templates.principal')

@section('content')

<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
  <div class="col-sm">
    <h4 class="page-title">CASOS</h4>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javaScript:void();">Principal</a></li>
      <li class="breadcrumb-item active" aria-current="page">Crear casos</li>
    </ol>
  </div>
  <div class="col-sm-3">
  </div>
</div>
<!-- End Breadcrumb-->



<div class="row">
  <div class="col-lg-12">
    <div class="wizard card-like">
      <form id="formulario" method="POST" action="{{route('guardar.procesos')}}" enctype="multipart/form-data">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="wizard-header">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="text-center">
               CREAR CASO
               <br>
               <small>Acontinuaci&oacute;n ingrese los datos solicitados
               </small>
             </h1>

             <div class="steps text-center">
              <div class="wizard-step active"></div>
              <div class="wizard-step"></div>
              <div class="wizard-step"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="wizard-body">
        <div class="step initial active">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Datos personales</div>
                <div class="card-body">
                  <div class="row">
                   <div class="col-lg-6">
                    <div class="form-group">
                      <label for="tipo_id">Tipo de documento</label>
                      <select class="custom-select" id="tipo_id" name="tipo_id" required>
                        <option value="" selected disabled>Seleccionar...</option>
                        <option value="CC">CC</option>
                        <option value="NIT">NIT</option>
                        <option value="NUIP">NUIP</option>
                        <option value="TI">TI</option>
                      </select>
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->


                  <div class="col-lg-6">
                    <div class="form-group{{ $errors->has('identificacion') ? ' has-error' : ''}}">
                      <label for="identificacion">Identificacion</label>
                      <input type="text" name="identificacion" class="form-control" value="{{Request::old('identificacion') }}" autocomplete="off" placeholder="Cedula o Nit" required>
                       @if ($errors->has('identificacion'))
                          <span class="help-block">{{ $errors->first('identificacion')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->


                  <div class="col-lg-6">
                    <div class="form-group{{ $errors->has('nombres') ? ' has-error' : ''}}">
                      <label for="nombres">Nombres</label>
                      <input type="text" name="nombres" class="form-control" value="{{Request::old('nombres') }}" autocomplete="off" placeholder="Juan"required>
                       @if ($errors->has('nombres'))
                          <span class="help-block">{{ $errors->first('nombres')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->

                  <div class="col-lg-6">
                    <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : ''}}">
                      <label for="apellidos">Apellidos</label>
                      <input type="text" name="apellidos" class="form-control" value="{{Request::old('apellidos') }}" autocomplete="off" placeholder="Perez" required>
                       @if ($errors->has('apellidos'))
                          <span class="help-block">{{ $errors->first('apellidos')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->
                
                <?php $today = now();
                    $fecha_na = date("d/m/Y", strtotime($today));
                ?>
                  <div class="col-lg-6">
                    <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : ''}}">
                      <label for="fecha_nacimiento">Fecha nacimiento</label>
                      <input type="text" id="default-datepicker" name="fecha_nacimiento" class="form-control" value="{{ $fecha_na ?: Request::old('fecha_nacimiento') }}" >
                       @if ($errors->has('fecha_nacimiento'))
                          <span class="help-block">{{ $errors->first('fecha_nacimiento')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->


                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="tipo_id">Sexo</label><br>
                      <div class="icheck-material-primary icheck-inline">
                        <input type="radio" id="inline-radio-primary" name="sexo" value="M" checked/>
                        <label for="inline-radio-primary">Masculino </label>
                      </div>
                      <div class="icheck-material-info icheck-inline">
                        <input type="radio" id="inline-radio-info" value="F" name="sexo"/>
                        <label for="inline-radio-info">Femenino</label>
                      </div>
                    </div>

                  </div><!--end col-lg-6-->


                  <div class="col-lg-12">
                    <div class="form-group{{ $errors->has('lugar_hechos') ? ' has-error' : ''}}">
                      <label for="lugar_hechos">Lugar de los hechos</label>
                      <input class="form-control" name="lugar_hechos" autocomplete="off" value="{{Request::old('lugar_hechos') }}" placeholder="Valledupar">.
                       @if ($errors->has('lugar_hechos'))
                          <span class="help-block">{{ $errors->first('lugar_hechos')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->

                </div><!--end row -->
              </div><!--end card-body-->
            </div><!--end card-->

            </div> <!--col-md-6-->

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
                      <input type="hidden" class="form-control" id="lat" name="lat" placeholder="Latitud" value="{{Request::old('lat') }}" >
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->


                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="hidden"class="form-control" id="lng" name="lng"  placeholder="longitud" value="{{Request::old('lng') }}" >
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




     </div><!--end step #1 -->


     <!-- step #2 -->
     <div class="step">
       <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
              <div class="row"> 
                <div class="col-lg-6">
                  <div class="row">
                   <div class="col-lg-12">
                    <div class="form-group{{ $errors->has('fecha_denuncia') ? ' has-error' : ''}}">
                      <label for="fecha_denuncia">Fecha denuncia</label>
                      <input type="text" id="autoclose-datepicker" name="fecha_denuncia" class="form-control" value="{{Request::old('fecha_denuncia') }}">
                        @if ($errors->has('fecha_denuncia'))
                          <span class="help-block">{{ $errors->first('fecha_denuncia')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div>

                  <div class="col-lg-12">
                   <div class="form-group{{ $errors->has('fiscalia') ? ' has-error' : ''}}">
                    <label for="fiscalia">Fiscalia</label>
                    <input type="text" name="fiscalia" class="form-control" value="{{Request::old('fiscalia') }}">
                      @if ($errors->has('fiscalia'))
                          <span class="help-block">{{ $errors->first('fiscalia')}}</span>
                       @endif
                  </div><!--end form-group-->
                </div><!--end col-lg-12-->

                <div class="col-lg-12">
                  <div class="form-group{{ $errors->has('radicado') ? ' has-error' : ''}}">
                    <label for="radicado">Radicado</label>
                    <input type="text" name="radicado" class="form-control" value="{{Request::old('radicado') }}">
                    @if ($errors->has('radicado'))
                          <span class="help-block">{{ $errors->first('radicado')}}</span>
                       @endif

                  </div><!--end form-group-->
                </div><!--end col-lg-6-->



              </div><!--end row -->

            </div><!--end col-lg-6-->





            <div class="col-lg-6 text-center">
              <div class="form-group">
               <label for="tipo_id">Subir Constancia</label>
               <div class="subir_docs">
                 <div class="file-upload">
                   <input type="file" id="constancia" name="constancia"   accept="application/pdf"/>
                     <i class="fa fa-arrow-up"></i>
                  </div>
                </div>



             </div><!--end form-group-->
           </div><!--end col-lg-6-->

         </div><!--end row -->
       </div><!--end card-body-->
       </div><!--end card-->

       </div> <!--col-md-6-->

   <div class="col-md-6">
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group{{ $errors->has('hechos') ? ' has-error' : ''}}">
              <label for="hechos">Hechos</label>
              <textarea rows="8" name="hechos" class="form-control" id="basic-textarea" value="{{Request::old('hechos') }}" placeholder="{{Request::old('hechos') }}"></textarea>
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
</div><!--end step #2 -->


<!-- steps # 3 -->
<div class="step">
    <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">Persona responsable</div>
                <div class="card-body">
                  <div class="row">
                   <div class="col-lg-12">

                     <div class="form-group{{ $errors->has('responsable') ? ' has-error' : ''}}">
                      <label for="responsable">Responsable</label>
                    <textarea rows="4" name="responsable" class="form-control" id="basic-textarea"></textarea>
                       @if ($errors->has('responsable'))
                          <span class="help-block">{{ $errors->first('responsable')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->


                  <div class="col-lg-12">
                    <div class="form-group{{ $errors->has('victimizante') ? ' has-error' : ''}}">
                           <p>Hecho victimizante</p>
                        <input type="text" name="victimizante" class="form-control form-control-xl" data-role="tagsinput" value="Homicidio,Desplazamiento"/>
                         @if ($errors->has('victimizante'))
                          <span class="help-block">{{ $errors->first('victimizante')}}</span>
                       @endif
                    </div><!--end form-group-->
                  </div><!--end col-lg-6-->


                </div><!--end row -->
              </div><!--end card-body-->
            </div><!--end card-->

            </div> <!--col-md-6-->

       
       </div><!--end row -->





</div> <!--end step # 3 -->


</div> <!--end wizard-body -->




<div class="wizard-footer">
  <div class="row">
    <div class="col-md-6">
      <div class="row">
    <div class="col-lg-6 pull-left block-center">
      <button id="wizard-prev" style="display:none" type="button" class="btn btn-irv btn-irv-default">
        Atras
      </button>
    </div>
      </div>
  </div><!--end col-lg-6 -->
   <div class="col-md-6">
    <div class="col-lg-6 pull-right text-center">
      <button id="wizard-next" type="button" class="btn btn-irv">
        Siguiente
      </button>
    </div>

    <div class="col-lg-6 pull-right block-center">
      <button id="wizard-subm" style="display:none" type="submit" class="btn btn-irv">
        Guardar proceso
      </button>
    
    </div>

     </div>
   </div>
</div>
</form>
</div>
</div>
</div>




@endsection