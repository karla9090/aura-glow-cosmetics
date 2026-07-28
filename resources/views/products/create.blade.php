<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Se incluye enctype para permitir el envío de archivos -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
                        <input type="text" name="nombre" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <!-- Categoría -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Categoría</label>
                        <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            <option value="">-- Selecciona una categoría --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Precio y Stock -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Precio ($)</label>
                            <input type="number" step="0.01" name="precio" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Stock Inicial</label>
                            <input type="number" name="stock" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                        <textarea name="descripcion" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3"></textarea>
                    </div>

                    <!-- Imagen del Producto con Previsualización -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Imagen del Producto</label>
                        <input type="file" name="imagen" id="imagen-input" accept="image/*" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                        
                        <!-- Vista previa de la imagen cargada -->
                        <div class="mt-3 hidden" id="preview-container">
                            <span class="text-xs text-gray-500 block mb-1">Vista previa de la imagen:</span>
                            <img id="image-preview" src="#" alt="Previsualización" class="w-32 h-32 object-cover rounded-md border shadow-sm">
                        </div>
                    </div>

                    <!-- Botones -->
                    <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
                        <a href="{{ route('products.index') }}" 
                           style="background-color: #6b7280; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                            Cancelar
                        </a>
                        <button type="submit" 
                                style="background-color: #db2777; color: white; padding: 10px 20px; border-radius: 6px; font-weight: bold; border: none; cursor: pointer;">
                            Guardar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script para generar la vista previa al seleccionar el archivo -->
    <script>
        document.getElementById('imagen-input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('image-preview').setAttribute('src', event.target.result);
                    document.getElementById('preview-container').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>