<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Catálogo público
Route::get('/', function (Request $request) {
    $categories = Category::all();

    $query = Product::with('category');

    if ($request->filled('search')) {
        $query->where('nombre', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    $products = $query->latest()->get();

    return view('welcome', compact('products', 'categories'));
});

// Panel Principal (Redirección inteligente según el rol)
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        $totalProductos = Product::count();
        $totalCategorias = Category::count();
        $stockBajo = Product::where('stock', '<=', 5)->count();

        return view('dashboard', compact('totalProductos', 'totalCategorias', 'stockBajo'));
    }

    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas para Usuarios Autenticados
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Módulos EXCLUSIVOS para Administrador
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    });
});

require __DIR__.'/auth.php';