<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Gracias por tu compra! - Aura Glow ✨</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <div class="max-w-2xl mx-auto px-4 py-16 text-center">
        <div class="bg-white p-8 rounded-2xl shadow-lg border border-pink-100">
            <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 text-4xl">
                ✓
            </div>

            <h1 class="text-3xl font-extrabold text-gray-800 mb-2">¡Pago Procesado con Éxito! 🎉</h1>
            <p class="text-gray-600 mb-6">Gracias por comprar en <strong>Aura Glow</strong>. Tu orden ha sido recibida y se está preparando para envío.</p>

            <div class="bg-gray-50 p-4 rounded-lg text-left text-sm mb-6 space-y-2 border">
                <div class="flex justify-between border-b pb-2">
                    <span class="font-bold text-gray-600">Número de Pedido:</span>
                    <span class="font-bold text-pink-600">#{{ session('order_id', rand(10000, 99999)) }}</span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <span class="font-bold text-gray-600">Cliente:</span>
                    <span>{{ session('order_name', 'Cliente Aura Glow') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold text-gray-600">Total Pagado:</span>
                    <span class="font-extrabold text-gray-800">${{ number_format(session('order_total', 0), 2) }}</span>
                </div>
            </div>

            <a href="{{ url('/') }}" class="inline-block text-white font-bold py-3 px-8 rounded-lg shadow transition" style="background-color: #db2777;">
                🛍️ Volver a la Tienda
            </a>
        </div>
    </div>

</body>
</html>