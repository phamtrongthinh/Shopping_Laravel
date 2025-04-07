@extends('Admin.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sửa Chi Tiết Sản Phẩm: {{ $product->name }}</h3>
        </div>

        <form action="{{ route('admin.product_details.update', ['product' => $product->id, 'detail' => $detail->id]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Đây là phương thức PUT cho việc cập nhật dữ liệu -->
            <div class="card-body">
                <div class="form-group">
                    <label>Chi Tiết Sản Phẩm</label>
                    <div id="product-details">
                        <div class="row product-detail-item align-items-center mb-2">
                            <!-- Màu -->
                            <div class="col-md-2">
                                <select name="colorselect" class="form-control" id="colorSelect">
                                    <option value="">Chọn màu</option>
                                    @foreach ($colors as $otherColor)
                                        <option value="{{ $otherColor->id }}" data-name="{{ $otherColor->name }}"
                                            data-code="{{ $otherColor->code }}"
                                            @if ($detail->color_id == $otherColor->id) selected @endif>
                                            {{ $otherColor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <input type="color" name="colorInput" id="colorInput" class="form-control"
                                    value="{{ $detail->color ? $detail->color->code : '' }}" readonly>
                            </div>

                            <div class="col-md-2">
                                <select name="size" class="form-control">
                                    <option value="">Chọn kích thước</option>
                                    <option value="S" @if ($detail->size == 'S') selected @endif>S</option>
                                    <option value="M" @if ($detail->size == 'M') selected @endif>M</option>
                                    <option value="L" @if ($detail->size == 'L') selected @endif>L</option>
                                    <option value="XL" @if ($detail->size == 'XL') selected @endif>XL</option>
                                    <option value="XXL" @if ($detail->size == 'XXL') selected @endif>XXL</option>
                                </select>
                            </div>

                            <!-- Số lượng -->
                            <div class="col-md-2">
                                <input type="number" name="quantities" class="form-control" placeholder="Số lượng"
                                    value="{{ old('quantities', $detail->quantities) }}">
                            </div>
                        </div>

                        <!-- Ảnh -->
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group border p-3 rounded">
                                    <label for="image">Ảnh Sản Phẩm</label>
                                    <input type="file" name="image" class="form-control-file" id="image"
                                        accept="image/*" onchange="previewImage(event)">
                                    <br>
                                    @if ($detail->image)
                                        <img id="preview" class="img-thumbnail mt-2" src="{{ asset($detail->image) }}"
                                            style="max-width: 100px;">
                                    @else
                                        <img id="preview" class="img-thumbnail mt-2"
                                            style="display:none; max-width: 100px;" alt="Xem trước ảnh">
                                    @endif
                                    <button type="button" class="btn btn-danger mt-2" id="removeImageBtn"
                                        style="{{ $detail->image ? 'display:inline-block;' : 'display:none;' }}"
                                        onclick="removeImage()">Xóa ảnh</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật Chi Tiết</button>
                <a href="{{ route('admin.product_details.index', ['product' => $product->id]) }}"
                    class="btn btn-secondary">Quay lại danh sách chi tiết sản phẩm</a>
            </div>
        </form>
    </div>
@endsection

<!-- Nhúng jQuery vào trang -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Hàm xem trước ảnh
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.style.display = 'block'; // Hiển thị ảnh
            document.getElementById('removeImageBtn').style.display = 'inline-block'; // Hiển thị nút xóa
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    // Hàm xóa ảnh
    function removeImage() {
        // Xóa hình ảnh đã tải lên
        var preview = document.getElementById('preview');
        preview.style.display = 'none'; // Ẩn ảnh
        document.getElementById('image').value = ''; // Xóa giá trị của input file

        // Ẩn nút xóa
        document.getElementById('removeImageBtn').style.display = 'none';
    }
</script>

<script>
    $(document).ready(function() {
        // Lắng nghe sự kiện thay đổi trong select với ID 'colorSelect'
        $('#colorSelect').change(function() {
            // Lấy giá trị mã màu từ thuộc tính 'data-code' trong option đã chọn
            var selectedColorCode = $(this).find('option:selected').data('code');

            // Gán giá trị mã màu cho ô input color
            $('#colorInput').val(selectedColorCode);
        });
    });
</script>
