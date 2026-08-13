<!-- Menú de Navegación Aura Glow Unificado -->
<div class="sticky top-0 z-50 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto pt-4">
    <nav class="bg-white/80 backdrop-blur-2xl border border-white/80 rounded-3xl sm:rounded-full shadow-lg">
        
        <style>
            .glow-pink { box-shadow: 0 0 15px rgba(219, 39, 119, 0.3); }
            .hidden-menu { display: none !important; }
        </style>

        <div class="px-6 h-16 sm:h-20 flex items-center justify-between gap-4">
            
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <span class="text-2xl sm:text-3xl font-black tracking-widest uppercase bg-gradient-to-r from-pink-600 via-rose-500 to-purple-600 bg-clip-text text-transparent">
                    Aura Glow
                </span>
                <span class="text-xl">✨</span>
            </a>

            <!-- Menú Escritorio -->
            <div class="hidden md:flex items-center gap-3 font-semibold text-xs sm:text-sm text-gray-700">
                
                <!-- Carrito -->
                <a href="{{ route('cart.index') }}" 
                   class="flex items-center gap-3 px-5 py-2.5 rounded-full bg-pink-50 border border-pink-200 text-gray-900 transition hover:scale-105">
                    <span class="text-xl">🛒</span>
                    <span class="font-extrabold uppercase text-[11px]">Carrito</span>
                    <span class="glow-pink bg-gradient-to-r from-pink-600 to-rose-500 text-white text-[11px] font-black px-2.5 py-0.5 rounded-full">
                        {{ count((array) session('cart')) }}
                    </span>
                </a>

                @if (Route::has('login'))
                    @auth
                        <div class="w-px h-6 bg-pink-200 mx-1"></div>

                        {{-- ENLACE AL PANEL DE CONTROL SI ES ADMIN --}}
                        @if((Auth::user()->role === 'admin') || (Auth::user()->is_admin ?? false))
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-full bg-pink-100 text-pink-700 font-bold transition hover:bg-pink-200">
                                📊 Admin Panel
                            </a>
                        @endif

                        <a href="{{ route('orders.index') ?? '#' }}" class="px-4 py-2 hover:text-pink-600 transition">
                            🛍️ Mis Pedidos
                        </a>

                        <div class="w-px h-6 bg-pink-200 mx-1"></div>

                        <!-- Dropdown de Usuario -->
                        <div class="relative inline-block text-left">
                            <button id="userMenuBtn" 
                                    type="button"
                                    class="flex items-center gap-2.5 px-4 py-2 rounded-full bg-white border border-pink-200 shadow-sm hover:shadow transition cursor-pointer">
                                <div class="w-7 h-7 rounded-full bg-pink-500 text-white flex items-center justify-center font-black text-xs">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="font-bold text-gray-800 capitalize">{{ Auth::user()->name }}</span>
                                <svg class="w-3.5 h-3.5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Pestaña desplegable -->
                            <div id="userMenuDropdown"
                                 class="hidden-menu absolute right-0 top-full mt-2 w-56 bg-white border border-pink-100 rounded-2xl shadow-xl p-2 z-50 space-y-1">
                                
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2.5 text-xs font-semibold text-gray-700 rounded-xl hover:bg-pink-50 hover:text-pink-600 transition">
                                    <span>👤</span> Mi Perfil
                                </a>

                                <div class="border-t border-gray-100 my-1"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-xs font-semibold text-red-600 rounded-xl hover:bg-red-50 transition">
                                        <span>🚪</span> Cerrar Sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- VISITANTES NO AUTENTICADOS --}}
                        <div class="flex items-center gap-2 border-l border-pink-100 pl-3">
                            <a href="{{ route('login') }}" class="text-xs font-extrabold text-gray-700 hover:text-pink-600 px-3 py-2 rounded-xl transition">
                                Iniciar Sesión
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-xs font-extrabold text-white px-4 py-2 rounded-full shadow-sm hover:bg-pink-700 transition" style="background-color: #db2777;">
                                    Registrarse
                                </a>
                            @endif
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</div>

<!-- Script en JavaScript Vanilla -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('userMenuBtn');
        const dropdown = document.getElementById('userMenuDropdown');

        if (btn && dropdown) {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdown.classList.toggle('hidden-menu');
            });

            document.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target) && !btn.contains(e.target)) {
                    dropdown.classList.add('hidden-menu');
                }
            });
        }
    });
</script>