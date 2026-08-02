<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-gray-800">Crea tu cuenta ✨</h2>
        <p class="text-sm text-gray-500 mt-1">Únete a Aura Glow y realiza tus compras fácilmente</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Nombre -->
        <div>
            <label for="name" class="block text-xs font-bold uppercase text-gray-600 mb-1">Nombre Completo</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition text-sm">
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-xs font-bold uppercase text-gray-600 mb-1">Correo Electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition text-sm">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Contraseña -->
        <div>
            <label for="password" class="block text-xs font-bold uppercase text-gray-600 mb-1">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition text-sm">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirmar Contraseña -->
        <div>
            <label for="password_confirmation" class="block text-xs font-bold uppercase text-gray-600 mb-1">Confirmar Contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition text-sm">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <!-- Botón -->
        <div class="pt-4">
            <button type="submit" class="w-full py-3 px-4 bg-pink-600 hover:bg-pink-700 text-white font-bold rounded-xl shadow-md hover:shadow-lg transition duration-200 uppercase tracking-wider text-xs">
                Registrarse
            </button>
        </div>

        <div class="text-center pt-3">
            <a class="text-sm text-gray-600 hover:text-pink-600" href="{{ route('login') }}">
                ¿Ya tienes una cuenta? <span class="font-bold text-pink-600">Inicia sesión</span>
            </a>
        </div>
    </form>
</x-guest-layout>