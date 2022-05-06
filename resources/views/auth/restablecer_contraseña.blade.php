<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Restablecer Contrase&ntilde;a</title>
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <!-- notifications css -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}"/>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>
  
</head>

<body id="login">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">
@include('templates.partials.notificaciones')
	<div class="card card-authentication1 mx-auto my-10">
		<div class="card-body">
		 <div class="card-content p-2">
		  <div class="card-title text-uppercase pb-2">RESTABLECER LA CONTRASE&Nacute;A</div>
		    <p class="pb-2">Por favor, introduzca su dirección de correo electrónico. Recibirá un enlace para crear una nueva contraseña por correo electrónico.</p>
		    <form>
			  <div class="form-group">
			  <label for="exampleInputEmailAddress" class="">DIRECCI&Oacute;N DE CORREO ELECTR&Oacute;NICO</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputEmailAddress" class="form-control input-shadow" placeholder="Email Address">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>
			 
			  <button type="button" class="btn btn-warning btn-block mt-3">Restablecer la contrase&ntilde;a</button>
			 </form>
		   </div>
		  </div>
		   <div class="card-footer text-center py-3">
		    <p class="text-dark mb-0">Regresar a <a href="authentication-signin.html">Iniciar sesi&oacute;n</a></p>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	
  <!-- horizontal-menu js -->
  <script src="{{ asset('assets/js/horizontal-menu.js') }}"></script>
  
  <!-- Custom scripts -->
  <script src="{{ asset('assets/js/app-script.js') }}"></script>

     <!--notification js -->
  <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>


  
	
</body>
</html>
