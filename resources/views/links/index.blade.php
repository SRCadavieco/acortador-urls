<x-app-layout>
  <div class="mis-links-container">
    <h1>Mis links</h1>

    @foreach ($links as $link)
      <div class="link-card">
       <p>Original URL: 
  <a href="{{ $link->original_url }}" target="_blank" class="truncate-text">
    {{ $link->original_url }}
  </a>
</p>

<p>URL acortada: 
  <a href="{{ url('/' . ($link->custom_alias ?: $link->shortened_url)) }}" target="_blank" class="truncate-text">
    {{ url('/' . ($link->custom_alias ?: $link->shortened_url)) }}
  </a>
</p>


        <p>Alias: 
          <span>{{ $link->custom_alias ?? 'N/A' }}</span>
        </p>

    

        @if($link->expires_at)
          <p>Expira: {{ \Carbon\Carbon::parse($link->expires_at)->format('d/m/Y H:i') }}</p>
        @endif

        <a href="{{ route('links.show', $link->id) }}">→ Ver estadísticas</a>
      </div>
    @endforeach
  </div>
</x-app-layout>
