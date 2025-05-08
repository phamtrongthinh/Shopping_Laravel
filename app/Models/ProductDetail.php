<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    // Chỉ định bảng (nếu tên bảng không phải là số nhiều của model)
    protected $table = 'product_details';
    // Các trường có thể mass assign
    protected $fillable = [
        'product_id',
        'color_id',
        'size',
        'price',
        'sale',
        'quantity',
        'image'
    ];
    // Quan hệ với bảng Product (nhiều-1)
    // Quan hệ với bảng Product (nhiều-1)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    
}
