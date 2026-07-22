<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'slug', 'descripcion'];

    // Relación: Una categoría tiene muchos productos
    public function products()
    {
        return $table = $this->hasMany(Product::class);
    }
}