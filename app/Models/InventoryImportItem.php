<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryImportItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'inventory_import_id',
        'product_detail_id',
        'quantity',
        'unit_price',
    ];

    // Mỗi mục chi tiết thuộc một phiếu nhập
    public function import()
    {
        return $this->belongsTo(InventoryImport::class, 'inventory_import_id');
    }

    // Mỗi mục chi tiết gắn với một biến thể sản phẩm (product_detail)
    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
    
}
