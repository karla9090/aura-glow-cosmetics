<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración Aura Glow') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tarjetas de Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Tarjeta 1: Total Productos -->
                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-pink-500 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-gray-500 uppercase">Productos Activos</p>
                        <p class="text-3xl font-extrabold text-gray-800">{{ $totalProductos }}</p>
                    </div>
                    <div class="p-3 bg-pink-100 text-pink-600 rounded-full">
                        ✨
                    </div>
                </div>

                <!-- Tarjeta 2: Categorías -->
                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-purple-500 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-gray-500 uppercase">Categorías</p>
                        <p class="text-3xl font-extrabold text-gray-800">{{ $totalCategorias }}</p>
                    </div>
                    <div class="p-3 bg-purple-100 text-purple-600 rounded-full">
                        🏷️
                    </div>
                </div>

                <!-- Tarjeta 3: Stock Crítico -->
                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-red-500 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-gray-500 uppercase">Stock Bajo (≤ 5)</p>
                        <p class="text-3xl font-extrabold text-gray-800">{{ $stockBajo }}</p>
                    </div>
                    <div class="p-3 bg-red-100 text-red-600 rounded-full">
                        ⚠️
                    </div>
                </div>
            </div>

            <!-- Accesos Rápidos -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Accesos Rápidos de Gestión</h3>
                <div class="flex gap-4">
                    <a href="{{ route('products.index') }}" style="background-color: #db2777; color: white; padding: 10px 20px; border-radius: 6px; font-weight: bold; text-decoration: none;">
                        Gestionar Productos
                    </a>
                    <a href="{{ route('categories.index') }}" style="background-color: #4f46e5; color: white; padding: 10px 20px; border-radius: 6px; font-weight: bold; text-decoration: none;">
                        Gestionar Categorías
                    </a>
                    <a href="{{ url('/') }}" target="_blank" style="background-color: #4b5563; color: white; padding: 10px 20px; border-radius: 6px; font-weight: bold; text-decoration: none;">
                        Ver Tienda Pública ↗
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>