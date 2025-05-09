@extends('admin.main')
<style>
    .custom-card {
        padding: 15px !important;
    }
</style>
@section('title', 'Cập nhật trạng thái đơn hàng')

@section('content')
    <div class="container">
        <h2>Cập nhật trạng thái đơn hàng #{{ $order->id }}</h2>

        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Trạng thái:</label>
                <select name="status" class="form-control" required>
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang chuẩn bị</option>
                    <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Đang giao</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                    <option value="cancel_requested" {{ $order->status == 'cancel_requested' ? 'selected' : '' }}>Yêu cầu
                        huỷ</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Huỷ</option>
                </select>
            </div>
            @if ($order->status === 'cancel_requested' && !empty($order->note2))
                <div class="form-group mt-3">
                    <label>Lý do yêu cầu huỷ:</label>
                    <textarea class="form-control" rows="3" readonly>{{ $order->note2 }}</textarea>
                </div>

                <div class="form-group mt-3">
                    <label>Phản hồi từ shop:</label>
                    <input type="text" name="shop_note" class="form-control" placeholder="Nhập phản hồi (nếu có)"
                        value="{{ old('shop_note', $order->shop_note) }}">
                </div>
            @endif



            <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-2">Huỷ</a>
        </form>
    </div>
@endsection
