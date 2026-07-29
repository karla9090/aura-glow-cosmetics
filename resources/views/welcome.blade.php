<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura Glow Cosmetics</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

   <nav class="bg-white shadow-md border-b border-pink-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-pink-600 no-underline">Aura Glow ✨</a>
            </div>

            <!-- Menú de Usuario / Autenticación -->
            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <!-- Si es Administrador, mostramos el botón del Panel -->
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-pink-600 hover:text-pink-800 mr-2">
                                📊 Panel Admin
                            </a>
                        @endif

                        <!-- Menú del Usuario Autenticado -->
                        <span class="text-sm font-bold text-gray-700">
                            👋 {{ Auth::user()->name }}
                        </span>

                        <a href="{{ route('profile.edit') }}" class="text-sm font-semibold text-gray-600 hover:text-pink-600">
                            Perfil
                        </a>

                        <!-- Formulario para Cerrar Sesión -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-sm font-semibold text-red-600 hover:text-red-800 bg-transparent border-0 cursor-pointer">
                                Cerrar Sesión
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700 hover:text-pink-600 mr-4">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-semibold text-white bg-pink-600 hover:bg-pink-700 px-4 py-2 rounded-lg" style="background-color: #db2777;">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>

    <!-- Header / Banner -->
    <header class="bg-pink-50 py-12 text-center border-b border-pink-100">
        <h2 class="text-4xl font-extrabold text-pink-900 mb-2">Realza tu belleza natural</h2>
        <p class="text-pink-700 text-lg">Descubre nuestra colección exclusiva de cosméticos y cuidado personal</p>
    </header>

    <!-- Filtros y Buscador -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <form action="{{ url('/') }}" method="GET" class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 flex flex-col md:flex-row gap-4 justify-between items-center">
            <!-- Buscar por Nombre -->
            <div class="w-full md:w-1/2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar productos por nombre..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <!-- Filtrar por Categoría -->
            <div class="w-full md:w-1/3">
                <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
                    <option value="">Todas las Categorías</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botones -->
            <div class="flex gap-2 w-full md:w-auto">
                <button type="submit" class="w-full md:w-auto px-6 py-2 text-white font-bold rounded-md" style="background-color: #db2777;">
                    Buscar
                </button>
                @if(request('search') || request('category_id'))
                    <a href="{{ url('/') }}" class="w-full md:w-auto px-4 py-2 bg-gray-200 text-gray-700 text-center font-bold rounded-md text-decoration-none">
                        Limpiar
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Catálogo de Productos -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition border border-gray-100 flex flex-col justify-between">
                    <div>
                        <!-- Imagen del producto -->
                        @if ($product->imagen)
                            <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" style="width: 100%; height: 200px; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 200px; background-color: #fce7f3; display: flex; align-items: center; justify-content: center; color: #f472b6;">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif

                        <div class="p-5">
                            <span class="text-xs font-semibold text-pink-600 uppercase tracking-wider block mb-1">
                                {{ $product->category->nombre ?? 'Sin categoría' }}
                            </span>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $product->nombre }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->descripcion ?? 'Sin descripción disponible.' }}</p>
                        </div>
                    </div>

                    <div class="px-5 pb-5 flex justify-between items-center">
                        <span class="text-xl font-extrabold text-gray-900">${{ number_format($product->precio, 2) }}</span>
                        <span class="text-xs px-2 py-1 rounded-full {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->stock > 0 ? 'Stock: ' . $product->stock : 'Agotado' }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">No se encontraron productos que coincidan con tu búsqueda.</p>
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>