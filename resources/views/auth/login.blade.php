@extends('templates.auth')

@section('content')


<div class="card card-authentication3 mx-auto my-10">
        <div class="card-body">
         <div class="card-content p-2">
            <div class="text-center">
                <img src="assets/images/logo-icon.png" alt="logo icon" style="height: 100px">
            </div>
          <div class="card-title text-uppercase text-center py-3">Iniciar Sesion</div>
             <form method="POST" action="{{ route('login') }}">
                        @csrf
              <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
              <label for="email" class="sr-only">Usuario de ingreso</label>
               <div class="position-relative has-icon-right">
                  <input type="text" id="email" name="email" class="form-control input-shadow" value="{{ Request::old('email') ?: '' }}" required autocomplete="email" placeholder="usuario o email" autofocus>
                  <div class="form-control-position">
                      <i class="icon-user"></i>
                  </div>
                    @if ($errors->has('email'))
                                  <span class="help-block">
                                      {{ $errors->first('email')}}
                                  </span>
                                  @endif
               </div>
              </div>
              <div class="form-group">
              <label for="exampleInputPassword" class="sr-only" >Contrase&ntilde;a</label>
               <div class="position-relative has-icon-right">
                  <input type="password" id="exampleInputPassword" class="form-control input-shadow @error('password') is-invalid @enderror" name="password" required autocomplete="Contraseña" placeholder="Contrase&ntilde;a">
                  <div class="form-control-position">
                      <i class="icon-lock"></i>
                  </div>
                   @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
               </div>
              </div>
            <div class="form-row">
             <div class="form-group col-12">
              <a href="{{route('restablecer.password')}}">Restablecer la contrase&ntilde;a</a>
             </div>
            </div>
            <div class="float-sm-right">
             <button type="submit" class="btn btn-primary"><span class="ti-arrow-right"></span> Ingresar</button>
             </div>
             </form>
           </div>
          </div>



       </div>

          


         
         </div>
    
     <!--Start Back To Top Button-->







@endsection


