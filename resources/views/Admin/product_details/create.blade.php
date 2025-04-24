@extends('Admin.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm Chi Tiết Sản Phẩm: {{ $product->name }}</h3>
        </div>

        <form action="{{ route('admin.product_details.store', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Chi Tiết Sản Phẩm</label>

                    <!-- Dòng 1: Màu, mã màu, size -->
                    <div class="row mb-3">
                        <!-- Chọn màu -->
                        <div class="col-md-4">
                            <label for="colorSelect">Chọn màu</label>
                            <select name="colorselect" class="form-control" id="colorSelect">
                                <option value="">Chọn màu</option>
                                @foreach ($colors as $otherColor)
                                    <option value="{{ $otherColor->id }}" data-name="{{ $otherColor->name }}" data-code="{{ $otherColor->code }}">
                                        {{ $otherColor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Mã màu -->
                        <div class="col-md-4">
                            <label for="colorInput">Mã màu</label>
                            <input type="color" name="colorInput" id="colorInput" class="form-control" value="" disabled>
                        </div>

                        <!-- Kích thước -->
                        <div class="col-md-4">
                            <label for="size">Kích thước</label>
                            <select name="size" class="form-control">
                                <option value="">Chọn kích thước</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                    </div>

                    <!-- Dòng 2: Giá, giảm giá, số lượng -->
                    <div class="row mb-3">
                        <!-- Giá -->
                        <div class="col-md-4">
                            <label for="price">Giá Sản Phẩm</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="Nhập giá sản phẩm">
                        </div>

                        <!-- Giảm giá -->
                        <div class="col-md-4">
                            <label for="sale">Giảm Giá (%)</label>
                            <input type="number" name="sale" class="form-control" id="sale" value="{{ old('sale', 0) }}" placeholder="Nhập giảm giá nếu có">
                        </div>

                        <!-- Số lượng -->
                        <div class="col-md-4">
                            <label for="quantities">Số lượng</label>
                            <input type="number" name="quantities" class="form-control" placeholder="Số lượng">
                        </div>
                    </div>

                    <!-- Ảnh sản phẩm -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group border p-3 rounded">
                                <label for="image">Ảnh Sản Phẩm</label>
                                <input type="file" name="image" class="form-control-file" id="image" accept="image/*" onchange="previewImage(event)">
                                <br>
                                <img id="preview" class="img-thumbnail mt-2" style="display:none; max-width: 100px;" alt="Xem trước ảnh">
                                <button type="button" class="btn btn-danger mt-2" id="removeImageBtn" style="display:none;" onclick="removeImage()">Xóa ảnh</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm Chi Tiết</button>
                <a href="{{ route('admin.product_details.index', ['product' => $product->id]) }}" class="btn btn-secondary">Quay lại danh sách chi tiết sản phẩm</a>
            </div>
        </form>
    </div>
@endsection

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            $('#preview').attr('src', reader.result).show();
            $('#removeImageBtn').show();
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function removeImage() {
        $('#preview').hide();
        $('#image').val('');
        $('#removeImageBtn').hide();
    }

    $(document).ready(function () {
        $('#colorSelect').change(function () {
            var selectedColorCode = $(this).find('option:selected').data('code');
            $('#colorInput').val(selectedColorCode);
        });
    });
</script>
