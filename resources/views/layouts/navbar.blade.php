<nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-3xl font-black tracking-tight" style="color: #c94086;">
            Aura Glow <span class="font-normal">✨</span>
        </a>

        <!-- Menú con emojis -->
        <div class="flex items-center gap-2 text-xs sm:text-sm font-medium text-gray-800">
            
            <!-- Carrito -->
            <a href="{{ route('cart.index') }}" class="flex items-center gap-1.5 px-3 py-2 rounded-full hover:bg-gray-50 transition-all">
                <span class="text-lg">🛒</span>
                <span class="hidden sm:inline">Carrito</span>
                <span class="text-white text-[11px] font-bold px-2 py-0.5 rounded-full" style="background-color: #db2777;">
                    {{ count((array) session('cart')) }}
                </span>
            </a>

            @if (Route::has('login'))
                @auth
                    <div class="w-px h-6 bg-gray-200 mx-1"></div>

                    <!-- Panel Admin -->
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ url('/dashboard') }}" class="flex items-center gap-1.5 px-3 py-2 rounded-full hover:bg-gray-50 text-pink-700 font-bold transition-all">
                            <span class="text-lg">📊</span>
                            <span class="hidden sm:inline">Panel Admin</span>
                        </a>
                        <div class="w-px h-6 bg-gray-200 mx-1"></div>
                    @endif

                    <!-- Mis Pedidos -->
                    <a href="{{ route('orders.index') }}" class="flex items-center gap-1.5 px-3 py-2 rounded-full hover:bg-gray-50 transition-all">
                        <span class="text-lg">🛍️</span>
                        <span class="hidden sm:inline">Mis Pedidos</span>
                    </a>

                    <div class="w-px h-6 bg-gray-200 mx-1"></div>

                    <!-- Menú de Usuario -->
                    <div class="relative group">
                        <button class="flex items-center gap-2 px-3 py-2 bg-pink-50/60 rounded-full border border-pink-100 hover:border-pink-200 transition-all">
                            <span class="text-lg">👋</span>
                            <span class="font-bold text-gray-800">{{ Auth::user()->name }}</span>
                            <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- Submenú Flotante -->
                        <div class="absolute right-0 mt-1 w-48 bg-white border border-pink-100 rounded-2xl shadow-xl p-2 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none group-hover:pointer-events-auto z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-xs font-semibold text-gray-700 rounded-xl hover:bg-pink-50">
                                Mi Perfil
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="block border-t border-gray-100 mt-1 pt-1">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-xs font-semibold text-red-600 rounded-xl hover:bg-red-50 bg-transparent border-0 cursor-pointer">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>

                @else
                    <div class="w-px h-6 bg-gray-200 mx-1"></div>
                    <a href="{{ route('login') }}" class="text-xs font-bold text-gray-700 hover:text-pink-600 px-2">Iniciar Sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-xs font-bold text-white px-4 py-2 rounded-full shadow-md hover:bg-pink-700 transition" style="background-color: #db2777;">
                            Registrarse
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>