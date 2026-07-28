<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Se agregó enctype="multipart/form-data" para permitir subir archivos -->
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
                        <input type="text" name="nombre" value="{{ $product->nombre }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <!-- Categoría -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Categoría</label>
                        <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Precio y Stock -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Precio ($)</label>
                            <input type="number" step="0.01" name="precio" value="{{ $product->precio }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Stock</label>
                            <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                        <textarea name="descripcion" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3">{{ $product->descripcion }}</textarea>
                    </div>

                    <!-- Imagen del Producto -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Imagen del Producto</label>
                        @if ($product->imagen)
                            <div class="mb-2">
                                <span class="text-xs text-gray-500 block mb-1">Imagen actual:</span>
                                <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" class="w-20 h-20 object-cover rounded-md border">
                            </div>
                        @endif
                        <input type="file" name="imagen" accept="image/*" class="w-full border-gray-300 rounded-md shadow-sm">
                        <p class="text-xs text-gray-500 mt-1">Deja este campo en blanco si no deseas cambiar la imagen.</p>
                    </div>

                    <!-- Botones -->
                    <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
                        <a href="{{ route('products.index') }}" 
                           style="background-color: #6b7280; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                            Cancelar
                        </a>
                        <button type="submit" 
                                style="background-color: #db2777; color: white; padding: 10px 20px; border-radius: 6px; font-weight: bold; border: none; cursor: pointer;">
                            Actualizar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>