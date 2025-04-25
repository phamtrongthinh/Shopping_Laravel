@extends('Admin.main')
<style>
   .content-wrapper {
    overflow-y: scroll;
}
</style>

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chi Tiết Sản Phẩm: {{ $product->name }}</h3>
        </div>

        <div class="card-body">
            <h5><strong>Mô Tả Sản Phẩm:</strong></h5>
            <p>{{ $product->description ?? 'Chưa có thông tin mô tả' }} </p>

            <h5><strong>Danh sách Chi Tiết Sản Phẩm:</strong></h5>
            @if ($details->count() > 0)
                <table class="table table-bordered text-center align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th>Màu</th>
                            <th>Kích Thước</th>
                            <th class="text-center">Giá</th>
                            <th class="text-center">Giảm giá</th>
                            <th>Số Lượng</th>
                            <th>Ảnh</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                            <tr>
                                <td>{{ $detail->color->name ?? '-' }}</td>
                                <td>{{ $detail->size }}</td>
                                <td>{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                                <td>{{ $detail->sale ?? 0 }}%</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>
                                    @if ($detail->image)
                                        <img src="{{ asset($detail->image) }}" alt="Ảnh chi tiết" width="100" height="100"
                                        class="img-thumbnail" style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">Không có ảnh</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.product_details.edit', ['product' => $product->id, 'detail' => $detail->id]) }}"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <form
                                        action="{{ route('admin.product_details.destroy', ['product' => $product->id, 'detail' => $detail->id]) }}"
                                        method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $details->links() }}
            @else
                <p>Chưa có chi tiết sản phẩm nào.</p>
            @endif
        </div>

        <div class="card-footer">
            <a href="{{ route('admin.products.index', ['page' => $paginate]) }}" class="btn btn-secondary">Quay lại danh sách sản phẩm</a>
            <a href="{{ route('admin.product_details.create', ['product' => $product->id]) }}"
                class="btn btn-primary ml-2">Thêm chi tiết sản phẩm</a>
        </div>
    </div>
@endsection

<script>
    function confirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa chi tiết sản phẩm này không?');
    }
</script>
