<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra - Aura Glow ✨</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

@include('layouts.navbar')

    <div class="max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Proceso de Pago y Envío 💳</h1>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Datos del Cliente y Formas de Pago -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- 1. Datos de Entrega -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">1. Dirección de Envío 📦</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Nombre Completo</label>
                                <input type="text" name="name" value="{{ Auth::check() ? Auth::user()->name : '' }}" required class="w-full border rounded-lg p-2.5 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Teléfono</label>
                                <input type="tel" name="phone" placeholder="10 dígitos" required class="w-full border rounded-lg p-2.5 text-sm">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Dirección Completa</label>
                                <textarea name="address" rows="2" placeholder="Calle, número, colonia, código postal" required class="w-full border rounded-lg p-2.5 text-sm"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Métodos de Pago Simulados -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">2. Método de Pago 🔒</h2>
                        
                        <div class="space-y-3">
                            <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-pink-50 transition">
                                <input type="radio" name="payment_method" value="card" checked class="text-pink-600 focus:ring-pink-500">
                                <span class="ml-3 font-semibold text-gray-700">💳 Tarjeta de Crédito / Débito (Visa, Mastercard)</span>
                            </label>

                            <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-pink-50 transition">
                                <input type="radio" name="payment_method" value="spei" class="text-pink-600 focus:ring-pink-500">
                                <span class="ml-3 font-semibold text-gray-700">🏦 Transferencia SPEI (Bbva, Banamex, etc.)</span>
                            </label>

                            <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-pink-50 transition">
                                <input type="radio" name="payment_method" value="oxxo" class="text-pink-600 focus:ring-pink-500">
                                <span class="ml-3 font-semibold text-gray-700">🏪 Pago en Efectivo (OXXO Pay)</span>
                            </label>
                        </div>

                        <!-- Campos Simulados de Tarjeta -->
                        <div class="mt-4 p-4 bg-gray-50 rounded-lg border space-y-3">
                            <p class="text-xs text-gray-500 italic">* Simulación activa: puedes usar números ficticios para probar.</p>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Número de Tarjeta</label>
                                <input type="text" placeholder="4532 •••• •••• 8901" maxlength="19" class="w-full border rounded p-2 text-sm">
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-bold text-gray-600 mb-1">Vencimiento</label>
                                    <input type="text" placeholder="MM/AA" class="w-full border rounded p-2 text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-600 mb-1">CVV</label>
                                    <input type="password" placeholder="123" maxlength="4" class="w-full border rounded p-2 text-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Resumen de Compra -->
                <div class="bg-white p-6 rounded-lg shadow h-fit space-y-4">
                    <h2 class="text-lg font-bold text-gray-800 border-b pb-2">Resumen de la Orden</h2>
                    
                    <div class="divide-y divide-gray-100 max-h-60 overflow-y-auto">
                        @foreach($cart as $item)
                            <div class="py-2 flex justify-between items-center text-sm">
                                <div>
                                    <p class="font-bold text-gray-800">{{ $item['name'] }}</p>
                                    <p class="text-xs text-gray-500">Cant: {{ $item['quantity'] }}</p>
                                </div>
                                <span class="font-bold text-gray-700">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="border-t pt-3 space-y-2 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal:</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Envío:</span>
                            <span class="text-green-600 font-bold">¡GRATIS!</span>
                        </div>
                        <div class="flex justify-between text-lg font-extrabold text-pink-600 border-t pt-2">
                            <span>Total a Pagar:</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <button type="submit" class="w-full text-white font-bold py-3 px-4 rounded-lg shadow transition hover:opacity-90 mt-4 text-center" style="background-color: #db2777;">
                        🔒 Pagar Ahora ${{ number_format($total, 2) }}
                    </button>
                </div>

            </div>
        </form>
    </div>

</body>
</html>