<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
    ];

    // 🔗 Um produto pertence a uma categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 🔗 Um produto pode aparecer em vários itens de pedido
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
