<x-app-layout>
    <h1>Estadísticas del enlace</h1>
    <div>
        <p>URL original: <a href="{{ $link->original_url }}">{{ $link->original_url }}</a></p>
        <p>Alias: <span>{{ $link->custom_alias ?? 'N/A' }}</span></p>
        <p>URL acortada: 
            <a href="{{ url('/' . ($link->custom_alias ?: $link->shortened_url)) }}" target="_blank">
                {{ url('/' . ($link->custom_alias ?: $link->shortened_url)) }}
            </a>
        </p>
        <p>Clicks: <span>{{ $link->click_count }}</span></p>
        @if($link->expires_at)
            <p>Expira: {{ $link->expires_at->format('d/m/Y H:i') }}</p>
        @endif
    </div>
    <form action="{{ route('links.destroy', $link->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este enlace?')">Eliminar enlace</button>
    </form>
    <a href="{{ route('links.index') }}">&larr; Volver a mis links</a>
</x-app-layout>
