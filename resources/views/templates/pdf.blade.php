<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Imprimir PDF</title>
  <!--favicon-->
  <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <!-- notifications css -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}"/>
   <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/dist/summernote-bs4.css') }}"/>

   <!--inputtags-->
  <link href="{{ asset('assets/plugins/inputtags/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
  <!--Bootstrap Datepicker-->
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
  <!-- simplebar CSS-->
  <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Horizontal menu CSS-->
  <link href="{{ asset('assets/css/horizontal-menu.css') }}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>
  <link href="{{ asset('assets/css/steps-wizard.css') }}" rel="stylesheet"/>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYG5g2aJ9TjMlbYk7E_VuFYKSvHC1Ee6Y&libraries=places" type="text/javascript"></script>
  
</head>

<body>



  <!-- Start wrapper-->
  <div id="wrapper">

   <!--Start topbar header-->
   @include('templates.partials.header')
   <!--End topbar header-->

   <!-- start horizontal Menu -->
   @include('templates.partials.navbar')
   <!-- end horizontal Menu -->

   <div class="clearfix"></div>

   <div class="content-wrapper">
    <div class="container-fluid">
@include('templates.partials.notificaciones')
   @yield('content')


<!--start overlay-->
<div class="overlay toggle-menu"></div>
<!--end overlay-->
</div>
<!-- End container-fluid-->

</div><!--End content-wrapper-->
<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->

<!--Start footer-->
@include('templates.partials.footer')
<!--End footer-->


</div><!--End wrapper-->


<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- simplebar js -->
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
<!-- horizontal-menu js -->
<script src="{{ asset('assets/js/horizontal-menu.js') }}"></script>

<!-- Custom scripts -->
<script src="{{ asset('assets/js/app-script.js') }}"></script>

   <!--notification js -->
  <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>


  
<script src="{{ asset('assets/js/upload-file.js') }}"></script>

 <script src="{{ asset('assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
  <script>
   $('#summernoteEditor').summernote({
            height: 400,
            tabsize: 2
        });
  </script>


<script src="{{ asset('assets/js/steps-wizard.js') }}"></script>

 <!--Inputtags Js-->
    <script src="{{ asset('assets/plugins/inputtags/js/bootstrap-tagsinput.js') }}"></script>


 <!--Bootstrap Datepicker Js-->
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
      $('#default-datepicker').datepicker({
        todayHighlight: true
      });
      $('#autoclose-datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
      });

      $('#inline-datepicker').datepicker({
         todayHighlight: true
      });

      $('#dateragne-picker .input-daterange').datepicker({
       });

    </script>



<script>
    var latitud = {{$proceso->latitud }};
    var longitud = {{$proceso->longitud }};

var map = new google.maps.Map(document.getElementById('map-canvas'),{

center:{
    lat: latitud,
    lng:  longitud
 },
 zoom:19
});
var marker= new google.maps.Marker({
 position:{
  lat: latitud,
  lng:  longitud
 },
 map:map,
 draggable:true
});
var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
google.maps.event.addListener(searchBox,'places_changed',function(){
var places = searchBox.getPlaces();
var bounds = new google.maps.LatLngBounds();
var i , place;
for(i=0;place=places[i];i++){
 bounds.extend(place.geometry.location);
 marker.setPosition(place.geometry.location);
}
map.fitBounds(bounds);
map.setZoom(17);
});
google.maps.event.addListener(marker,'position_changed',function(){
 var lat = marker.getPosition().lat();
 var lng = marker.getPosition().lng();
 $('#lat').val(lat);
 $('#lng').val(lng);
});
</script>



<script language="Javascript">
function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
}
  </script>


</body>
</html>
