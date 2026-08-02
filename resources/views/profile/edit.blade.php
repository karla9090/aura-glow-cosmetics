<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Mi Cuenta / Perfil 🌸
            </h2>
          <a href="{{ url('/') }}" class="text-sm text-pink-600 hover:text-pink-700 font-semibold...">
                ← Volver a la Tienda
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-pink-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Información del Perfil -->
            <div class="p-6 sm:p-8 bg-white shadow-md rounded-2xl border border-pink-100">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Actualizar Contraseña -->
            <div class="p-6 sm:p-8 bg-white shadow-md rounded-2xl border border-pink-100">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Eliminar Cuenta -->
            <div class="p-6 sm:p-8 bg-white shadow-md rounded-2xl border border-red-100">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>