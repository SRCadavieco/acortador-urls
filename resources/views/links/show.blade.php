<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Estadísticas del enlace</h1>
    <div class="bg-white p-4 rounded shadow mb-4">
        <p class="text-gray-800">URL original: <a href="{{ $link->original_url }}" class="text-blue-600 hover:underline">{{ $link->original_url }}</a></p>
        <p class="text-gray-600">Alias: <span class="font-semibold">{{ $link->custom_alias ?? 'N/A' }}</span></p>
        <p class="text-gray-600">Clicks: <span class="font-bold">{{ $link->click_count }}</span></p>
        @if($link->expires_at)
            <p class="text-red-500">Expira: {{ $link->expires_at->format('d/m/Y H:i') }}</p>
        @endif
    </div>
    <a href="{{ route('links.index') }}" class="text-blue-600 hover:underline">&larr; Volver a mis links</a>
</x-app-layout>
