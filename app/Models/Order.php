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
        'processing_at',
        'shipping_at',
        'completed_at',
        'cancelled_at',
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'processing_at' => 'datetime',
        'shipping_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
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
    // app/Models/Order.php
    public function orderDetails()
    {
        return $this->hasMany(orderItem::class, 'order_id');
    }

    public function provinceRelation()
    {
        return $this->belongsTo(Province::class, 'province');
    }
    public function districtRelation()
    {
        return $this->belongsTo(District::class, 'district');
    }
    public function wardRelation()
    {
        return $this->belongsTo(Ward::class, 'ward');
    }
}
