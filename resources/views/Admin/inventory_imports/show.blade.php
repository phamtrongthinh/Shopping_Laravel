@extends('admin.main')
@section('title', 'Chi tiết Phiếu nhập kho')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Chi tiết Phiếu nhập kho</h3>
    <div class="card mb-4">
        <div class="card-body">
       
            <p><strong>Mã phiếu nhập:</strong> {{ $import->id }}</p>
            <p><strong>Người tạo phiếu:</strong> {{ $import->user->name }}</p>
            <p><strong>Ngày tạo:</strong> {{ $import->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Ngày cập nhập:</strong> {{ $import->updated_at->format('d/m/Y H:i') }}</p>
            <p><strong>Ghi chú:</strong> {{ $import->note ?? 'Không có' }}</p>            
            <p><strong>Tổng tiền:</strong> {{ number_format($import->total_amount, 0, ',', '.') }}₫</p>
        </div>
    </div>

    <h5>Danh sách sản phẩm đã nhập</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Màu sắc</th>
                <th>Kích cỡ</th>
                <th>Số lượng</th>
                <th>Giá nhập</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($import->items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->productDetail->product->name ?? 'N/A' }}</td>
                    <td>{{ $item->productDetail->color->name ?? 'N/A' }}</td>
                    <td>{{ $item->productDetail->size ?? 'N/A' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->unit_price, 0, ',', '.') }}₫</td>
                    <td>{{ number_format($item->quantity * $item->unit_price, 0, ',', '.') }}₫</td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('admin.inventory.imports.index') }}" class="btn btn-secondary mt-3 mr-2">Quay lại danh sách</a>
    <a href="{{ route('admin.inventory.imports.edit', $import->id) }}" class="btn btn-primary mt-3 ">Sửa phiếu nhập</a>
    
</div>
@endsection
