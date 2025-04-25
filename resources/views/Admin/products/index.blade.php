@extends('Admin.main')


@section('content')
    <div class="card">
        <div class="card-header px-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Danh Sách Sản Phẩm </h3>
                <div class="d-flex align-items-center">
                    <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex mr-2">
                        <input type="text" name="search" class="form-control form-control-sm mr-2"
                            placeholder="Tìm kiếm sản phẩm..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-secondary btn-sm">Tìm</button>
                    </form>
                    <a href="{{ route('admin.products.add') }}" class="btn btn-primary btn-sm d-flex align-items-center">
                        <i class="fas fa-plus-circle mr-1"></i> Thêm sản phẩm
                    </a>
                </div>
            </div>
        </div>
        <!-- Hiển thị thông báo kết quả tìm kiếm -->
        @if (request()->has('search') && request('search') != '')
            <div class="alert alert-info">
                Kết quả tìm kiếm cho từ khóa: <strong>{{ request('search') }}</strong>
            </div>
        @endif

        @if ($product->count() > 0)
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>Stt</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th> Nổi bật </th>
                            <th>Trạng thái</th>
                            <th>Phân loại</th>
                            <th>Ảnh</th>
                            <th>Số lượng tồn</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $stt => $item)
                            <tr style="text-align: center">
                                <td>{{ $stt + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name ?? 'Không có' }}</td>

                                <td>
                                    <span class="badge badge-{{ $item->hot ? 'danger' : 'secondary' }}"
                                        style="min-width: 40px; text-align: center;">
                                        {{ $item->hot ? 'Có' : 'Không' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $item->status ? 'success' : 'secondary' }}">
                                        {{ $item->status ? 'Hoạt động' : 'Không hoạt động' }}
                                    </span>
                                </td>

                                <td>
                                    {{ $item->gender == 'men' ? 'Nam' : ($item->gender == 'women' ? 'Nữ' : 'Unisex') }}
                                </td>

                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset($item->image) }}" alt="Ảnh" width="100" height="100"
                                            class="img-thumbnail" style="object-fit: cover;">
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

                                    <a href="{{ route('admin.products.edit', ['id' => $item->id, 'page' => request('page')]) }}"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <form
                                        action="{{ route('admin.products.delete', ['id' => $item->id, 'page' => request('page')]) }}"
                                        method="POST" style="display:inline-block;"
                                        onsubmit="return confirm('Bạn có chắc muốn xoá?')">
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
                    {{ $product->appends(['page' => $page])->links() }}
                </div>
            </div>
        @else
            <div class="alert alert-warning">
                Không có kết quả tìm kiếm nào phù hợp với từ khóa: <strong>{{ request('search') }}</strong>
                <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary ml-2">Quay lại</a>
            </div>
        @endif
    </div>
@endsection
