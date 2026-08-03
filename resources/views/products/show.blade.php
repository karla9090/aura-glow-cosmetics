<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nombre ?? $product->name ?? 'Detalle del Producto' }} - Aura Glow Cosmetics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navegación -->
   @include('layouts.navbar')

    <!-- Alertas Flash -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-2xl">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @php
        $imagen = $product->imagen ?? $product->image ?? $product->image_path ?? null;
        $nombre = $product->nombre ?? $product->name ?? 'Producto Aura Glow';
        $precio = $product->precio ?? $product->price ?? 0;
        $descripcion = $product->descripcion ?? $product->description ?? 'Sin descripción disponible para este producto cosmético.';
        $categoria = $product->category->nombre ?? $product->category->name ?? 'Sin categoría';
    @endphp

    <!-- Detalle del Producto -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8" x-data="{ cantidad: 1, tono: 'Coral Glow' }">

        <!-- Breadcrumb / Migas de pan -->
        <nav class="text-xs font-semibold text-gray-500 flex items-center space-x-2">
            <a href="{{ url('/') }}" class="hover:text-pink-600">Catálogo</a>
            <span>/</span>
            <span class="text-pink-600 font-bold capitalize">{{ $categoria }}</span>
            <span>/</span>
            <span class="text-gray-800 truncate max-w-xs capitalize">{{ $nombre }}</span>
        </nav>

        <!-- Tarjeta Principal -->
        <div class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 sm:p-10 grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Imagen Principal -->
            <div class="lg:col-span-5 flex flex-col items-center">
                <div class="w-full aspect-square rounded-2xl bg-pink-50/50 border border-pink-100 overflow-hidden relative shadow-inner flex items-center justify-center">
                    @if($imagen)
                        <img src="{{ asset('storage/' . $imagen) }}" alt="{{ $nombre }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    @else
                        <div class="text-center text-pink-300">
                            <span class="text-6xl">✨</span>
                            <p class="text-xs font-bold mt-2 text-pink-400">Sin foto disponible</p>
                        </div>
                    @endif

                    <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-extrabold text-pink-600 shadow-sm uppercase tracking-wider">
                        {{ $categoria }}
                    </span>
                </div>
            </div>

            <!-- Información y Botón de Compra -->
            <div class="lg:col-span-7 flex flex-col justify-between space-y-6">
                <div>
                    <!-- Valoraciones -->
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="flex text-amber-400 text-sm">
                            ★★★★★
                        </div>
                        <span class="text-xs font-bold text-gray-500">(4.9) · 18 reseñas</span>
                    </div>

                    <!-- Nombre del Producto -->
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 capitalize leading-tight">
                        {{ $nombre }}
                    </h1>

                    <!-- Precio y Disponibilidad -->
                    <div class="mt-4 flex items-baseline space-x-4">
                        <span class="text-3xl font-black text-pink-600">${{ number_format($precio, 2) }}</span>
                        
                        @if($product->stock > 0)
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-full border border-emerald-200">
                                Disponible ({{ $product->stock }} un.)
                            </span>
                        @else
                            <span class="px-3 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-full border border-red-200">
                                Agotado
                            </span>
                        @endif
                    </div>

                    <!-- Descripción Detallada -->
                    <div class="mt-6 border-t border-pink-50 pt-4">
                        <h3 class="text-xs font-bold uppercase text-gray-400 mb-2 tracking-wider">Detalles del Cosmético</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ $descripcion }}
                        </p>
                    </div>

                    <!-- Selector de Tonos (Estilo SHEIN) -->
                    <div class="mt-6 border-t border-pink-50 pt-4">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xs font-bold uppercase text-gray-400 tracking-wider">Tono seleccionado:</h3>
                            <span class="text-xs font-bold text-pink-600" x-text="tono"></span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button @click="tono = 'Coral Glow'" :class="tono === 'Coral Glow' ? 'ring-2 ring-pink-500 scale-110' : ''" class="w-8 h-8 rounded-full bg-rose-400 border-2 border-white shadow-sm transition hover:scale-105" title="Coral Glow"></button>
                            <button @click="tono = 'Dusty Rose'" :class="tono === 'Dusty Rose' ? 'ring-2 ring-pink-500 scale-110' : ''" class="w-8 h-8 rounded-full bg-pink-600 border-2 border-white shadow-sm transition hover:scale-105" title="Dusty Rose"></button>
                            <button @click="tono = 'Peach Velvet'" :class="tono === 'Peach Velvet' ? 'ring-2 ring-pink-500 scale-110' : ''" class="w-8 h-8 rounded-full bg-orange-300 border-2 border-white shadow-sm transition hover:scale-105" title="Peach Velvet"></button>
                            <button @click="tono = 'Berry Touch'" :class="tono === 'Berry Touch' ? 'ring-2 ring-pink-500 scale-110' : ''" class="w-8 h-8 rounded-full bg-fuchsia-800 border-2 border-white shadow-sm transition hover:scale-105" title="Berry Touch"></button>
                        </div>
                    </div>
                </div>

                <!-- Formulario Agregar al Carrito -->
                @if($product->stock > 0)
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="space-y-4 pt-2">
                        @csrf
                        <input type="hidden" name="quantity" :value="cantidad">
                        <input type="hidden" name="tone" :value="tono">

                        <div class="flex items-center space-x-4">
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Cantidad:</span>
                            <div class="flex items-center border border-pink-200 rounded-xl bg-pink-50/30 overflow-hidden">
                                <button type="button" @click="if(cantidad > 1) cantidad--" class="px-3 py-1.5 text-pink-600 font-extrabold hover:bg-pink-100 transition">-</button>
                                <span class="px-4 py-1.5 text-xs font-extrabold text-gray-800" x-text="cantidad"></span>
                                <button type="button" @click="if(cantidad < {{ $product->stock }}) cantidad++" class="px-3 py-1.5 text-pink-600 font-extrabold hover:bg-pink-100 transition">+</button>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3">
                            <button type="submit" style="background-color: #db2777;" class="flex-1 py-3.5 px-6 text-white font-bold rounded-2xl shadow-lg hover:bg-pink-700 transition flex items-center justify-center space-x-2 text-xs uppercase tracking-wider">
                                <span>🛒 Agregar al Carrito</span>
                            </button>
                        </div>
                    </form>
                @else
                    <button disabled class="w-full bg-gray-200 text-gray-400 font-bold py-3.5 px-6 rounded-2xl cursor-not-allowed text-xs uppercase">
                        Producto Actualmente Agotado
                    </button>
                @endif

                <!-- Badges Informativos -->
                <div class="grid grid-cols-3 gap-2 pt-4 text-center border-t border-pink-100">
                    <div class="p-2">
                        <span class="text-lg">🚚</span>
                        <p class="text-[11px] font-bold text-gray-700 mt-1">Envío Rápido</p>
                        <p class="text-[10px] text-gray-400">Entrega asegurada</p>
                    </div>
                    <div class="p-2">
                        <span class="text-lg">✨</span>
                        <p class="text-[11px] font-bold text-gray-700 mt-1">100% Original</p>
                        <p class="text-[10px] text-gray-400">Garantía Aura Glow</p>
                    </div>
                    <div class="p-2">
                        <span class="text-lg">💳</span>
                        <p class="text-[11px] font-bold text-gray-700 mt-1">Pago Seguro</p>
                        <p class="text-[10px] text-gray-400">Múltiples métodos</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Opiniones / Reseñas de Clientes -->
        <div class="bg-white rounded-3xl border border-pink-100 shadow-sm p-6 sm:p-8 space-y-6">
            <div class="flex items-center justify-between border-b border-pink-50 pb-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Opiniones de Clientas 💬</h3>
                    <p class="text-xs text-gray-500">Reseñas de compradoras que han adquirido este producto</p>
                </div>
            </div>

            <div class="space-y-4 divide-y divide-pink-50">
                <div class="pt-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-pink-100 text-pink-600 font-bold flex items-center justify-center text-xs">
                                KV
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-800">Karla V.</p>
                                <div class="flex text-amber-400 text-xs">★★★★★</div>
                            </div>
                        </div>
                        <span class="text-[10px] text-gray-400">Hace 2 días</span>
                    </div>
                    <p class="text-xs text-gray-600 mt-2">
                        Excelente calidad. El empaque venía muy protegido y el producto duró todo el día intacto.
                    </p>
                </div>

                <div class="pt-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-pink-100 text-pink-600 font-bold flex items-center justify-center text-xs">
                                AM
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-800">Andrea M.</p>
                                <div class="flex text-amber-400 text-xs">★★★★★</div>
                            </div>
                        </div>
                        <span class="text-[10px] text-gray-400">Hace 1 semana</span>
                    </div>
                    <p class="text-xs text-gray-600 mt-2">
                        Superó mis expectativas, el color es precioso. ¡Aura Glow se convirtió en mi tienda favorita!
                    </p>
                </div>
            </div>
        </div>

    </main>

</body>
</html>