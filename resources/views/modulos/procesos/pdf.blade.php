 @extends('templates.pdf')

 @section('content')

 <?php $fecha_naci = $proceso->fecha_nacimiento;
 $fecha_nacimiento = date("d-m-Y", strtotime($fecha_naci)); ?>

 <?php $fecha_denun = $proceso->fecha_denuncia;
 $fecha_denuncia = date("d-m-Y", strtotime($fecha_denun)); ?>
 <div id="areaImprimir">
  <div class="row">
   <div class="col-md-12">
     <div class="card">
       <div class="card-body">
        <div class="center">
         <img src="{{asset('assets/images/logo-icon.png')}}">
         <h3>OWYBT</h3><br>
       </div>

       <p id="p-25">El Sr(Sra). <strong>{{$proceso->nombres}} {{$proceso->apellidos}} </strong> identificado con {{$proceso->tipo}} <strong>{{$proceso->identificacion}}</strong> de genero
         @if($proceso->sexo == 'M')masculino
         @else   	
         femenino
         @endif 
         nacido(a) el {{$fecha_nacimiento}}, declara que en el lugar de los hechos ubicado en la <strong>{{$proceso->lugar_hechos}}</strong> con fecha {{$fecha_denuncia}} en la fiscalia {{$proceso->fiscalia}} con n&uacute;mero de radicado <strong>{{$proceso->radicado}}</strong> narra los siguientes hechos: <br>
       </p>


       <p id="p-25">
        {{$proceso->hechos}}
      </p>
      <hr>


      <p id="p-25">La persona responsable <strong>{{$proceso->responsable}}</strong> bajo los siguientes hechos victimizante(s): <span>{{$proceso->victimizante}}</span></p>

    </div><!--end card-body -->

  </div><!--End card-->
</div>
</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="float-right">
			<input type="button" onclick="printDiv('areaImprimir')" class="btn btn-primary" value="Imprimir Proceso" />
		</div>
	</div>
</div>

@endsection