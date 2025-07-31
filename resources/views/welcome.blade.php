<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Acortador de URLs</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow w-full max-w-md">
        @if(session('success'))
            <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('links.store') }}" method="POST">
            @csrf
            <input type="url" name="original_url" placeholder="https://example.com" required class="border p-2 w-full mb-4 rounded" />
            <input type="text" name="custom_alias" placeholder="Alias personalizado (opcional)" class="border p-2 w-full mb-4 rounded" />
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Acortar URL</button>
        </form>

        @auth
            <div class="mt-6">
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">Ver mis enlaces guardados</a>
            </div>
        @endauth
    </div>
</body>
</html>
