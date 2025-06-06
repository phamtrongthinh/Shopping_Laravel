@extends('admin.main')
@section('title', 'Quản lý Đơn Hàng')

<style>
    .badge {
        padding: 5px 10px;
        font-size: 14px;
    }

    .badge.pending {
        background-color: #ffcc00;
    }

    .badge.processing {
        background-color: #f39c12;
    }

    .badge.shipping {
        background-color: #3498db;
    }

    .badge.completed {
        background-color: #2ecc71;
    }

    .badge.cancelled {
        background-color: #e74c3c;
    }

    .badge.cancel_requested {
        background-color: #d66d6d; /* tím nhạt */
    }

    .custom-card {
        padding: 15px !important;
    }

    form .form-control,
    form button {
        height: 38px;
        padding: 6px 12px;
    }

    button.btn {
        padding: 6px 12px;
    }
</style>

@section('content')
    <div class="container">
        <h2 style="padding:10px">Quản lý đơn hàng</h2>

        <!-- Bộ lọc và tìm kiếm -->
        <form action="{{ route('admin.orders.index') }}" method="GET" class="d-flex mb-3">
            <input type="text" name="search" placeholder="Tìm kiếm theo mã đơn hàng, tên khách hàng..."
                class="form-control mr-2" value="{{ request('search') }}">
            <select name="status" class="form-control mr-2">
                <option value="">Tất cả trạng thái</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Đang chuẩn bị</option>
                <option value="shipping" {{ request('status') == 'shipping' ? 'selected' : '' }}>Đang giao</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Huỷ</option>
                <option value="cancel_requested" {{ request('status') == 'cancel_requested' ? 'selected' : '' }}>Yêu cầu huỷ</option>
            </select>
            <button type="submit" class="btn btn-primary">Tìm</button>
        </form>

        <!-- Thông báo kết quả tìm kiếm -->
        @if (request('search') || request('status'))
            <div class="alert alert-info">
                Kết quả tìm kiếm:
                @if (request('search'))
                    "Mã đơn hàng/tên khách hàng: {{ request('search') }}"
                @endif
                @if (request('status'))
                    @php
                        $statusLabels = [
                            'pending' => 'Chờ xử lý',
                            'processing' => 'Đang chuẩn bị',
                            'shipping' => 'Đang giao',
                            'completed' => 'Hoàn thành',
                            'cancelled' => 'Huỷ',
                            'cancel_requested' => 'Yêu cầu huỷ',
                        ];
                        $statusText = $statusLabels[request('status')] ?? 'Không xác định';
                    @endphp
                    <span> Trạng thái: {{ $statusText }}</span>
                @endif
            </div>
        @endif

        <!-- Bảng danh sách đơn hàng -->
        @if ($orders->isEmpty())
            <div class="alert alert-warning">
                Không có đơn hàng nào.
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng giá trị</th>
                        <th>Trạng thái</th>
                        <th>In phiếu</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->fullname }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                            <td>
                                @php
                                    $statusLabels = [
                                        'pending' => 'Chờ xử lý',
                                        'processing' => 'Đang chuẩn bị',
                                        'shipping' => 'Đang giao',
                                        'completed' => 'Hoàn thành',
                                        'cancelled' => 'Huỷ',
                                        'cancel_requested' => 'Yêu cầu huỷ',
                                    ];
                                    $statusText = $statusLabels[$order->status] ?? 'Không xác định';
                                @endphp
                                <span class="badge {{ $order->status }}">{{ $statusText }}</span>
                            </td>
                            <td>
                                @if ($order->printed)
                                    <span class="text-success">Đã in phiếu</span>
                                @else
                                    <form action="{{ route('admin.orders.print', $order->id) }}" method="GET"
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn in phiếu không? Sau khi in sẽ không thể chỉnh sửa đơn hàng này!');">
                                        @csrf
                                        <button type="submit" class="btn btn-success">In phiếu</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Xem</a>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                                @if (in_array($order->status, ['completed', 'cancelled']))
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Bạn có chắc muốn xóa đơn hàng này không? Xoá lịch sử sẽ không được lưu lại.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Phân trang -->
        {{ $orders->links() }}
    </div>
@endsection
