<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto - Aura Glow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    @include('layouts.navbar')

    <main class="max-w-3xl mx-auto px-4 py-10">
        
        <!-- Encabezado -->
        <div class="mb-8">
            <a href="{{ route('products.index') }}" class="text-xs font-bold text-pink-600 hover:text-pink-700 flex items-center gap-1 mb-2">
                ← Volver al catálogo
            </a>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight flex items-center gap-2">
                Agregar Nuevo Producto ✨
            </h1>
        </div>

        <!-- Tarjeta del Formulario -->
        <div class="bg-white rounded-3xl p-8 border border-pink-100 shadow-sm">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-xs font-extrabold text-gray-700 uppercase mb-2">Nombre del Producto *</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ej. Blush Liquido Pink Up" required class="w-full px-4 py-3 rounded-2xl border border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition text-sm font-semibold">
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-gray-700 uppercase mb-2">Categoría *</label>
                    <select name="category_id" required class="w-full px-4 py-3 rounded-2xl border border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition text-sm font-semibold text-gray-700">
                        <option value="" disabled selected>Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->nombre ?? $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-extrabold text-gray-700 uppercase mb-2">Precio ($ MXN) *</label>
                        <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" placeholder="0.00" required class="w-full px-4 py-3 rounded-2xl border border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition text-sm font-semibold">
                    </div>
                    <div>
                        <label class="block text-xs font-extrabold text-gray-700 uppercase mb-2">Stock Inicial *</label>
                        <input type="number" name="stock" value="{{ old('stock', 10) }}" required class="w-full px-4 py-3 rounded-2xl border border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition text-sm font-semibold">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-gray-700 uppercase mb-2">Descripción</label>
                    <textarea name="descripcion" rows="4" placeholder="Escribe los detalles, tonos o características del cosmético..." class="w-full px-4 py-3 rounded-2xl border border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 outline-none transition text-sm font-medium">{{ old('descripcion') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-gray-700 uppercase mb-2">Imagen de Producto</label>
                    <div class="p-4 bg-pink-50/50 rounded-2xl border border-pink-100">
                        <input type="file" name="imagen" accept="image/*" class="block w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-pink-100 file:text-pink-700 hover:file:bg-pink-200 cursor-pointer">
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('products.index') }}" class="px-6 py-3 rounded-2xl bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs uppercase transition">
                        Cancelar
                    </a>
                    <button type="submit" class="px-8 py-3 rounded-2xl text-white font-bold text-xs uppercase shadow-lg hover:bg-pink-700 transition" style="background-color: #db2777;">
                        Guardar Producto ✨
                    </button>
                </div>

            </form>
        </div>

    </main>

</body>
</html>