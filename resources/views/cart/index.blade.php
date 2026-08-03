<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - Aura Glow ✨</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    @include('layouts.navbar')

    <div class="max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tu Carrito de Compras 🛍️</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart) > 0)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-xs">
                            <th class="p-4">Producto</th>
                            <th class="p-4">Precio</th>
                            <th class="p-4">Cantidad</th>
                            <th class="p-4">Subtotal</th>
                            <th class="p-4 text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($cart as $id => $details)
                            <tr>
                                <td class="p-4 flex items-center gap-3">
                                    @if($details['image'])
                                        <img src="{{ asset('storage/' . $details['image']) }}" class="w-12 h-12 object-cover rounded-md">
                                    @else
                                        <div class="w-12 h-12 bg-pink-100 rounded-md flex items-center justify-center text-xs text-pink-500">Sin foto</div>
                                    @endif
                                    <span class="font-bold text-gray-800">{{ $details['name'] }}</span>
                                </td>
                                <td class="p-4 font-semibold">${{ number_format($details['price'], 2) }}</td>
                                <td class="p-4">
                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="w-16 border rounded p-1 text-center">
                                        <button type="submit" class="text-xs bg-gray-200 hover:bg-gray-300 px-2 py-1 rounded font-bold">
                                            ✏️
                                        </button>
                                    </form>
                                </td>
                                <td class="p-4 font-bold text-pink-600">
                                    ${{ number_format($details['price'] * $details['quantity'], 2) }}
                                </td>
                                <td class="p-4 text-center">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-bold">
                                            🗑️ Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-6 bg-gray-50 flex justify-between items-center border-t border-gray-200">
                    <div>
                        <span class="text-gray-500 text-sm">Total del Pedido:</span>
                        <p class="text-3xl font-extrabold text-pink-600">${{ number_format($total, 2) }}</p>
                    </div>

                    <a href="{{ route('checkout.index') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-6 rounded-lg text-lg shadow transition inline-block">
                      Proceder al Pago →
                     </a>
                </div>
            </div>
        @else
            <div class="bg-white p-8 rounded-lg shadow text-center">
                <p class="text-gray-500 text-lg mb-4">Tu carrito está vacío actualmente 🛒</p>
                <a href="{{ url('/') }}" class="inline-block text-white font-bold px-6 py-2 rounded-lg" style="background-color: #db2777;">
                    Explorar Productos
                </a>
            </div>
        @endif
    </div>

</body>
</html>