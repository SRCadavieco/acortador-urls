<x-app-layout>
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('links.store') }}" method="POST">
        @csrf
        <input type="url" name="original_url" placeholder="https://example.com" required />
        <input type="text" name="custom_alias" placeholder="Alias personalizado (opcional)" />
        <input type="datetime-local" name="expires_at" placeholder="Expira en (opcional)" />
        <button type="submit">Acortar URL</button>
    </form>
</x-app-layout>
