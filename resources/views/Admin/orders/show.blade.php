@extends('admin.main')
@section('title', 'Chi tiết Đơn Hàng')

@section('content')
    <div class="container py-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Đơn hàng #{{ $order->id }}</h4>
            </div>

            <div class="card-body">
                <p><strong>Khách hàng:</strong> {{ $order->fullname }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                <p><strong>Địa chỉ:</strong>
                    {{ $order->address }},
                    {{ $order->wardRelation->name ?? 'Chưa có xã' }},
                    {{ $order->districtRelation->name ?? 'Chưa có huyện' }},
                    {{ $order->provinceRelation->name ?? 'Chưa có tỉnh' }}
                </p>
                <p><strong>Ngày đặt hàng:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>

                <p><strong>Trạng thái:</strong>
                    <span class="badge bg-info text-dark">
                        {{ [
                            'pending' => 'Chờ xác nhận',
                            'processing' => 'Đang xử lý',
                            'shipping' => 'Đang giao hàng',
                            'completed' => 'Hoàn thành',
                            'cancelled' => 'Đã huỷ',
                            'cancel_requested' => 'Yêu cầu huỷ',
                        ][$order->status] ?? $order->status }}
                    </span>
                </p>

                <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }}₫</p>

                <h5 class="mt-4">Danh sách sản phẩm</h5>
                <ul class="list-group">
                    @if ($order->orderDetails && $order->orderDetails->count() > 0)
                        @foreach ($order->orderDetails as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item->product_name }} x {{ $item->quantity }}
                                <span>{{ number_format($item->price, 0, ',', '.') }}₫</span>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">Không có sản phẩm nào trong đơn hàng.</li>
                    @endif
                </ul>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Quay lại danh sách</a>

                @if (!$order->printed)
                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Chỉnh sửa trạng thái</a>

                    <a href="{{ route('admin.orders.print', $order->id) }}" class="btn btn-success"
                        onclick="return confirm('Bạn có chắc chắn muốn in phiếu không? Sau khi in sẽ không thể chỉnh sửa đơn hàng này!');">
                        In phiếu
                    </a>
                @else
                    <button class="btn btn-secondary" disabled>Đã in phiếu</button>
                @endif
            </div>

        </div>
    </div>
@endsection
