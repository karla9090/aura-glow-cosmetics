<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoría') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nombre de la Categoría</label>
                        <input type="text" name="nombre" value="{{ old('nombre', $category->nombre) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Descripción (Opcional)</label>
                        <textarea name="descripcion" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3">{{ old('descripcion', $category->descripcion) }}</textarea>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
                        <a href="{{ route('categories.index') }}" style="background-color: #6b7280; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                            Cancelar
                        </a>
                        <button type="submit" style="background-color: #db2777; color: white; padding: 10px 20px; border-radius: 6px; font-weight: bold; border: none; cursor: pointer;">
                            Actualizar Categoría
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>