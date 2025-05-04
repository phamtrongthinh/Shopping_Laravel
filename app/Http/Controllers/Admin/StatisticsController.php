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
        $selectedMonth = $request->input('month', now()->format('Y-m'));
        [$year, $month] = explode('-', $selectedMonth);
    
        $revenues = Order::select(
            DB::raw("DATE(created_at) as date"),
            DB::raw("COUNT(*) as total_orders"),
            DB::raw("SUM(total_amount) as total_revenue")
        )
            ->where('status', 'completed')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->groupBy(DB::raw("DATE(created_at)"))
            ->orderByDesc('date')
            ->get();
    
        return view('admin.statistics.revenue', [
            'revenues' => $revenues,
            'title' => 'Thống kê doanh thu theo ngày',
            'selectedMonth' => $selectedMonth
        ]);
    }
    

    // Thống kê sản phẩm bán chạy
    public function topProducts(Request $request)
    {
        // Lấy tháng và năm từ input
        $selectedMonth = $request->input('month', now()->format('Y-m'));
        [$year, $month] = explode('-', $selectedMonth);
    
        // Truy vấn lọc theo tháng
        $topProducts = OrderItem::select(
            'product_name as name',
            DB::raw('SUM(quantity) as total_quantity'),
            DB::raw('SUM(price * quantity) as total_revenue')
        )
        ->whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->groupBy('product_name')
        ->orderByDesc('total_quantity')
        ->limit(10)
        ->get();
    
        return view('admin.statistics.products', [
            'topProducts' => $topProducts,
            'title' => 'Thống kê sản phẩm bán chạy',
        ]);
    }
    
}
