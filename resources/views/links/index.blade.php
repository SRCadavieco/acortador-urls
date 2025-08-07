<x-app-layout>
 <h1>Mis links</h1>
 @foreach ($links as $link)
    <div class="bg-white p-4 rounded shadow mb-4">
        <p class="text-gray-800">Original URL: <a href="{{ $link->original_url }}" class="text-blue-600 hover:underline">{{ $link->original_url }}</a></p>
        <p class="text-gray-600">Alias: <span class="font-semibold">{{ $link->custom_alias ?? 'N/A' }}</span></p>
        @if($link->expires_at)
            <p class="text-red-500">Expira: {{ \Carbon\Carbon::parse($link->expires_at)->format('d/m/Y H:i') }}</p>
        @endif
        <a href="{{ route('links.show', $link->id) }}" class="text-blue-600 hover:underline mt-2 inline-block">Ver estadísticas</a>
    </div>
 
 @endforeach
</x-app-layout>