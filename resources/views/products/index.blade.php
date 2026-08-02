<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900">
                    Catálogo de Productos 💄
                </h2>
                <p class="text-xs text-gray-500 mt-1">Administra tus cosméticos, precios e inventario</p>
            </div>
            <div>
                <a href="{{ route('products.create') }}" style="background-color: #db2777;" class="inline-flex items-center gap-2 px-5 py-2.5 text-white font-bold rounded-xl text-xs shadow-md hover:bg-pink-700 transition duration-200">
                    <span>+ Nuevo Producto</span>
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
                                <th class="py-4 px-6">Imagen</th>
                                <th class="py-4 px-6">Nombre</th>
                                <th class="py-4 px-6">Categoría</th>
                                <th class="py-4 px-6">Precio</th>
                                <th class="py-4 px-6">Stock</th>
                                <th class="py-4 px-6 text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-pink-50 text-sm">
                            @forelse($products as $product)
                                @php
                                    // Detectar atributos en español o inglés
                                    $nombre = $product->name ?? $product->nombre ?? 'Sin nombre';
                                    $precio = $product->price ?? $product->precio ?? 0;
                                    $imagen = $product->image ?? $product->imagen ?? $product->image_path ?? null;
                                    $categoriaNombre = $product->category->name ?? $product->category->nombre ?? $product->categoria->nombre ?? $product->categoria->name ?? 'Maquillaje';
                                @endphp
                                <tr class="hover:bg-pink-50/40 transition">
                                    <!-- Imagen -->
                                    <td class="py-3 px-6">
                                        @if($imagen)
                                            <img src="{{ asset('storage/' . $imagen) }}" alt="{{ $nombre }}" class="w-12 h-12 object-cover rounded-xl border border-pink-100 shadow-sm">
                                        @else
                                            <div class="w-12 h-12 rounded-xl bg-pink-100 text-pink-400 flex items-center justify-center font-bold text-xs">
                                                Sin Foto
                                            </div>
                                        @endif
                                    </td>

                                    <!-- Nombre -->
                                    <td class="py-3 px-6 font-bold text-gray-800 capitalize">
                                        {{ $nombre }}
                                    </td>

                                    <!-- Categoría Badge -->
                                    <td class="py-3 px-6">
                                        <span style="background-color: #fce7f3; color: #be185d;" class="inline-block px-3 py-1 rounded-full text-xs font-bold">
                                            {{ $categoriaNombre }}
                                        </span>
                                    </td>

                                    <!-- Precio -->
                                    <td class="py-3 px-6 font-extrabold text-pink-600">
                                        ${{ number_format($precio, 2) }}
                                    </td>

                                    <!-- Stock Badge -->
                                    <td class="py-3 px-6">
                                        @if($product->stock <= 5)
                                            <span style="background-color: #fef3c7; color: #b45309;" class="inline-block px-2.5 py-1 rounded-full text-xs font-bold">
                                                ⚠️ {{ $product->stock }} un.
                                            </span>
                                        @else
                                            <span style="background-color: #f0fdf4; color: #15803d;" class="inline-block px-2.5 py-1 rounded-full text-xs font-bold">
                                                {{ $product->stock }} un.
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Acciones -->
                                    <td class="py-3 px-6 text-right space-x-2">
                                        <a href="{{ route('products.edit', $product) }}" class="inline-block px-3 py-1.5 bg-pink-50 text-pink-600 hover:bg-pink-600 hover:text-white font-bold text-xs rounded-lg transition">
                                            Editar
                                        </a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
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
                                    <td colspan="6" class="py-8 text-center text-gray-400 text-sm">
                                        No hay productos registrados aún.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if(method_exists($products, 'links'))
                    <div class="p-4 border-t border-pink-100 bg-pink-50/20">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>