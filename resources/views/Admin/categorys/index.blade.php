@extends('admin.main')
@section('title', 'Danh Sách Danh Mục')


@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh Sách Danh Mục</h2>
        <a href="{{ route('admin.categorys.create') }}" class="btn btn-primary " style="margin-right:0.5cm;">Thêm Danh Mục</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Mô Tả</th>
                <th>Trạng Thái</th>
                <th>Ngày Tạo</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description ?? 'Không có mô tả' }}</td>
                    <td>{{ $category->active ? 'Hoạt động' : 'Không hoạt động' }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.categorys.edit', $category->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('admin.categorys.delete', $category->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection
