<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    // Thống kê doanh thu theo ngày
    public function revenue(Request $request)
    {
        $revenues = Order::select(
            DB::raw("DATE(created_at) as date"),
            DB::raw("SUM(total_amount) as total")
        )
            ->where('status', 'completed')
            ->groupBy(DB::raw("DATE(created_at)"))
            ->orderByDesc('date')
            ->get();
        return view('admin.statistics.revenue', [
            'revenues' => $revenues,
            'title' => 'Thống kê doanh thu theo ngày',
        ]);
    }

    // Thống kê sản phẩm bán chạy
    public function topProducts(Request $request)
    {
        $topProducts = OrderItem::select(
            'product_name',
            DB::raw('SUM(quantity) as total_sold')
        )
            ->groupBy('product_name')
            ->orderByDesc('total_sold')
            ->limit(10)
            ->get();
        return view('admin.statistics.products', [
            'topProducts' => $topProducts,
            'title' => 'Thống kê sản phẩm bán chạy',
        ]);
    }
}
