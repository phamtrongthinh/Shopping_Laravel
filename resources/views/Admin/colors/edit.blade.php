@extends('Admin.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow rounded">
            <div class="card-header">
                <h3 class="card-title">Sửa Màu Sắc</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.colors.update', $color->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Tên Màu</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $color->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="code">Mã Màu</label>
                        <input type="color" name="code" id="code" class="form-control"
                            value="{{ old('code', $color->code) }}" >
                    </div>
                    <button type="submit" class="btn btn-success">Cập Nhật</button>
                    <a href="{{ route('admin.products.colors.index', ['page' => $page]) }}" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
        </div>
    </div>
@endsection
