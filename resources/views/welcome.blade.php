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

            <!-- Menú de Usuario / Autenticación / Carrito -->
            <div class="flex items-center gap-4">

                <!-- Botón de Carrito (Visible para todos) -->
                <a href="{{ route('cart.index') }}" class="flex items-center text-gray-700 hover:text-pink-600 font-bold mr-2">
                    🛒 Carrito
                    <span class="ml-1 text-white text-xs font-bold px-2 py-0.5 rounded-full" style="background-color: #db2777;">
                        {{ count((array) session('cart')) }}
                    </span>
                </a>

                @if (Route::has('login'))
                    @auth
                        <!-- Si es Administrador, mostramos el botón del Panel -->
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-pink-600 hover:text-pink-800">
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
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700 hover:text-pink-600">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-semibold text-white px-4 py-2 rounded-lg" style="background-color: #db2777;">Registrarse</a>
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

    <!-- Alertas Flash -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Filtros y Buscador -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <form action="{{ url('/') }}" method="GET" class="bg-white p-4 rounded-2xl shadow-sm border border-pink-100 flex flex-col md:flex-row gap-4 justify-between items-center">
            <!-- Buscar por Nombre -->
            <div class="w-full md:w-1/2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar productos por nombre..." class="w-full px-4 py-2.5 border border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm">
            </div>

            <!-- Filtrar por Categoría -->
            <div class="w-full md:w-1/3">
                <select name="category_id" class="w-full px-4 py-2.5 border border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm font-semibold text-gray-700">
                    <option value="">Todas las Categorías</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nombre ?? $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botones -->
            <div class="flex gap-2 w-full md:w-auto">
                <button type="submit" class="w-full md:w-auto px-6 py-2.5 text-white font-bold rounded-xl text-sm shadow-md hover:bg-pink-700 transition" style="background-color: #db2777;">
                    Buscar
                </button>
                @if(request('search') || request('category_id'))
                    <a href="{{ url('/') }}" class="w-full md:w-auto px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-center font-bold rounded-xl text-sm transition">
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
                @php
                    $imagen = $product->imagen ?? $product->image ?? $product->image_path ?? null;
                    $nombre = $product->nombre ?? $product->name ?? 'Producto';
                    $precio = $product->precio ?? $product->price ?? 0;
                    $descripcion = $product->descripcion ?? $product->description ?? 'Sin descripción disponible.';
                    $categoria = $product->category->nombre ?? $product->category->name ?? 'Sin categoría';
                @endphp

                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-pink-100 overflow-hidden flex flex-col justify-between group">
                    <div>
                        <!-- Enlace de Imagen a Vista Detallada -->
                        <a href="{{ route('products.show_public', $product->id) }}" class="block overflow-hidden relative">
                            @if ($imagen)
                                <img src="{{ asset('storage/' . $imagen) }}" alt="{{ $nombre }}" class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-56 bg-pink-100 flex items-center justify-center text-pink-400 font-bold text-xs">
                                    Sin Foto
                                </div>
                            @endif

                            <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-md text-pink-700 text-[10px] font-extrabold px-2.5 py-1 rounded-full shadow-sm uppercase tracking-wider">
                                {{ $categoria }}
                            </span>
                        </a>

                        <!-- Nombre y Descripción con Enlace -->
                        <div class="p-5">
                            <a href="{{ route('products.show_public', $product->id) }}" class="block">
                                <h3 class="text-base font-extrabold text-gray-900 mb-1 hover:text-pink-600 transition truncate capitalize">
                                    {{ $nombre }}
                                </h3>
                            </a>
                            <p class="text-gray-500 text-xs mb-4 line-clamp-2 leading-relaxed">
                                {{ $descripcion }}
                            </p>
                        </div>
                    </div>

                    <div class="px-5 pb-5">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-xl font-black text-pink-600">${{ number_format($precio, 2) }}</span>
                            
                            @if($product->stock <= 5 && $product->stock > 0)
                                <span class="text-[11px] px-2.5 py-1 rounded-full font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                    ⚠️ {{ $product->stock }} un.
                                </span>
                            @elseif($product->stock > 0)
                                <span class="text-[11px] px-2.5 py-1 rounded-full font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    Stock: {{ $product->stock }}
                                </span>
                            @else
                                <span class="text-[11px] px-2.5 py-1 rounded-full font-bold bg-red-50 text-red-600 border border-red-200">
                                    Agotado
                                </span>
                            @endif
                        </div>

                        <!-- Botón Agregar al Carrito -->
                        @if($product->stock > 0)
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-white font-bold py-2.5 px-4 rounded-xl shadow-md hover:bg-pink-700 transition flex items-center justify-center gap-2 text-xs uppercase tracking-wider" style="background-color: #db2777;">
                                    🛒 Agregar al Carrito
                                </button>
                            </form>
                        @else
                            <button disabled class="w-full bg-gray-200 text-gray-400 font-bold py-2.5 px-4 rounded-xl cursor-not-allowed text-xs uppercase">
                                Producto Agotado
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-white rounded-3xl border border-pink-100">
                    <span class="text-4xl">🛍️</span>
                    <p class="text-gray-500 font-medium text-sm mt-2">No se encontraron productos que coincidan con tu búsqueda.</p>
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>