<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900">
                    Categorías de Productos 🏷️
                </h2>
                <p class="text-xs text-gray-500 mt-1">Organiza y gestiona las colecciones de tu tienda</p>
            </div>
            <div>
                <a href="{{ route('categories.create') }}" style="background-color: #db2777;" class="inline-flex items-center gap-2 px-5 py-2.5 text-white font-bold rounded-xl text-xs shadow-md hover:bg-pink-700 transition duration-200">
                    <span>+ Nueva Categoría</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Contenedor Principal -->
            <div class="bg-white rounded-2xl border border-pink-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr style="background-color: #fdf2f8;" class="border-b border-pink-100 text-pink-700 text-xs font-extrabold uppercase tracking-wider">
                                <th class="py-4 px-6">ID</th>
                                <th class="py-4 px-6">Nombre de Categoría</th>
                                <th class="py-4 px-6">Productos Asociados</th>
                                <th class="py-4 px-6 text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-pink-50 text-sm">
                            @forelse($categories as $category)
                                @php
                                    // Detectar atributos en español o inglés
                                    $nombreCategoria = $category->name ?? $category->nombre ?? 'Sin nombre';
                                    
                                    // Detectar relación de productos si existe
                                    $totalItems = 0;
                                    if (isset($category->products_count)) {
                                        $totalItems = $category->products_count;
                                    } elseif (method_exists($category, 'products')) {
                                        $totalItems = $category->products()->count();
                                    } elseif (method_exists($category, 'productos')) {
                                        $totalItems = $category->productos()->count();
                                    }
                                @endphp
                                <tr class="hover:bg-pink-50/40 transition">
                                    <!-- ID -->
                                    <td class="py-4 px-6 font-bold text-gray-400 text-xs">
                                        #{{ $category->id }}
                                    </td>

                                    <!-- Nombre -->
                                    <td class="py-4 px-6 font-bold text-gray-800 capitalize">
                                        {{ $nombreCategoria }}
                                    </td>

                                    <!-- Conteo Productos -->
                                    <td class="py-4 px-6">
                                        <span style="background-color: #fce7f3; color: #be185d;" class="inline-block px-3 py-1 rounded-full text-xs font-bold">
                                            {{ $totalItems }} ítems
                                        </span>
                                    </td>

                                    <!-- Acciones -->
                                    <td class="py-4 px-6 text-right space-x-2">
                                        <a href="{{ route('categories.edit', $category) }}" class="inline-block px-3 py-1.5 bg-pink-50 text-pink-600 hover:bg-pink-600 hover:text-white font-bold text-xs rounded-lg transition">
                                            Editar
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white font-bold text-xs rounded-lg transition">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-8 text-center text-gray-400 text-sm">
                                        No hay categorías creadas aún.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if(method_exists($categories, 'links'))
                    <div class="p-4 border-t border-pink-100 bg-pink-50/20">
                        {{ $categories->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>