<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura Glow Cosmetics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .slide-fade {
            transition: opacity 0.8s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

  @include('layouts.navigation')

    <!-- 1. HERO BANNER PRINCIPAL CON SLIDER (4 segundos) -->
    <div class="relative bg-gradient-to-b from-pink-50 to-white overflow-hidden border-b border-pink-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16 flex flex-col-reverse md:flex-row items-center justify-between gap-8 relative z-10">
            
            <!-- Texto e invitación a comprar -->
            <div class="flex-1 text-center md:text-left">
                <span class="inline-block bg-pink-100 text-pink-700 text-xs font-black px-3 py-1 rounded-full uppercase tracking-wider mb-4">
                    ✨ Nueva Colección 2026
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-gray-900 tracking-tight leading-tight mb-4">
                    Realza tu <span class="text-pink-600">belleza natural</span>
                </h1>
                <p class="text-gray-600 text-base md:text-lg mb-6 max-w-xl mx-auto md:mx-0">
                    Descubre nuestra colección exclusiva de cosméticos y cuidado personal. Fórmulas de alta calidad para cuidar y resaltar tu piel todos los días.
                </p>
                <a href="#catalogo" class="inline-flex items-center gap-2 text-white font-bold text-sm px-8 py-3.5 rounded-full shadow-lg hover:bg-pink-700 hover:shadow-pink-200 transition-all uppercase tracking-wider" style="background-color: #db2777;">
                    Explorar Productos 💄
                </a>
            </div>

            <!-- Slider / Carrusel de Imágenes Profetional -->
            <div class="w-full md:w-1/2 max-w-md">
                <div class="relative">
                    <div class="absolute -inset-1 bg-gradient-to-r from-pink-400 to-rose-400 rounded-3xl blur opacity-30"></div>
                    
                    <!-- Contenedor del Carrusel -->
                    <div class="relative rounded-3xl shadow-xl border-4 border-white overflow-hidden w-full h-72 md:h-80 bg-pink-100">
                        <!-- Slide 1 -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKdMLYlanGMgI3g4m8SvNNPR-To0-uhriEMnR7SXtx4w&s=10" 
                             alt="Set de Maquillaje Aura Glow" 
                             class="hero-slide slide-fade absolute inset-0 w-full h-full object-cover opacity-100">
                        
                        <!-- Slide 2 -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_vJH1bk_lVfT5rvNIX7aK1Bx3weTtjpICyVDe-4r6IQ&s=10" 
                             alt="Pinceles y Labiales Aura Glow" 
                             class="hero-slide slide-fade absolute inset-0 w-full h-full object-cover opacity-0">
                        
                        <!-- Slide 3 -->
                        <img src="https://images.unsplash.com/photo-1512496015851-a90fb38ba796?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Cosméticos y Cuidado Facial Aura Glow" 
                             class="hero-slide slide-fade absolute inset-0 w-full h-full object-cover opacity-0">

                        <!-- Indicadores de Barra en la Parte Inferior -->
                        <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex gap-2 z-20">
                            <button onclick="setSlide(0)" class="slide-indicator w-8 h-1.5 rounded-full bg-white/90 transition-all shadow"></button>
                            <button onclick="setSlide(1)" class="slide-indicator w-3 h-1.5 rounded-full bg-white/50 transition-all shadow"></button>
                            <button onclick="setSlide(2)" class="slide-indicator w-3 h-1.5 rounded-full bg-white/50 transition-all shadow"></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- 2. INSIGNIAS DE CONFIANZA (Trust Badges) -->
    <div class="bg-white border-b border-pink-100 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                <div class="p-3">
                    <span class="text-2xl mb-1 block">🐰</span>
                    <h4 class="text-xs font-bold text-gray-800 uppercase">Cruelty Free</h4>
                    <p class="text-[11px] text-gray-500">Libre de crueldad animal</p>
                </div>
                <div class="p-3">
                    <span class="text-2xl mb-1 block">🚚</span>
                    <h4 class="text-xs font-bold text-gray-800 uppercase">Envíos Rápidos</h4>
                    <p class="text-[11px] text-gray-500">A todo el país</p>
                </div>
                <div class="p-3">
                    <span class="text-2xl mb-1 block">💳</span>
                    <h4 class="text-xs font-bold text-gray-800 uppercase">Pago Seguro</h4>
                    <p class="text-[11px] text-gray-500">Compras 100% protegidas</p>
                </div>
                <div class="p-3">
                    <span class="text-2xl mb-1 block">✨</span>
                    <h4 class="text-xs font-bold text-gray-800 uppercase">Calidad Premium</h4>
                    <p class="text-[11px] text-gray-500">Ingredientes seleccionados</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Alertas Flash -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-6">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-2xl text-sm font-semibold flex items-center gap-2">
                <span>✅</span> {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- 3. SECCIÓN DE BÚSQUEDA Y CATÁLOGO DE PRODUCTOS -->
    <main id="catalogo" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Título de la Sección -->
        <div class="text-center mb-8">
            <h2 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight">Nuestros Productos 🌸</h2>
            <p class="text-gray-500 text-xs sm:text-sm mt-1">Encuentra tus favoritos de belleza y cuidado personal</p>
        </div>

        <!-- Filtros y Buscador -->
        <div class="mb-8">
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

        <!-- Grid de Productos -->
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

    <!-- Script del Slider Automático (Cada 4 segundos) -->
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const indicators = document.querySelectorAll('.slide-indicator');
        const totalSlides = slides.length;
        let slideInterval;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.remove('opacity-0');
                    slide.classList.add('opacity-100');
                } else {
                    slide.classList.remove('opacity-100');
                    slide.classList.add('opacity-0');
                }
            });

            indicators.forEach((indicator, i) => {
                if (i === index) {
                    indicator.classList.remove('w-3', 'bg-white/50');
                    indicator.classList.add('w-8', 'bg-white/90');
                } else {
                    indicator.classList.remove('w-8', 'bg-white/90');
                    indicator.classList.add('w-3', 'bg-white/50');
                }
            });

            currentSlide = index;
        }

        function nextSlide() {
            let nextIndex = (currentSlide + 1) % totalSlides;
            showSlide(nextIndex);
        }

        function setSlide(index) {
            showSlide(index);
            resetInterval();
        }

        function startInterval() {
            slideInterval = setInterval(nextSlide, 4000); // 4000 ms = 4 segundos
        }

        function resetInterval() {
            clearInterval(slideInterval);
            startInterval();
        }

        // Iniciar Slider
        startInterval();
    </script>

</body>
</html>