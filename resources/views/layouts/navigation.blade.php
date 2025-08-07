<nav x-data="{ open: false }">
  <div>
    <div>
      <div>
        <!-- Logo -->
        <div>
          <a href="{{ url('/') }}">
            <x-application-logo />
          </a>
        </div>

      <!-- Menú derecho -->
      <div>
        @guest
          <a href="{{ route('login') }}">Iniciar sesión</a>
          <a href="{{ route('register') }}">Registrarse</a>
        @else
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button>
                <div>{{ Auth::user()->name }}</div>
                <div>
                  <svg viewBox="0 0 20 20"><path fill-rule="evenodd" clip-rule="evenodd"
                     d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0
                     111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                  </svg>
                </div>
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link :href="route('links.index')">
                {{ __('Mis links') }}
              </x-dropdown-link>
              <x-dropdown-link :href="route('profile.edit')">
                {{ __('Mi perfil') }}
              </x-dropdown-link>
              <!-- Logout -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                                 onclick="event.preventDefault(); this.closest('form').submit();">
                  {{ __('Cerrar sesión') }}
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
        @endguest
      </div>

      <!-- Menú hamburguesa responsive -->
      <div>
        <button @click="open = !open">
          <svg stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
            <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Menú responsive -->
  <div :class="{'block': open, 'hidden': !open}">
    <div>
      <div>
        <div>{{ Auth::check() ? Auth::user()->name : 'Invitado' }}</div>
      </div>
      <div>
        @guest
          <x-responsive-nav-link :href="route('login')">{{ __('Iniciar sesión') }}</x-responsive-nav-link>
          <x-responsive-nav-link :href="route('register')">{{ __('Registrarse') }}</x-responsive-nav-link>
        @else
          <x-responsive-nav-link :href="route('profile.edit')">{{ __('Profile') }}</x-responsive-nav-link>
          <x-responsive-nav-link :href="route('links.index')">{{ __('Mis links') }}</x-responsive-nav-link>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">
              {{ __('Cerrar sesión') }}
            </x-responsive-nav-link>
          </form>
        @endguest
      </div>
    </div>
  </div>
</nav>
