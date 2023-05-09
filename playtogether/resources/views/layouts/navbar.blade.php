<nav class="sidebar close">
    <header class="nav">
      <div class="image-text">
        <span class="image">
          <img src="img/user0.jpg" alt="user">
        </span>

        <div class="text header-text">
          <span class="name">{{$user->name}}</span>
          <span class="profession">{{$user->l_name}}</span>
        </div>
      </div>

      <i class='bx bx-chevron-right toggle'></i>

    </header>

    <!--SIDEBAR-->

    <div class="menu-bar">
      <div class="menu">
        <ul>
        <li class="buscador">
          <i class='bx bx-search icon'></i>
          <input type="search" placeholder="Buscar...">
        </li>
      </ul>
        <ul class="menu-links">
          <li class="nav link">
            <a href="{{route('home')}}">
              <i class='bx bx-home icon'></i>
              <span class="text nav-text">Inicio</span>
            </a>
          </li>
          <li class="nav link">
            <a href="#">
              <i class='bx bx-chat icon'></i>
              <span class="text nav-text">Mensajes</span>
            </a>
          </li>
          <li class="nav link">
            <a href="{{route('usuarios')}}">
              <i class='bx bx-group icon'></i>
              <span class="text nav-text">Usuarios</span>
            </a>
          </li>
          <li class="nav link">
            <a href="#">
              <i class='bx bx-store icon'></i>
              <span class="text nav-text">Mercadillo</span>
            </a>
          </li>
          <li class="nav link">
            <a href="{{ route('config') }}">
              <i class='bx bx-cog icon'></i>
              <span class="text nav-text">Configuración</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="bottom-content">
        <ul>
        <li class="">
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <i class="bx bx-log-out icon"></i>
            <span class="text nav-text">{{ __('Salir') }}</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
      <ul>
        <li class="mode">
          <div class="moon-sun">
            <i class="bx bx-moon icon moon"></i>
            <i class="bx bx-sun icon sun"></i>
          </div>
          <span class="mode-text text">Modo Oscuro</span>

          <div class="toggle-switch">
            <span class="switch"></span>
          </div>
        </li>
      </ul>
      </div>
    </div>
  </nav>
