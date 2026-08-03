<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class CartController extends Controller
{
    // Ver el contenido del carrito
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    // Agregar un producto al carrito
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // Tomar la cantidad del request si viene desde la vista de detalle
        $quantity = $request->input('quantity', 1);

        // Si el producto ya está en el carrito, incrementamos la cantidad
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Si no está, lo agregamos como un nuevo elemento
            $cart[$id] = [
                "name" => $product->nombre ?? $product->name,
                "quantity" => $quantity,
                "price" => $product->precio ?? $product->price,
                "image" => $product->imagen ?? $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', '¡Producto agregado al carrito con éxito!');
    }

    // Actualizar la cantidad de un producto en el carrito
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id]) && $request->quantity > 0) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Carrito actualizado');
    }

    // Eliminar un producto del carrito
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }

    // Vista de Checkout / Pago
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect()->route('cart.index');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.checkout', compact('cart', 'total'));
    }

    // Procesar la compra y guardar el registro
    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        
        if (count($cart) == 0) {
            return redirect()->route('cart.index');
        }

        $total = 0;
        foreach ($cart as $id => $item) {
            $total += $item['price'] * $item['quantity'];

            // Descontar stock
            $product = Product::find($id);
            if ($product) {
                $product->stock = max(0, $product->stock - $item['quantity']);
                $product->save();
            }
        }

        $orderNumber = 'AG-' . rand(10000, 99999);

        // Guardar el pedido en la BD si el usuario está autenticado
        if (auth()->check()) {
            Order::create([
                'user_id' => auth()->id(),
                'order_number' => $orderNumber,
                'total' => $total,
                'items' => $cart,
                'status' => 'Procesando',
            ]);
        }

        session()->forget('cart');

        return redirect()->route('cart.success')->with([
            'order_id' => $orderNumber,
            'order_name' => $request->name,
            'order_total' => $total
        ]);
    }

    // Pantalla de confirmación de compra
    public function success()
    {
        return view('cart.success');
    }

    // Historial de compras del usuario autenticado
    public function myOrders()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        return view('orders.index', compact('orders'));
    }
}