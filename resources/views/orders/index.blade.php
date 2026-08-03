<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos - Aura Glow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navegación -->
    <nav class="bg-white shadow-md border-b border-pink-100 mb-8">
        <div class="max-w-7xl mx-auto px-4 h-16 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-pink-600">Aura Glow ✨</a>
            <a href="{{ url('/') }}" class="text-xs font-bold text-gray-600 hover:text-pink-600">← Volver al Catálogo</a>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 pb-12">
        <h1 class="text-2xl font-black text-gray-900 mb-6 flex items-center gap-2">
            🛍️ Mis Pedidos Realizados
        </h1>

        @forelse($orders as $order)
            <div class="bg-white rounded-3xl border border-pink-100 p-6 mb-4 shadow-sm">
                <div class="flex flex-wrap justify-between items-center border-b border-pink-50 pb-4 mb-4 gap-2">
                    <div>
                        <span class="text-xs text-gray-400 uppercase font-bold">Pedido:</span>
                        <p class="font-black text-pink-600 text-sm">{{ $order->order_number }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 uppercase font-bold">Fecha:</span>
                        <p class="text-xs font-bold text-gray-700">{{ $order->created_at->format('d/m/Y h:i A') }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 uppercase font-bold">Estado:</span>
                        <span class="block px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            {{ $order->status }}
                        </span>
                    </div>
                </div>

                <div class="space-y-3">
                    @foreach($order->items as $item)
                        <div class="flex justify-between items-center text-xs">
                            <span class="font-bold text-gray-800">{{ $item['name'] }} <span class="text-pink-600">(x{{ $item['quantity'] }})</span></span>
                            <span class="font-extrabold text-gray-700">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-pink-50 pt-3 mt-4 flex justify-between items-center">
                    <span class="text-xs font-extrabold text-gray-400 uppercase">Total:</span>
                    <span class="text-lg font-black text-pink-600">${{ number_format($order->total, 2) }}</span>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-3xl border border-pink-100 p-10 text-center space-y-3">
                <span class="text-4xl">📦</span>
                <p class="text-xs font-bold text-gray-500">Aún no has realizado ninguna compra.</p>
            </div>
        @endforelse
    </main>

</body>
</html>