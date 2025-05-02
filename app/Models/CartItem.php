<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'product_id',
        'product_detail_id',
        'product_name',
        'color_name',
        'size',
        'price',
        'quantity',
    ];
    // Quan hệ
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_name', 'name');
    }
}
