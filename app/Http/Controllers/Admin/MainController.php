<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        $totalOrders = Order::count();
        $totalRevenue = Order::where('status', 'completed')->sum('total_amount');
        $totalUsers = User::count();
        $totalProducts = Product::count();

        $recentOrders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.home', [
            'title' => 'Trang quản trị admin',
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'totalUsers' => $totalUsers,
            'totalProducts' => $totalProducts,
            'recentOrders' => $recentOrders
        ]);
    }
}
