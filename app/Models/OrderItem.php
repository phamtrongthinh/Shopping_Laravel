<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'product_detail_id',
        'product_name',
        'color_name',
        'size',
        'price',
        'quantity',
    ];
      // Mỗi chi tiết đơn hàng thuộc về một đơn hàng
      public function order()
      {
          return $this->belongsTo(Order::class);
      }
  
      // Mỗi chi tiết đơn hàng có thể liên kết với một sản phẩm
      public function product()
      {
          return $this->belongsTo(Product::class)->withDefault([
              'name' => '[Sản phẩm không còn tồn tại]',
          ]);
      }
  
      // Mỗi chi tiết đơn hàng có thể liên kết với một bản ghi chi tiết sản phẩm
      public function productDetail()
      {
          return $this->belongsTo(ProductDetail::class)->withDefault();
      }
}
