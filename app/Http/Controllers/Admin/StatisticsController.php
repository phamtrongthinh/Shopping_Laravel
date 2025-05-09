<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;  // Make sure you have a PDF package installed, e.g. 'dompdf/dompdf'
use Dompdf\Dompdf;
use Dompdf\Options;



class StatisticsController extends Controller
{
    public function revenue(Request $request)
    {
        $type = $request->input('type', 'day');
        $query = Order::query()
            ->where('status', 'completed');  // Lọc các đơn hàng đã hoàn thành

        switch ($type) {
            case 'day':
                // Lấy ngày người dùng chọn
                $date = $request->input('date', now()->format('Y-m-d'));
                $query->whereDate('updated_at', $date);  // Chọn theo ngày cập nhật (hoàn thành đơn)

                $revenues = $query
                    ->select(
                        DB::raw("DATE(updated_at) as date"),
                        DB::raw("COUNT(*) as total_orders"),
                        DB::raw("SUM(total_amount) as total_revenue")
                    )
                    ->groupBy(DB::raw("DATE(updated_at)"))
                    ->get();
                break;

            case 'month':
                // Lấy tháng người dùng chọn
                $month = $request->input('month', now()->format('Y-m'));
                [$year, $monthNum] = explode('-', $month);

                $query->whereYear('updated_at', $year)
                    ->whereMonth('updated_at', $monthNum);

                $revenues = $query
                    ->select(
                        DB::raw("DATE(updated_at) as date"),
                        DB::raw("COUNT(*) as total_orders"),
                        DB::raw("SUM(total_amount) as total_revenue")
                    )
                    ->groupBy(DB::raw("DATE(updated_at)"))
                    ->get();
                break;

            case 'year':
                // Lấy năm người dùng chọn
                $year = $request->input('year', now()->year);

                $query->whereYear('updated_at', $year);

                $revenues = $query
                    ->select(
                        DB::raw("MONTH(updated_at) as date"),
                        DB::raw("COUNT(*) as total_orders"),
                        DB::raw("SUM(total_amount) as total_revenue")
                    )
                    ->groupBy(DB::raw("MONTH(updated_at)"))
                    ->get();
                break;

            default:
                $revenues = collect(); // Trả về collection rỗng nếu type không hợp lệ
                break;
        }

        return view('admin.statistics.revenue', [
            'revenues' => $revenues,
            'title' => 'Thống kê doanh thu',
        ]);
    }
    // Print report method
    public function printReport(Request $request)
    {
        $type = $request->input('type', 'day');
        $query = Order::query()->where('status', 'completed');

        // Logic for filtering based on day, month, or year...
        switch ($type) {
            case 'day':
                $date = $request->input('date', now()->format('Y-m-d'));
                $query->whereDate('updated_at', $date);
                $revenues = $query
                    ->select(
                        DB::raw("DATE(updated_at) as date"),
                        DB::raw("COUNT(*) as total_orders"),
                        DB::raw("SUM(total_amount) as total_revenue")
                    )
                    ->groupBy(DB::raw("DATE(updated_at)"))
                    ->get();
                break;

            case 'month':
                $month = $request->input('month', now()->format('Y-m'));
                [$year, $monthNum] = explode('-', $month);

                $query->whereYear('updated_at', $year)
                    ->whereMonth('updated_at', $monthNum);
                $revenues = $query
                    ->select(
                        DB::raw("DATE(updated_at) as date"),
                        DB::raw("COUNT(*) as total_orders"),
                        DB::raw("SUM(total_amount) as total_revenue")
                    )
                    ->groupBy(DB::raw("DATE(updated_at)"))
                    ->get();
                break;

            case 'year':
                $year = $request->input('year', now()->year);
                $query->whereYear('updated_at', $year);
                $revenues = $query
                    ->select(
                        DB::raw("MONTH(updated_at) as date"),
                        DB::raw("COUNT(*) as total_orders"),
                        DB::raw("SUM(total_amount) as total_revenue")
                    )
                    ->groupBy(DB::raw("MONTH(updated_at)"))
                    ->get();
                break;

            default:
                $revenues = collect();
                break;
        }

        // Generate PDF using a package like dompdf or any other
        $pdf = PDF::loadView('admin.statistics.revenue_report.blade', ['revenues' => $revenues]);

        // Return the PDF file for download or stream to the browser
        return $pdf->stream('revenue_report.pdf');  // Or use $pdf->download() for download
    }

    public function testPdf()
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1>Hello, this is a test PDF!</h1>');

        // Đặt kích thước giấy
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Xuất PDF trực tiếp vào trình duyệt
        return $dompdf->stream('test.pdf');
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
