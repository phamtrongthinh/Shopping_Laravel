@extends('Admin.main')
@section('head')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <style>
        .cke_notification {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <!---------------Tạo danh mục----------->
    <form action="{{ route('admin.menu.store') }}" method="post">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label>Tên danh mục*</label>
                <input type="text" name="menu" class="form-control" id="menu" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label>Danh mục cha*</label>
                <select name="parent_id" class="form-control">
                    <option value="0">Danh mục cha</option>
                    <!-- Hiển thị danh sách danh mục cha  với foreach -->
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control" id="description" placeholder="Nhập mô tả"></textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết danh mục </label>
                <textarea name="content" class="form-control" id="content" placeholder="Nhập mô tả" style="min-height: 300px;"></textarea>

            </div>

            <div class="form-group">
                <label>Kích Hoạt*</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" checked>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>




        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo danh mục </button>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contentElement = document.getElementById('content');
            if (contentElement) {
                CKEDITOR.replace('content');
            } else {
                console.error('Element with ID "content" not found.');
            }
        });
    </script>
@endsection
