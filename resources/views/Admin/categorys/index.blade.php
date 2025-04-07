@php
    use Illuminate\Support\Str;
@endphp

@extends('admin.main')
@section('title', 'Danh Sách Danh Mục')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh Sách Danh Mục</h2>
        <div class="d-flex">
            <!-- Ô tìm kiếm -->
            <form action="{{ route('admin.categorys.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control mr-2" placeholder="Tìm kiếm danh mục..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-secondary">Tìm</button>
            </form>
            <!-- Nút thêm danh mục -->
            <a href="{{ route('admin.categorys.create') }}" class="btn btn-primary ml-2">Thêm Danh Mục</a>
        </div>
    </div>

    <!-- Hiển thị thông báo kết quả tìm kiếm -->
    @if (request()->has('search') && request('search') != '')
        <div class="alert alert-info">
            Kết quả tìm kiếm cho từ khóa: <strong>{{ request('search') }}</strong>
        </div>
    @endif

    <!-- Kiểm tra nếu không có kết quả tìm kiếm -->
    @if ($categories->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 5%;">STT</th>
                    <th style="width: 20%;">Tên Danh Mục</th>
                    <th style="width: 25%;">Mô Tả</th>
                    <th style="width: 10%;">Phân loại</th> <!-- Thêm cột Giới Tính -->
                    <th style="width: 10%;">Trạng Thái</th>
                    <th style="width: 15%;">Ngày Tạo</th>
                    <th style="width: 15%;">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $STT => $category)
                    <tr>
                        <td>{{ $STT+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ Str::limit($category->description ?? 'Không có mô tả', 80, '...') }}</td>
                        <td>{{ $category->gender ?? 'Không xác định' }}</td> <!-- Hiển thị giới tính -->
                        <td>
                            <span class="badge badge-{{ $category->active ? 'success' : 'secondary' }}">
                                {{ $category->active ? 'Hoạt động' : 'Không hoạt động' }}
                            </span>
                        </td>
                        {{-- <td>{{ $category->active ? 'Hoạt động' : 'Không hoạt động' }}</td> --}}
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.categorys.edit', $category->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('admin.categorys.delete', $category->id) }}" method="POST"
                                style="display:inline-block;"
                                onsubmit="return confirmDelete({{ $category->products->count() }})">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $categories->links() }}
    @else
        <div class="alert alert-warning">
            Không có kết quả tìm kiếm nào phù hợp với từ khóa: <strong>{{ request('search') }}</strong>
            <a href="{{ route('admin.categorys.index') }}" class="btn btn-sm btn-primary ml-2">Quay lại</a>
        </div>
    @endif
    <script>
        function confirmDelete(productCount) {
            if (productCount > 0) {
                return confirm("Danh mục này đang được " + productCount + " sản phẩm sử dụng. Bạn có chắc muốn xóa?");
            }
            return confirm("Bạn có chắc muốn xóa danh mục này?");
        }
    </script>


@endsection
