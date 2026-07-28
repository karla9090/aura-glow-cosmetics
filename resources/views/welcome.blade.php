<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura Glow Cosmetics</title>
    <!-- Carga de Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pink: {
                            50: '#fdf2f8',
                            100: '#fce7f3',
                            500: '#ec4899',
                            600: '#db2777',
                            700: '#be185d',
                        }
                    }
                }
            }
        }
    </script>
    <!-- Estilo extra para asegurar que se vea la cuadrícula -->
    <style type="text/css">
        .product-grid { display: grid; gap: 1.5rem; }
        @media (min-width: 640px) { .product-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (min-width: 768px) { .product-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
        @media (min-width: 1024px) { .product-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); } }
    </style>
</head>
<body class="bg-pink-50 min-h-screen text-gray-800">

    <!-- Navegación -->
    <nav class="bg-white shadow-sm border-b border-pink-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-pink-600">Aura Glow</h1>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 font-semibold hover:text-pink-600">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 font-semibold hover:text-pink-600 mr-4">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-md text-sm font-semibold">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Encabezado -->
    <header class="py-12 text-center bg-white mb-8 border-b border-pink-100">
        <h2 class="text-4xl font-extrabold text-pink-600">Nuestros Productos</h2>
        <p class="text-gray-500 mt-2">Resalta tu belleza natural con nuestra selección exclusiva.</p>
    </header>

    <!-- Grilla de Productos -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="product-grid">
            @forelse ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition flex flex-col justify-between">
                    <!-- Imagen del Producto -->
                    <div>
                        @if ($product->imagen)
                            <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-pink-100 flex items-center justify-center text-pink-400">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif

                        <div class="p-5">
                            <span class="text-xs font-semibold text-pink-500 uppercase tracking-wider">
                                {{ $product->category->nombre ?? 'Sin categoría' }}
                            </span>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">{{ $product->nombre }}</h3>
                            <p class="text-gray-500 text-sm mt-2 line-clamp-2">
                                {{ $product->descripcion ?? 'Sin descripción disponible.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Pie de la tarjeta -->
                    <div class="p-5 pt-0">
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <span class="text-xl font-bold text-pink-600">${{ number_format($product->precio, 2) }}</span>
                            <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2.5 py-1 rounded">Stock: {{ $product->stock }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">Próximamente agregaremos nuevos productos.</p>
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>