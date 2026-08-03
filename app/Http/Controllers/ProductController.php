<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $data = $request->all();
    $data['slug'] = Str::slug($request->nombre);

    if ($request->hasFile('imagen')) {
        $data['imagen'] = $request->file('imagen')->store('products', 'public');
    }

    Product::create($data);

    return redirect()->route('products.index');
}
    
   public function show(Product $product)
{
    // Carga la relación de categoría si existe
    $product->load('category');

    // Puedes obtener productos relacionados de la misma categoría
    $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->take(4)
        ->get();

    return view('products.show', compact('product', 'relatedProducts'));
}
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Product $product)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $data = $request->all();
    $data['slug'] = Str::slug($request->nombre);

    if ($request->hasFile('imagen')) {
        // Borrar imagen anterior si existe
        if ($product->imagen) {
            Storage::disk('public')->delete($product->imagen);
        }
        $data['imagen'] = $request->file('imagen')->store('products', 'public');
    }

    $product->update($data);

    return redirect()->route('products.index');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
    }
    