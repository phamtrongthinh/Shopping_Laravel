@extends('Admin.main')

@section('content')
    <div class="container mt-4" style="max-width: 600px;">
        <div class="card shadow rounded">
            <div class="card-header">
                <h3 class="card-title">Thêm Màu Sắc</h3>
            </div>
            <form action="{{ route('admin.products.colors.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">Tên Màu</label>
                        <input type="text" name="name" class="form-control form-control-sm" id="name"
                            value="{{ old('name') }}" placeholder="Nhập tên màu">
                    </div>

                    <div class="form-group mb-3">
                        <label for="code">Mã Màu</label>
                        <input type="color" class="form-control form-control-color form-control-sm" id="code"
                            name="code" value="{{ old('code', '#000000') }}">

                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Thêm Màu
                    </button>
                    <a href="{{ route('admin.products.colors.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Quay Lại
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
