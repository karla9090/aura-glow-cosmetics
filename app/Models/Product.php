<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'nombre',
        'slug',
        'descripcion',
        'precio',
        'stock',
        'imagen'
    ];

    // Relación: Un producto pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}