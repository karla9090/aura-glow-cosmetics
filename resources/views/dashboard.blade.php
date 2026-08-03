<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Aura Glow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Librería para Gráficas Interactivas -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navegación del Admin -->
    @include('layouts.navbar')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Encabezado -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight flex items-center gap-2">
                    Panel de Administración ✨
                </h1>
                <p class="text-xs text-gray-500 font-semibold mt-1">
                    Gestiona las ventas, catálogo e inventario de Aura Glow Cosmetics.
                </p>
            </div>
            <a href="{{ route('products.create') }}" style="background-color: #db2777;" class="inline-flex items-center gap-2 text-white font-bold text-xs px-5 py-3 rounded-2xl shadow-md hover:bg-pink-700 transition uppercase tracking-wider">
                ➕ Agregar Producto
            </a>
        </div>

        <!-- Banner de Bienvenida Estilo Beauty -->
        <div class="relative overflow-hidden rounded-3xl p-8 mb-8 text-white shadow-lg" style="background: linear-gradient(135deg, #db2777 0%, #be185d 100%);">
            <div class="relative z-10">
                <h2 class="text-2xl font-black">¡Hola, {{ Auth::user()->name }}! 🌸</h2>
                <p class="text-pink-100 text-xs mt-1">Aquí tienes el resumen general de tu tienda el día de hoy.</p>
            </div>
            <span class="absolute right-6 -bottom-6 text-9xl opacity-20 pointer-events-none">💄</span>
        </div>

        <!-- Tarjetas de Métricas principales -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            
            <div class="bg-white rounded-3xl p-5 border border-pink-100 shadow-sm flex justify-between items-center">
                <div>
                    <span class="text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Productos Activos</span>
                    <p class="text-2xl font-black text-gray-900 mt-1">{{ $totalProducts ?? 2 }}</p>
                </div>
                <div class="w-12 h-12 bg-pink-50 text-pink-600 rounded-2xl flex items-center justify-center text-xl">
                    💄
                </div>
            </div>

            <div class="bg-white rounded-3xl p-5 border border-pink-100 shadow-sm flex justify-between items-center">
                <div>
                    <span class="text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Categorías</span>
                    <p class="text-2xl font-black text-gray-900 mt-1">{{ $totalCategories ?? 3 }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center text-xl">
                    🏷️
                </div>
            </div>

            <div class="bg-white rounded-3xl p-5 border border-amber-200 bg-amber-50/30 shadow-sm flex justify-between items-center">
                <div>
                    <span class="text-[11px] font-extrabold text-amber-700 uppercase tracking-wider">Stock Bajo (≤ 5)</span>
                    <p class="text-2xl font-black text-amber-600 mt-1">{{ $lowStock ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center text-xl">
                    ⚠️
                </div>
            </div>

            <div class="bg-white rounded-3xl p-5 border border-emerald-100 shadow-sm flex justify-between items-center">
                <div>
                    <span class="text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Ventas Estimadas</span>
                    <p class="text-2xl font-black text-emerald-600 mt-1">$1,250.00</p>
                </div>
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center text-xl">
                    💰
                </div>
            </div>

        </div>

        <!-- Sección de Gráfica y Accesos Rápidos -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Gráfica de Ventas (2 Columnas) -->
            <div class="lg:col-span-2 bg-white rounded-3xl border border-pink-100 p-6 shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-base font-extrabold text-gray-900 flex items-center gap-2">
                        📈 Rendimiento de Ventas Mensuales
                    </h3>
                    <span class="text-xs font-bold text-pink-600 bg-pink-50 px-3 py-1 rounded-full">Año 2026</span>
                </div>
                <div class="h-64">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <!-- Accesos Rápidos / Panel Lateral (1 Columna) -->
            <div class="bg-white rounded-3xl border border-pink-100 p-6 shadow-sm flex flex-col justify-between space-y-4">
                <div>
                    <h3 class="text-base font-extrabold text-gray-900 mb-4">⚡ Acciones Rápidas</h3>
                    <div class="space-y-3">
                        <a href="{{ route('products.index') }}" class="flex items-center justify-between p-3 rounded-2xl bg-gray-50 hover:bg-pink-50 text-xs font-bold text-gray-700 hover:text-pink-600 transition">
                            <span>📦 Gestionar Productos</span>
                            <span>→</span>
                        </a>
                        <a href="{{ route('categories.index') }}" class="flex items-center justify-between p-3 rounded-2xl bg-gray-50 hover:bg-pink-50 text-xs font-bold text-gray-700 hover:text-pink-600 transition">
                            <span>🏷️ Gestionar Categorías</span>
                            <span>→</span>
                        </a>
                        <a href="{{ url('/') }}" target="_blank" class="flex items-center justify-between p-3 rounded-2xl bg-pink-50 text-xs font-bold text-pink-700 hover:bg-pink-100 transition">
                            <span>🛍️ Ver Vista de Cliente</span>
                            <span>↗</span>
                        </a>
                    </div>
                </div>

                <div class="bg-pink-50/50 border border-pink-100 rounded-2xl p-4 text-center">
                    <span class="text-2xl">✨</span>
                    <p class="text-xs font-bold text-gray-800 mt-1">Aura Glow Admin</p>
                    <p class="text-[10px] text-gray-400">Versión 1.0 - Tienda en línea activa</p>
                </div>
            </div>

        </div>

    </main>

    <!-- Script de Inicialización de la Gráfica -->
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago'],
                datasets: [{
                    label: 'Ventas ($)',
                    data: [300, 450, 600, 500, 800, 950, 1100, 1250],
                    borderColor: '#db2777',
                    backgroundColor: 'rgba(219, 39, 119, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#db2777'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f3f4f6' } },
                    x: { grid: { display: false } }
                }
            }
        });
    </script>

</body>
</html>