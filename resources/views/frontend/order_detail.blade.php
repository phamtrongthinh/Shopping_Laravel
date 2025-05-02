@extends('frontend.partial.main')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-8">Chi tiết đơn hàng #{{ $order->id }}</h2>

        <div class="bg-white p-8 rounded-xl shadow-xl mb-8">
            <!-- Đoạn thông tin đơn hàng -->
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
                <div>
                    <p class="text-lg font-medium text-gray-800">Ngày đặt: <span class="text-blue-600">{{ $order->created_at->format('d/m/Y H:i') }}</span></p>
                    <p class="text-2xl font-semibold text-red-600 mt-2">Tổng tiền: {{ number_format($order->total_amount) }}₫</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <span class="inline-block px-6 py-2 text-sm rounded-full 
                        @if ($order->status == 'pending') bg-yellow-200 text-yellow-800 
                        @elseif ($order->status == 'processing') bg-blue-200 text-blue-800 
                        @elseif ($order->status == 'completed') bg-green-200 text-green-800 
                        @elseif ($order->status == 'cancelled') bg-red-200 text-red-800 @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <!-- Thông tin người nhận -->
            <div class="border-b pb-6 mb-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Thông tin người nhận</h3>
                <p class="text-lg"><strong>Họ tên:</strong> {{ $order->fullname }}</p>
                <p class="text-lg"><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                <p class="text-lg"><strong>Email:</strong> {{ $order->email }}</p>
                <p class="text-lg"><strong>Địa chỉ:</strong> {{ $order->address }}, {{ $order->ward }}, {{ $order->district }}, {{ $order->province }}</p>
                @if ($order->note)
                    <p class="text-lg"><strong>Ghi chú:</strong> {{ $order->note }}</p>
                @endif
            </div>

            <!-- Danh sách sản phẩm -->
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Danh sách sản phẩm</h3>
                <div class="space-y-6">
                    @foreach ($order->orderItems as $item)
                        <div class="flex justify-between items-center bg-gray-50 p-6 rounded-lg shadow-md">
                            <div class="flex items-center">
                                <img src="{{ asset($item->productDetail->image)  }}" alt="{{ $item->product_name }}" class="w-24 h-24 object-cover rounded-md mr-6">
                                <div>
                                    <p class="text-lg font-semibold text-gray-800">{{ $item->product_name }}</p>
                                    <p class="text-sm text-gray-500">Size: {{ $item->size }} | Màu: {{ $item->color_name }}</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-xl font-semibold text-gray-800">{{ number_format($item->price) }}₫</p>
                                <p class="text-lg text-gray-500">Số lượng: {{ $item->quantity }}</p>
                                <p class="text-lg font-medium text-gray-800">Tổng: {{ number_format($item->price * $item->quantity) }}₫</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Nút quay lại -->
        <a href="{{ route('orders.index') }}" class="inline-block text-blue-600 hover:text-blue-800 font-semibold text-lg">Quay lại danh sách đơn hàng</a>
    </div>
@endsection
