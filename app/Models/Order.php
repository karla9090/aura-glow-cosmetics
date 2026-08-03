<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order_number', 'total', 'items', 'status'];

    protected $casts = [
        'items' => 'array', // Convierte automáticamente el JSON a un array de PHP
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}