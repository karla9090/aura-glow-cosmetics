<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catálogo de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold">Listado de Productos</h3>
                    <a href="{{ route('products.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" style="background-color: #db2777;">
                        + Nuevo Producto
                    </a>
                </div>

                <table class="min-w-full divide-y divide-gray-200" style="width: 100%; border-collapse: collapse;">
                    <thead class="bg-gray-50" style="background-color: #f9fafb;">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase" style="padding: 12px 16px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase;">Imagen</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase" style="padding: 12px 16px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase;">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase" style="padding: 12px 16px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase;">Categoría</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase" style="padding: 12px 16px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase;">Precio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase" style="padding: 12px 16px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase;">Stock</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase" style="padding: 12px 16px; text-align: right; font-size: 12px; color: #6b7280; text-transform: uppercase;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($products as $product)
                            <tr style="border-bottom: 1px solid #e5e7eb;">
                                <!-- Miniatura con tamaño fijo forzado -->
                                <td class="px-6 py-4 whitespace-nowrap" style="padding: 12px 16px; vertical-align: middle;">
                                    @if ($product->imagen)
                                        <img src="{{ asset('storage/' . $product->imagen) }}" 
                                             alt="{{ $product->nombre }}" 
                                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px; border: 1px solid #e5e7eb; display: block;">
                                    @else
                                        <span style="font-size: 12px; color: #9ca3af; font-style: italic;">Sin foto</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium" style="padding: 12px 16px; vertical-align: middle; font-weight: 600;">{{ $product->nombre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap" style="padding: 12px 16px; vertical-align: middle;">{{ $product->category->nombre ?? 'Sin categoría' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap" style="padding: 12px 16px; vertical-align: middle;">${{ number_format($product->precio, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap" style="padding: 12px 16px; vertical-align: middle;">{{ $product->stock }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium" style="padding: 12px 16px; text-align: right; vertical-align: middle;">
                                    <!-- Botón Editar -->
                                    <a href="{{ route('products.edit', $product->id) }}" style="color: #4f46e5; margin-right: 12px; text-decoration: none; font-weight: 600;">Editar</a>
                                    
                                    <!-- Formulario Eliminar -->
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color: #dc2626; background: none; border: none; cursor: pointer; font-weight: 600;">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500" style="padding: 24px; text-align: center; color: #6b7280;">No hay productos registrados aún.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>