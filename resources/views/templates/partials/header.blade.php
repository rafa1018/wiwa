<header class="topbar-nav">
 <nav class="navbar navbar-expand">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link" href="{{route('home')}}">
        <div class="media align-items-center">
        <img src="{{ asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="OWYBT">
          <div class="media-body">
            <h5 class="logo-text">OWYBT</h5>
          </div>
        </div>
     </a>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile">
          <img src="{{ asset('storage')}}/{{Auth::user()->avatar}}" class="img-circle" alt="{{Auth::user()->name}}"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">{{Auth::user()->name}}</h6>
            <p class="user-subtitle">{{Auth::user()->email}}</p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"> <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-power mr-2"></i> Salir</a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </li>
      </ul>
    </li>
  </ul>
</nav>
</header>