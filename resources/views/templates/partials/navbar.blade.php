  <nav>
    <!-- Menu Toggle btn-->
    <div class="menu-toggle">
      <h3>Menu</h3>
      <button type="button" id="menu-btn">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <ul id="respMenu" class="horizontal-menu">

     <li>
      <a href="{{route('home')}}">
        <i class="zmdi zmdi-view-dashboard"></i>
        <span class="title">Inicio</span>
      </a>
    </li> 

    <li>
      <a href="{{route('listado.procesos')}}">
        <i class="zmdi zmdi-assignment"></i>
        <span class="title">Archivo de casos</span>
      </a>
    </li> 
 
    @if(Auth::user()->role_id == 1)
    <li>
      <a href="{{route('usuarios')}}">
        <i class="zmdi zmdi-accounts"></i>
        <span class="title">Administracion de usuarios</span>
      </a>
    </li> 
    @endif

  </ul>
</nav>