<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';

    // Các cột có thể được gán giá trị hàng loạt
    protected $fillable = ['name', 'code'];

    // Quan hệ với bảng ProductDetail (1-n)
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class, 'color_id');
    }
}
