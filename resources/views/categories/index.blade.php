<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Categorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold">Listado de Categorías</h3>
                    <a href="{{ route('categories.create') }}" class="text-white font-bold py-2 px-4 rounded" style="background-color: #db2777; text-decoration: none;">
                        + Nueva Categoría
                    </a>
                </div>

                <table class="min-w-full divide-y divide-gray-200" style="width: 100%; border-collapse: collapse;">
                    <thead style="background-color: #f9fafb;">
                        <tr>
                            <th style="padding: 12px 16px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase;">Nombre</th>
                            <th style="padding: 12px 16px; text-align: left; font-size: 12px; color: #6b7280; text-transform: uppercase;">Descripción</th>
                            <th style="padding: 12px 16px; text-align: center; font-size: 12px; color: #6b7280; text-transform: uppercase;">Total Productos</th>
                            <th style="padding: 12px 16px; text-align: right; font-size: 12px; color: #6b7280; text-transform: uppercase;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($categories as $category)
                            <tr style="border-bottom: 1px solid #e5e7eb;">
                                <td style="padding: 12px 16px; vertical-align: middle; font-weight: 600;">{{ $category->nombre }}</td>
                                <td style="padding: 12px 16px; vertical-align: middle; color: #4b5563;">{{ $category->descripcion ?? 'Sin descripción' }}</td>
                                <td style="padding: 12px 16px; vertical-align: middle; text-align: center; font-weight: 600;">{{ $category->products_count }}</td>
                                <td style="padding: 12px 16px; text-align: right; vertical-align: middle;">
                                    <a href="{{ route('categories.edit', $category->id) }}" style="color: #4f46e5; margin-right: 12px; text-decoration: none; font-weight: 600;">Editar</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color: #dc2626; background: none; border: none; cursor: pointer; font-weight: 600;">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="padding: 24px; text-align: center; color: #6b7280;">No hay categorías registradas aún.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>