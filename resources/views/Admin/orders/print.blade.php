<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phiếu Đơn Hàng #{{ $order->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            margin: 0;
        }
        .info, .products {
            width: 100%;
            margin-bottom: 20px;
        }
        .info td {
            padding: 5px;
        }
        .products th, .products td {
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 8px;
            text-align: left;
        }
        .products {
            border-collapse: collapse;
        }
        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .footer div {
            text-align: center;
            width: 45%;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="header">
        <h2>PHIẾU ĐƠN HÀNG</h2>
        <p>Đơn hàng #{{ $order->id }} - Ngày: {{ $order->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <table class="info">
        <tr>
            <td><strong>Khách hàng:</strong> {{ $order->fullname }}</td>
            <td><strong>Email:</strong> {{ $order->email }}</td>
        </tr>
        <tr>
            <td><strong>SĐT:</strong> {{ $order->phone }}</td>
            <td><strong>Trạng thái:</strong> 
                {{ [
                    'pending' => 'Chờ xác nhận',
                    'processing' => 'Đang xử lý',
                    'shipping' => 'Đang giao hàng',
                    'completed' => 'Hoàn thành',
                    'cancelled' => 'Đã huỷ'
                ][$order->status] ?? $order->status }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Địa chỉ:</strong> {{ $order->address }},
                {{ $order->wardRelation->name ?? 'Chưa có xã' }},
                {{ $order->districtRelation->name ?? 'Chưa có huyện' }},
                {{ $order->provinceRelation->name ?? 'Chưa có tỉnh' }}
            </td>
        </tr>
    </table>

    <table class="products">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderDetails as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }}₫</td>
                    <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Tổng tiền: {{ number_format($order->total_amount, 0, ',', '.') }}₫
    </div>

    <div class="footer">
        <div>
            <p><strong>Người lập phiếu</strong></p>
            <br><br><br>
            <p>....................</p>
        </div>
        <div>
            <p><strong>Khách hàng</strong></p>
            <br><br><br>
            <p>....................</p>
        </div>
    </div>

    <div class="no-print" style="text-align: center; margin-top: 30px;">
        <a href="{{ route('admin.orders.show', $order->id) }}" style="text-decoration: none; color: #007bff;">Quay lại</a>
    </div>
</body>
</html>
