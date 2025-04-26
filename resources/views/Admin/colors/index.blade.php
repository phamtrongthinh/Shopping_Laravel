@extends('Admin.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow rounded">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="card-title mb-0 p-2">Danh Sách Màu Sắc</h3>
                <div class="p-2 pr-3">
                    <a href="{{ route('admin.products.colors.add') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Thêm Màu Mới
                    </a>
                </div>
            </div>
            
            
            
            <div class="card-body">
                @if ($colors->isEmpty())
                    <p>Chưa có màu sắc nào.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên Màu</th>
                                <th>Mã Màu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                                <tr>
                                    <td>{{ $color->name }}</td>
                                    <td>
                                        <span
                                            style="display:inline-block;width:20px;height:20px;background-color:{{ $color->code }};"></span>
                                        {{ $color->code }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.colors.edit', ['id' => $color->id, 'page' => request()->get('page')]) }}"
                                            class="btn btn-warning btn-sm">
                                             <i class="fas fa-edit"></i> Sửa
                                         </a>
                                         
                                        <form action="{{ route('admin.products.colors.delete', $color->id) }}"
                                            method="POST" style="display:inline;"
                                            onsubmit="return confirmDelete({{ $color->productDetails->count() }})">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Đặt phân trang ở ngoài bảng -->
                    <div class="d-flex justify-content-start mt-3">
                        {{ $colors->links() }}
                    </div>
                @endif
            </div>
            {{-- <div class="card-footer d-flex justify-content-between">

                <a href="{{ route('admin.products.colors.add') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Thêm Màu Mới
                </a>
            </div> --}}

        </div>
    </div>

    <script>
        function confirmDelete(productdetailCount) {
            if (productdetailCount > 0) {
                return confirm("Danh mục này đang được " + productdetailCount + " sản phẩm sử dụng. Bạn có chắc muốn xóa?");
            }
            return confirm("Bạn có chắc muốn xóa danh mục này?");
        }
    </script>
@endsection
