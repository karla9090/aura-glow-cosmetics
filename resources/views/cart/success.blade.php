<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Compra Exitosa! - Aura Glow Cosmetics</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-3xl border border-pink-100 shadow-xl p-8 text-center space-y-6">
        
        <!-- Ícono de Éxito Estilo SHEIN -->
        <div class="w-20 h-20 bg-pink-100 text-pink-600 rounded-full flex items-center justify-center mx-auto text-4xl shadow-inner">
            🎉
        </div>

        <!-- Encabezado -->
        <div>
            <h1 class="text-2xl font-black text-gray-900">¡Gracias por tu compra{{ session('order_name') ? ', ' . session('order_name') : '' }}!</h1>
            <p class="text-xs text-gray-500 mt-1">Tu pedido ha sido procesado con éxito y ya lo estamos empaquetando.</p>
        </div>

        <!-- Detalle del Pedido -->
        <div class="bg-pink-50/50 border border-pink-100 rounded-2xl p-4 text-left space-y-2">
            <div class="flex justify-between items-center text-xs">
                <span class="text-gray-500 font-semibold">Número de pedido:</span>
                <span class="font-extrabold text-pink-600">{{ session('order_id') ?? 'AG-' . rand(10000, 99999) }}</span>
            </div>
            @if(session('order_total'))
            <div class="flex justify-between items-center text-xs">
                <span class="text-gray-500 font-semibold">Total pagado:</span>
                <span class="font-extrabold text-gray-800">${{ number_format(session('order_total'), 2) }}</span>
            </div>
            @endif
            <div class="flex justify-between items-center text-xs">
                <span class="text-gray-500 font-semibold">Estado del pago:</span>
                <span class="font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200">Aprobado</span>
            </div>
            <div class="flex justify-between items-center text-xs">
                <span class="text-gray-500 font-semibold">Tiempo estimado:</span>
                <span class="font-bold text-gray-700">2 a 4 días hábiles</span>
            </div>
        </div>

        <!-- Badges Informativos -->
        <div class="grid grid-cols-2 gap-3 text-left">
            <div class="p-3 bg-gray-50 rounded-xl border border-gray-100">
                <span class="text-base">📧</span>
                <p class="text-[11px] font-bold text-gray-800 mt-1">Confirmación enviada</p>
                <p class="text-[10px] text-gray-400">Revisa tu correo</p>
            </div>
            <div class="p-3 bg-gray-50 rounded-xl border border-gray-100">
                <span class="text-base">🚚</span>
                <p class="text-[11px] font-bold text-gray-800 mt-1">Rastreo activo</p>
                <p class="text-[10px] text-gray-400">Te notificaremos</p>
            </div>
        </div>

        <!-- Botón de Regreso -->
        <div>
            <a href="{{ url('/') }}" style="background-color: #db2777;" class="block w-full py-3.5 px-6 text-white font-bold rounded-2xl shadow-lg hover:bg-pink-700 transition text-xs uppercase tracking-wider">
                🛍️ Seguir Comprando
            </a>
        </div>

    </div>

</body>
</html>