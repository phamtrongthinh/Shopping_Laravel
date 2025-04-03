@extends('Admin.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tạo Danh Mục Mới</h3>
        </div>
        <form action="{{ route('admin.categorys.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên Danh Mục</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên danh mục">
                </div>

                <div class="form-group">
                    <label for="description">Mô Tả</label>
                    <textarea name="description" class="form-control" id="description" rows="4" placeholder="Nhập mô tả danh mục"></textarea>
                </div>
                <!-- Thêm trường Gender -->
                <div class="form-group">
                    <label for="gender">Giới Tính</label>
                    <select name="gender" class="form-control" id="gender">
                        <option value="Unisex">Unisex</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="active">Trạng Thái</label>
                    <select name="active" class="form-control" id="active">
                        <option value="1">Hoạt Động</option>
                        <option value="0">Không Hoạt Động</option>
                    </select>
                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo Mới</button>
                <a href="{{ route('admin.categorys.index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </form>
    </div>
@endsection
