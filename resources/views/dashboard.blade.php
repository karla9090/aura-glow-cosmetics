<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-gray-900">
            Panel de Administración ✨
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Banner de Bienvenida -->
            <div style="background-color: #db2777;" class="rounded-3xl p-8 text-white shadow-lg">
                <h3 class="text-2xl font-black text-white">¡Hola, {{ Auth::user()->name }}! 🌸</h3>
                <p class="text-pink-100 text-sm mt-1">Resumen general del catálogo y stock de Aura Glow.</p>
            </div>

            <!-- TARJETAS DE MÉTRICAS (GRID DE 3 COLUMNAS) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Tarjeta 1: Productos Activos -->
                <div class="bg-white p-6 rounded-2xl border border-pink-200 shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-500">Productos Activos</span>
                        <p class="text-4xl font-black text-pink-600 mt-1">{{ $totalProductos ?? 0 }}</p>
                    </div>
                    <div style="background-color: #fce7f3;" class="w-14 h-14 rounded-2xl flex items-center justify-center text-3xl">
                        💄
                    </div>
                </div>

                <!-- Tarjeta 2: Categorías -->
                <div class="bg-white p-6 rounded-2xl border border-pink-200 shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-500">Categorías</span>
                        <p class="text-4xl font-black text-pink-600 mt-1">{{ $totalCategorias ?? 0 }}</p>
                    </div>
                    <div style="background-color: #fce7f3;" class="w-14 h-14 rounded-2xl flex items-center justify-center text-3xl">
                        🏷️
                    </div>
                </div>

                <!-- Tarjeta 3: Stock Bajo -->
                <div class="bg-white p-6 rounded-2xl border border-amber-200 shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-700">Stock Bajo (≤ 5)</span>
                        <p class="text-4xl font-black text-amber-600 mt-1">{{ $stockBajo ?? 0 }}</p>
                    </div>
                    <div style="background-color: #fef3c7;" class="w-14 h-14 rounded-2xl flex items-center justify-center text-3xl">
                        ⚠️
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>