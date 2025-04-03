@extends('Admin.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tạo Sản Phẩm Mới</h3>
        </div>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">
                    <!-- Bên trái (2 phần) -->
                    <div class="col-md-8">
                        <!-- Tên Sản Phẩm -->
                        <div class="form-group">
                            <label for="name">Tên Sản Phẩm</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Nhập tên sản phẩm" required>
                        </div>

                        <!-- Mô Tả Sản Phẩm -->
                        <div class="form-group">
                            <label for="description">Mô Tả</label>
                            <textarea name="description" class="form-control" id="description" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
                        </div>

                        <!-- Danh Mục -->
                        <div class="form-group">
                            <label for="category_id">Danh Mục</label>
                            <select name="category_id" class="form-control" id="category_id">
                                <option value="">Chọn danh mục</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!--------------------------------------- Bên phải (1 phần)-------------------------------------- -->
                    <div class="col-md-4">
                        <!-- Giá Sản Phẩm -->
                        <div class="form-group">
                            <label for="price">Giá Sản Phẩm</label>
                            <input type="number" name="price" class="form-control" id="price"
                                placeholder="Nhập giá sản phẩm" required>
                        </div>

                        <!-- Giảm Giá -->
                        <div class="form-group">
                            <label for="sale">Giảm Giá (%)</label>
                            <input type="number" name="sale" class="form-control" id="sale"
                                placeholder="Nhập giảm giá (nếu có)" min="0" max="100">
                        </div>

                        <!-- Trạng Thái -->
                        <div class="form-group">
                            <label for="status">Trạng Thái</label>
                            <select name="status" class="form-control" id="status">
                                <option value="1">Hoạt Động</option>
                                <option value="0">Không Hoạt Động</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!----------------------------------------- Biến thể sản phẩm --------------------------------------------------------->
                <div class="form-group">
                    <label>Chi Tiết Sản Phẩm</label>
                    <div id="product-details">
                        <div class="row product-detail-item">
                            <div class="col-md-3">
                                <input type="text" name="colors[]" class="form-control" placeholder="Màu sắc" required>
                            </div>
                            <div class="col-md-3">
                                <select name="sizes[]" class="form-control" required>
                                    <option value="">Chọn kích thước</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="quantities[]" class="form-control" placeholder="Số lượng"
                                    required>
                            </div>
                            <div class="col-md-3">
                                <input type="file" name="images[]" class="form-control">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger remove-detail">X</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success mt-2" id="add-detail">Thêm biến thể</button>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo Mới</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </form>
    </div>

    <script>
        // khi ấn vào nút thêm biến thể thì thực hiện tạo 1 bản sao thêm dữ liệu
        document.getElementById('add-detail').addEventListener('click', function() {
            let newDetail = document.querySelector('.product-detail-item').cloneNode(true);

            // Reset giá trị các trường input
            newDetail.querySelectorAll('input').forEach(input => input.value = '');
            newDetail.querySelectorAll('select').forEach(select => select.selectedIndex = 0); // Reset select option

            // Thêm margin-bottom để tạo khoảng cách giữa các biến thể
            newDetail.style.marginTop = '15px';

            document.getElementById('product-details').appendChild(newDetail);
        });

        // khi ấn vào dấu x sẽ xoá thẻ chứa các trương nhập dữ liệu đấy 
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-detail')) {
                event.target.closest('.product-detail-item').remove();
            }
        });
    </script>
@endsection
