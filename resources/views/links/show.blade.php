<x-app-layout>
  <div class="stats-dashboard">
    <h1>Estadísticas del enlace</h1>

    <div class="stats-cards">
      <div class="stats-card">
        <h3>URL original</h3>
        <a href="{{ $link->original_url }}" target="_blank">{{ $link->original_url }}</a>
      </div>

      <div class="stats-card">
        <h3>Alias</h3>
        <p>{{ $link->custom_alias ?? 'N/A' }}</p>
      </div>

      <div class="stats-card">
        <h3>URL acortada</h3>
        <a href="{{ url('/' . ($link->custom_alias ?: $link->shortened_url)) }}" target="_blank">
          {{ url('/' . ($link->custom_alias ?: $link->shortened_url)) }}
        </a>
      </div>

      <div class="stats-card">
        <h3>Clicks</h3>
        <p>{{ $link->click_count }}</p>
      </div>

      @if($link->expires_at)
        <div class="stats-card">
          <h3>Expira</h3>
          <p>{{ $link->expires_at->format('d/m/Y H:i') }}</p>
        </div>
      @endif
    </div>


    <div class="chart-placeholder">
      Aquí se mostrará un gráfico de clicks
    </div>

    <form action="{{ route('links.destroy', $link->id) }}" method="POST" class="delete-form">
      @csrf
      @method('DELETE')
      <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este enlace?')">
        Eliminar enlace
      </button>
    </form>

    <a href="{{ route('links.index') }}" class="back-link">&larr; Volver a mis links</a>
  </div>
</x-app-layout>
