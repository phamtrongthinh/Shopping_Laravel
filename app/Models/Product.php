<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'description',  'gender', 'category_id', 'status', 'hot'];

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceRangeAttribute()
    {
        $min = $this->productDetails()->min('price');
        $max = $this->productDetails()->max('price');

        if ($min === null || $max === null) {
            return 'Chưa có giá';
        }

        if ($min === $max) {
            return number_format($min, 0, ',', '.') . ' đ';
        }

        return number_format($min, 0, ',', '.') . ' đ - ' . number_format($max, 0, ',', '.') . ' đ';
    }
}
