<x-app-layout>
 <h1>Mis links</h1>
 @foreach ($links as $link)
    <div class="bg-white p-4 rounded shadow mb-4">
        <p class="text-gray-800">Original URL: <a href="{{ $link->original_url }}" class="text-blue-600 hover:underline">{{ $link->original_url }}</a></p>
        <p class="text-gray-600">Alias: <span class="font-semibold">{{ $link->custom_alias ?? 'N/A' }}</span></p>
    </div>
 
 @endforeach
</x-app-layout>