
@extends('frontend.partial.main')
@include('frontend.partial.alert')
@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Danh sách đơn hàng của bạn</h2>
        @if (request('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: {!! json_encode(request('success')) !!},
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        @forelse ($orders as $order)
            <div class="border rounded-lg p-4 mb-4 shadow-sm bg-white">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                    <div>
                        <p class="font-medium text-lg">Mã đơn hàng: <span class="text-blue-600">#{{ $order->id }}</span>
                        </p>
                        <p>Ngày đặt: {{ $order->created_at->format('d/m/Y H:i') }}</p>
                        <p>Tổng tiền: <span
                                class="text-red-500 font-semibold">{{ number_format($order->total_amount) }}₫</span></p>
                    </div>
                    <div class="mt-2 md:mt-0 text-right">
                        <span
                            class="inline-block px-3 py-1 rounded-full text-sm
                        @if ($order->status == 'pending') bg-yellow-100 text-yellow-800
                        @elseif ($order->status == 'processing') bg-blue-100 text-blue-800
                        @elseif ($order->status == 'completed') bg-green-100 text-green-800
                        @elseif ($order->status == 'cancelled') bg-red-100 text-red-800 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                        <a href="{{ route('orders.show', $order->id) }}"
                            class="ml-4 inline-block text-blue-600 hover:underline">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Bạn chưa có đơn hàng nào.</p>
        @endforelse
    </div>
@endsection
