<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryImport extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'note',
        'total_amount',
    ];

    // Một phiếu nhập có nhiều mục chi tiết nhập
    public function items()
    {
        return $this->hasMany(InventoryImportItem::class);
    }

    // Người tạo phiếu nhập
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
