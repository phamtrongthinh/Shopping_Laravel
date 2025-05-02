<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'staff_id',       
        'fullname',
        'phone',
        'email',
        'address',
        'province',
        'district',
        'ward',
        'note',      
        'total_amount',
        'status',
    ];
     // Mỗi đơn hàng thuộc về 1 người dùng
     public function user()
     {
         return $this->belongsTo(User::class);
     }
 
     // Một đơn hàng có nhiều chi tiết đơn hàng
     public function orderItems()
     {
         return $this->hasMany(OrderItem::class);
     }
    
}
