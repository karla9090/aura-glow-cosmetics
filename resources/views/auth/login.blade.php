<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-gray-800">¡Bienvenido de nuevo! ✨</h2>
        <p class="text-sm text-gray-500 mt-1">Ingresa tus credenciales para acceder</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-xs font-bold uppercase text-gray-600 mb-1">Correo Electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition text-sm">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Contraseña -->
        <div>
            <label for="password" class="block text-xs font-bold uppercase text-gray-600 mb-1">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition text-sm">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Opciones -->
        <div class="flex items-center justify-between text-sm pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-pink-600 focus:ring-pink-400 h-4 w-4">
                <span class="ms-2 text-gray-600">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-pink-600 hover:text-pink-700 font-semibold" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <!-- Botón -->
        <div class="pt-2">
            <button type="submit" class="w-full py-3 px-4 bg-pink-600 hover:bg-pink-700 text-white font-bold rounded-xl shadow-md hover:shadow-lg transition duration-200 uppercase tracking-wider text-xs">
                Iniciar Sesión
            </button>
        </div>

        <!-- Registro -->
        @if (Route::has('register'))
            <div class="text-center pt-4 border-t border-gray-100 mt-6">
                <p class="text-sm text-gray-600">
                    ¿Aún no tienes cuenta? 
                    <a href="{{ route('register') }}" class="font-bold text-pink-600 hover:text-pink-700">
                        Regístrate aquí
                    </a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>