@extends('Admin.main')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="mb-4">Dashboard - Quản trị hệ thống</h2>

    <div class="row g-4">
        <div class="col-md-6 col-xl-3">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Tổng đơn hàng</h5>
                    <h3 class="text-primary">{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Tổng doanh thu</h5>
                    <h3 class="text-success">{{ number_format($totalRevenue, 0, ',', '.') }}₫</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Người dùng</h5>
                    <h3 class="text-info">{{ $totalUsers }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Sản phẩm</h5>
                    <h3 class="text-warning">{{ $totalProducts }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>Đơn hàng gần đây</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered rounded-4 overflow-hidden">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? 'Không rõ' }}</td>
                            <td>{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                            <td>
                                @php
                                    $statusColors = [
                                        'pending'    => 'bg-secondary',
                                        'processing' => 'bg-warning text-dark',
                                        'shipping'   => 'bg-info text-white',
                                        'completed'  => 'bg-success',
                                        'cancelled'  => 'bg-danger',
                                    ];

                                    $statusLabels = [
                                        'pending'    => 'Chờ xác nhận',
                                        'processing' => 'Đang xử lý',
                                        'shipping'   => 'Đang giao hàng',
                                        'completed'  => 'Hoàn tất',
                                        'cancelled'  => 'Đã hủy',
                                    ];

                                    $color = $statusColors[$order->status] ?? 'bg-light text-dark';
                                    $label = $statusLabels[$order->status] ?? ucfirst($order->status);
                                @endphp
                                <span class="badge {{ $color }}">
                                    {{ $label }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
