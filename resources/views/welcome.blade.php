<x-app-layout>
    {{-- Contenedor del formulario --}}
    <div class="url-shortener-container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('links.store') }}" method="POST" class="shortener-form">
            @csrf

            <h1 class="form-title">Acorta tu URL</h1>

            <input type="url" name="original_url" placeholder="https://example.com" required class="input-field" />

            <input type="text" name="custom_alias" placeholder="Alias personalizado (opcional)" class="input-field" />

            <div class="radio-wrapper">
                <label>
                    <input type="checkbox" name="expiration_option" id="enable_expiration" />
                    Enlace temporal
                </label>
            </div>

            <div class="expires-at-wrapper hidden" id="expiration_input">
                <input type="datetime-local" name="expires_at" class="input-field" />
            </div>

            <button type="submit" class="submit-btn">Acortar URL</button>
        </form>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const checkbox = document.getElementById('enable_expiration');
        const expirationInput = document.getElementById('expiration_input');

        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                expirationInput.classList.remove('hidden');
            } else {
                expirationInput.classList.add('hidden');
            }
        });
    });
</script>

</x-app-layout>
