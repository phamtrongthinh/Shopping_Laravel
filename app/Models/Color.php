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
}
