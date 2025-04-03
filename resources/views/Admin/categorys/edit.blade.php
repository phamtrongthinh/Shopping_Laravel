@extends('admin.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chỉnh Sửa Danh Mục</h3>
        </div>
        <form action="{{ route('admin.categorys.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên Danh Mục</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="description">Mô Tả</label>
                    <textarea name="description" class="form-control" id="description" rows="4">{{ $category->description }}</textarea>
                </div>

                <!-- Thêm trường Gender -->
                <div class="form-group">
                    <label for="gender">Phân loại</label>
                    <select name="gender" class="form-control" id="gender">
                        <option value="Unisex" {{ $category->gender == 'Unisex' ? 'selected' : '' }}>Unisex</option>
                        <option value="Nam" {{ $category->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ $category->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="active">Trạng Thái</label>
                    <select name="active" class="form-control" id="active">
                        <option value="1" {{ $category->active ? 'selected' : '' }}>Hoạt Động</option>
                        <option value="0" {{ !$category->active ? 'selected' : '' }}>Không Hoạt Động</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                <a href="{{ route('admin.categorys.index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </form>
    </div>
@endsection
