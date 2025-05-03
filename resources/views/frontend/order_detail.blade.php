@extends('frontend.partial.main')

@section('title', 'Chi tiết đơn hàng')
<style>
    .order-container {
        max-width: 1000px;
        margin: 30px auto;
        padding: 20px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .order-logo {
        font-size: 24px;
        font-weight: 700;
        color: #007bff;
    }

    .order-status {
        background-color: #e6f0ff;
        color: #0056b3;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 15px;
    }

    .order-info .order-id {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .order-date,
    .payment-method {
        font-size: 14px;
        color: #666;
    }

    .section-title {
        font-size: 20px;
        font-weight: 600;
        margin: 30px 0 15px;
        border-left: 5px solid #717fe0;
        padding-left: 12px;
    }

    .customer-info {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .shipping-info,
    .billing-info {
        flex: 1 1 45%;
        background-color: #f9f9f9;
        padding: 18px;
        border-radius: 10px;
        border: 1px solid #e0e0e0;
    }

    .info-title {
        font-weight: 600;
        margin-bottom: 10px;
        color: #444;
    }

    .info-content p {
        margin: 5px 0;
        font-size: 14px;
    }

    .products-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        overflow: hidden;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .products-table th,
    .products-table td {
        padding: 14px;
        text-align: left;
    }

    .products-table th {
        background-color: #f1f1f1;
        font-weight: 600;
        font-size: 14px;
        color: #444;
    }

    .products-table tr:not(:last-child) td {
        border-bottom: 1px solid #eee;
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .product-image img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .product-name {
        font-weight: 500;
    }

    .product-variant {
        font-size: 13px;
        color: #777;
    }

    .price,
    .quantity,
    .subtotal {
        font-size: 14px;
        color: #555;
    }

    .subtotal {
        font-weight: 600;
    }

    .summary {
        margin-top: 30px;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 15px;
    }

    .summary-row:last-child {
        border-top: 1px solid #ccc;
        padding-top: 15px;
        margin-top: 15px;
        font-weight: 700;
        font-size: 16px;
    }

    /* Tracking Status Styles */
    .tracking-status {
        margin: 30px 0;
    }

    .timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 7px;
        top: 0;
        height: 100%;
        width: 2px;
        background: #ddd;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 25px;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-item.active .timeline-dot {
        background: #3a86ff;
        border-color: #3a86ff;
    }

    .timeline-item.active .timeline-date {
        color: #3a86ff;
        font-weight: 600;
    }

    .timeline-dot {
        position: absolute;
        left: -30px;
        top: 0;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 2px solid #ddd;
        background: #fff;
    }

    .timeline-content {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
    }

    .timeline-date {
        font-size: 14px;
        color: #777;
        margin-bottom: 5px;
    }

    .timeline-title {
        font-weight: 600;
        margin-bottom: 5px;
    }

    .timeline-desc {
        font-size: 14px;
        color: #666;
    }

    .order-footer {
        margin-top: 30px;
        text-align: center;
        color: #777;
        font-size: 14px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    .order-footer a {
        color: #3a86ff;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .customer-info {
            flex-direction: column;
        }

        .header {
            flex-direction: column;
            gap: 10px;
        }

        .summary-row {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

@section('content')
    <div class="order-container">
        <div class="order-info">
            <div class="order-id">Mã đơn hàng: {{ $order->id }}</div>
            <div class="order-date">Ngày đặt hàng: {{ $order->created_at }}</div>
            <div class="payment-method">Phương thức thanh toán: Thanh toán khi nhận hàng</div>
        </div>

        <h2 class="section-title">Thông tin khách hàng</h2>
        <div class="customer-info">
            <div class="shipping-info">
                <div class="info-content">
                    <p><strong>Họ tên:</strong> {{ $order->fullname }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                    <p><strong>Địa chỉ:</strong>
                        {{ $order->address }},
                        {{ $order->wardRelation->name ?? 'Chưa có xã' }},
                        {{ $order->districtRelation->name ?? 'Chưa có huyện' }},
                        {{ $order->provinceRelation->name ?? 'Chưa có tỉnh' }}
                    </p>
                </div>


            </div>
        </div>

        <h2 class="section-title">Sản phẩm</h2>
        <table class="products-table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>
                            <div class="product-info">
                                <div class="product-image">
                                    <img src="{{ asset($item->productDetail->image ?? '/api/placeholder/70/70') }}"
                                        alt="{{ $item->product->name }}">
                                </div>
                                <div>
                                    <div class="product-name">{{ $item->product->name }}</div>
                                    <div class="product-variant">
                                        @php
                                            $color = $item->productDetail->color->name ?? '';
                                            $size = $item->productDetail->size ?? '';
                                        @endphp
                                        {{ $color ? 'Màu: ' . $color : '' }}
                                        {{ $size ? ', Size: ' . $size : '' }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="price">{{ number_format($item->price, 0, ',', '.') }}₫</td>
                        <td class="quantity">{{ $item->quantity }}</td>
                        <td class="subtotal">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="summary">
            <div class="summary-row">
                <div>Tạm tính</div>
                <div>19.540.000₫</div>
            </div>

            <div class="summary-row">
                <div>Phí vận chuyển</div>
                <div>30.000₫</div>
            </div>
            <div class="summary-row">
                <div>Giảm giá</div>
                <div>-10.000₫</div>
            </div>
            <div class="summary-row">
                <div>Tổng cộng</div>
                <div>19.560.000₫</div>
            </div>
        </div>
        <h2 class="section-title">Trạng thái đơn hàng</h2>
        @php
            $currentStatus = $order->status;

            $statusSteps = [
                'pending' => [
                    'title' => 'Đã đặt hàng',
                    'desc' => 'Cảm ơn bạn đã đặt hàng. Chúng tôi đã nhận được đơn hàng của bạn.',
                    'datetime' => $order->created_at->format('d/m/Y - H:i'),
                ],
                'processing' => [
                    'title' => 'Đang chuẩn bị hàng',
                    'desc' => 'Đơn hàng đang được xác nhận và đóng gói.',
                    'datetime' => $order->processing_at ? $order->processing_at->format('d/m/Y - H:i') : '',
                ],
                'shipping' => [
                    'title' => 'Đang giao hàng',
                    'desc' => 'Đơn hàng đang được giao đến bạn.',
                    'datetime' => $order->shipping_at ? $order->shipping_at->format('d/m/Y - H:i') : '',
                ],
                'completed' => [
                    'title' => 'Giao hàng thành công',
                    'desc' => 'Bạn đã nhận hàng. Cảm ơn đã mua sắm!',
                    'datetime' => $order->completed_at ? $order->completed_at->format('d/m/Y - H:i') : '',
                ],
                'cancelled' => [
                    'title' => 'Đơn hàng đã huỷ',
                    'desc' => 'Đơn hàng đã bị huỷ bởi người dùng hoặc hệ thống.',
                    'datetime' => $order->cancelled_at ? $order->cancelled_at->format('d/m/Y - H:i') : '',
                ],
            ];

            $statusOrder = ['pending', 'processing', 'shipping', 'completed'];
            if ($currentStatus == 'cancelled') {
                $statusOrder = ['pending', 'cancelled'];
            }
        @endphp

        <div class="tracking-status">
            <div class="timeline">
                @foreach ($statusOrder as $status)
                    <div
                        class="timeline-item {{ array_search($status, $statusOrder) <= array_search($currentStatus, $statusOrder) ? 'active' : '' }}">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-date">{{ $statusSteps[$status]['datetime'] }}</div>
                            <div class="timeline-title">{{ $statusSteps[$status]['title'] }}</div>
                            <div class="timeline-desc">{{ $statusSteps[$status]['desc'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="actions">
            <a href="{{ route('orders.index') }}" class="btn" style="background-color: #6f42c1; color: white;">
                Quay lại
            </a>
        </div>



    </div>
@endsection
