<nav class="navbar" x-data="{ open: false }">
  <div class="navbar-container">
    <!-- Logo / Inicio -->
    <div class="navbar-logo">
      <a href="{{ url('/') }}" class="home-link">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-home" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3m-4 0h4" />
        </svg>
        <span>Inicio</span>
      </a>
    </div>

    <!-- Botones de sesión -->
    <div class="navbar-links">
      @guest
        <a href="{{ route('login') }}" class="btn-link">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="btn-link">Registrarse</a>
      @else
        <div class="dropdown">
          <button class="dropdown-toggle">
            <span>{{ Auth::user()->name }}</span>
            <svg class="icon-chevron" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0
                    111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
            </svg>
          </button>
          <div class="dropdown-menu">
            <a href="{{ route('links.index') }}">Mis links</a>
            <a href="{{ route('profile.edit') }}">Mi perfil</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                Cerrar sesión
              </a>
            </form>
          </div>
        </div>
      @endguest
    </div>

    <!-- Botón hamburguesa -->
    <button class="navbar-toggle" @click="open = !open">
      <svg class="icon-menu" viewBox="0 0 24 24">
        <path x-show="!open" d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path x-show="open" d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>
  </div>

  <!-- Menú responsive -->
  <div class="navbar-responsive" :class="{ 'open': open }">
    <div class="responsive-username">{{ Auth::check() ? Auth::user()->name : 'Invitado' }}</div>
    <div class="responsive-links">
      @guest
        <a href="{{ route('login') }}">Iniciar sesión</a>
        <a href="{{ route('register') }}">Registrarse</a>
      @else
        <a href="{{ route('links.index') }}">Mis links</a>
        <a href="{{ route('profile.edit') }}">Mi perfil</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
            Cerrar sesión
          </a>
        </form>
      @endguest
    </div>
  </div>
</nav>
