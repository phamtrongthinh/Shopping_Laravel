@extends('Admin.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm Chi Tiết Sản Phẩm: {{ $product->name }}</h3>
        </div>

        <form action="{{ route('admin.product_details.store', ['product' => $product->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Chi Tiết Sản Phẩm</label>
                    <div id="product-details">
                        <!-- Các biến thể sản phẩm sẽ được thêm vào đây -->
                        <div class="row product-detail-item align-items-center mb-2">
                            <!-- Màu -->
                            <div class="col-md-2">
                                <select name="colorselect" class="form-control" id="colorSelect" required>
                                    <option value="">Chọn màu</option>
                                    @foreach ($colors as $otherColor)
                                        <option value="{{ $otherColor->code }}" data-name="{{ $otherColor->name }}">
                                            {{ $otherColor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-1">
                                <input type="color" name="colorInput" id="colorInput" class="form-control" value=""
                                    readonly>
                            </div>

                            <div class="col-md-2">
                                <select name="size" class="form-control" required>
                                    <option value="">Chọn kích thước</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>

                            <!-- Số lượng -->
                            <div class="col-md-2">
                                <input type="number" name="quantities" class="form-control" placeholder="Số lượng" required
                                    min="1">
                            </div>
                        </div>

                        <!-- Ảnh (Làm cho ảnh xuống dòng dưới các input khác) -->
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group border p-3 rounded">
                                    <label for="image">Ảnh Sản Phẩm</label>
                                    <input type="file" name="image" class="form-control-file" id="image"
                                        accept="image/*" onchange="previewImage(event)">
                                    <br>
                                    <img id="preview" class="img-thumbnail mt-2" style="display:none; max-width: 100px;"
                                        alt="Xem trước ảnh">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm Chi Tiết</button>
                <a href="{{ route('admin.product_details.index', ['product' => $product->id]) }}"
                    class="btn btn-secondary">Quay lại danh sách chi tiết sản phẩm</a>
            </div>
        </form>
    </div>
@endsection
<!-- Nhúng jQuery vào trang -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
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
<script>
    $(document).ready(function() {
        // Lắng nghe sự kiện thay đổi trong select với ID 'colorSelect'
        $('#colorSelect').change(function() {
            // Lấy giá trị mã màu đã chọn từ 'select'
            var selectedColorCode = $(this).val();

            // Gán giá trị mã màu cho ô input color
            $('#colorInput').val(selectedColorCode);
        });
    });
</script>
