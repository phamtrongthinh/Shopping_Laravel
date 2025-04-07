@extends('Admin.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chỉnh Sửa Sản Phẩm</h3>
        </div>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Tên -->
                        <div class="form-group">
                            <label for="name">Tên Sản Phẩm</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                class="form-control" id="name">
                        </div>

                        <!-- Mô tả -->
                        <div class="form-group">
                            <label for="description">Mô Tả</label>
                            <textarea name="description" class="form-control" id="description" rows="4">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <!-- Danh mục -->
                        <div class="form-group">
                            <label for="category_id">Danh Mục</label>
                            <select name="category_id" class="form-control" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Bên phải -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}"
                                class="form-control" id="price">
                        </div>

                        <div class="form-group">
                            <label for="sale">Giảm giá (%)</label>
                            <input type="number" name="sale" value="{{ old('sale', $product->sale) }}"
                                class="form-control" id="sale" min="0" max="100">
                        </div>

                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select name="status" class="form-control" id="status">
                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Không hoạt động
                                </option>
                            </select>
                        </div>

                        <!-- Ảnh -->
                        <div class="form-group border p-3 rounded">
                            <label for="image">Ảnh Sản Phẩm</label>
                            <input type="file" name="image" class="form-control-file" id="image"
                                onchange="previewImage(event)">
                            @if ($product->image)
                                <br>
                                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Ảnh cũ"
                                    class="img-thumbnail mt-2" style="max-width: 100px;">
                            @endif
                            <br>
                            <img id="preview" class="img-thumbnail mt-2" style="display:none; max-width: 100px;"
                                alt="Xem trước ảnh">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
