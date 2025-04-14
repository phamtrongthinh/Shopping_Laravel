@extends('Admin.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh Sách sản phẩm</h3>
            <!-- Nút Thêm sản phẩm -->
            <a href="{{ route('admin.products.add') }}" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus-circle"></i> Thêm sản phẩm
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Giảm giá</th>
                        <th>Trạng thái</th>
                        <th>Ảnh</th>
                        <th>Số lượng tồn</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $stt => $item)
                        <tr>
                            <td>{{ $stt + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name ?? 'Không có' }}</td>
                            <td>{{ number_format($item->price, 0, ',', '.') }} đ</td>
                            <td style="text-align: center">{{ $item->sale }}%</td>
                            <td>
                                <span class="badge badge-{{ $item->status ? 'success' : 'secondary' }}">
                                    {{ $item->status ? 'Hoạt động' : 'Không hoạt động' }}
                                </span>
                            </td>
                            <td>
                                @if ($item->image)
                                    <img src="{{ asset($item->image) }}" alt="Ảnh" width="100" height="100"
                                        class="img-thumbnail">
                                @endif

                            </td>
                            @php
                                $totalQuantity = $item->productDetails->sum('quantity');
                            @endphp

                            <td style="text-align: center; color: {{ $totalQuantity < 10 ? 'red' : 'inherit' }}">
                                {{ $totalQuantity }}
                            </td>

                            <td>
                                <a href="{{ route('admin.product_details.index', ['product' => $item->id]) }}"
                                    class="btn btn-info btn-sm">Xem</a>
                                <a href="{{ route('admin.products.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('admin.products.delete', $item->id) }}" method="POST"
                                    style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xoá?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Xoá</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Phân trang -->
            <div class="mt-3">
                {{ $product->links() }}
            </div>
        </div>
    </div>
@endsection
