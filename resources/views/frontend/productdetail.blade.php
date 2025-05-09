<!-- jQuery (nên để trước plugin) -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

{{-- 
<!-- Magnific Popup JS -->
<script src="../template/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<style>
    /* Đảm bảo các ảnh đều nhau */
    .slick3 .item-slick3 {
        width: 100%;
        /* Chiều rộng của từng item chiếm 100% */
        height: 600px;
        /* Đặt chiều cao cố định cho mỗi ảnh */
        overflow: hidden;
        /* Đảm bảo ảnh không bị tràn ra ngoài */
        display: flex;
        justify-content: center;
        /* Căn giữa ảnh theo chiều ngang */
        align-items: center;
        /* Căn giữa ảnh theo chiều dọc */
    }

    /* Căn chỉnh ảnh trong wrap-pic-w */
    .slick3 .wrap-pic-w {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        /* Căn giữa ảnh trong vùng chứa */
        align-items: center;
    }

    /* Đảm bảo ảnh không bị méo và phủ kín phần chứa */
    .slick3 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Đảm bảo ảnh phủ toàn bộ mà không bị biến dạng */
    }



    .select-color,
    .select-size {
        width: 100%;
        padding: 10px 15px;
        border: 2px solid #ccc;
        border-radius: 0;
        /* Không bo góc */
        background-color: #fff;
        font-size: 16px;
        color: #333;
        appearance: none;
        /* Ẩn mũi tên mặc định */
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2210%22%20height%3D%225%22%20viewBox%3D%220%200%2010%205%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cpath%20d%3D%22M0%200l5%205%205-5z%22%20fill%3D%22%23333%22/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 12px;
        cursor: pointer;
        transition: border-color 0.3s ease;
    }

    .select-color:focus,
    .select-size:focus {
        border-color: #7f56d9;
        outline: none;
    }

    .select-color option,
    .select-size option {
        font-weight: normal;
    }
</style>

@extends('frontend.partial.main')
@section('content')
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/san-pham" class="stext-109 cl8 hov-cl1 trans-04">
                {{ $product->category->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                {{ $product->name }}
            </span>
        </div>
    </div>
    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                @if (!empty($imagesByColor))
                                    @foreach ($imagesByColor as $color => $image)
                                        <div class="item-slick3" data-thumb="{{ asset($image) }}">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{ asset($image) }}" alt="IMG-PRODUCT">
                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="{{ asset($image) }}">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>

                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert mt-3 text-center" style="background-color:#717fe0; color: white;">
                                        <strong>Chưa cập nhật ảnh sản phẩm.</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 id="productName" class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product->name }}
                        </h4>

                        <span class="mtext-106 cl2" id="productPrice">
                            {{ $product->price_range }}
                        </span>

                        <!-- Thêm ở đâu đó, hoặc đưa sẵn product_id vào JS ( lưu product_id vào HTML,)-->
                        <input type="hidden" id="productId" value="{{ $product->id }}">


                        {{-- <p class="stext-102 cl3 p-t-23">
                            {{ $product->description }}
                        </p> --}}

                        <!--  -->
                        <div class="p-t-33">

                            <!-- Thông báo chưa chọn màu -->
                            <div class="flex-w flex-r-m p-b-10" id="colorWarning" style="color: red; display: none;">Vui
                                lòng chọn màu sắc trước khi chọn
                                kích thước!</div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Color
                                </div>
                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="select-color" name="color" id="colorSelect">
                                            <option value="">Lựa chọn màu sắc</option>
                                            @foreach ($colornameids as $colornameid)
                                                <option value="{{ $colornameid['id'] }}"> {{ $colornameid['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Size
                                </div>
                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="select-size" name="size" id="sizeSelect" disabled>
                                            <option value="">Lựa chọn kích thước</option>
                                            <!-- Các size sẽ được điền qua AJAX -->
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Thông báo yêu cầu chọn màu sắc trước -->
                            <div
                                style="margin: 10px 0px; margin-left: 70px; font-size: 14px;  font-family: 'Roboto', 'Segoe UI', 'Arial', 'Tahoma', sans-serif;">
                                <p><strong>Vui lòng chọn màu sắc trước khi chọn kích thước.</strong></p>
                            </div>


                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="num-product" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>

                                    <button
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Thêm vào giỏ hàng
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>


            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6" style="text-align: center">
                                    {{ $product->description }}
                                </p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </section>

    <script>
        // Lắng nghe sự kiện thay đổi màu sắc
        $('#colorSelect').change(function() {
            var colorId = $(this).val(); // Lấy id màu sắc đã chọn

            // Kiểm tra nếu đã chọn màu sắc
            if (colorId) {
                // Kích hoạt dropdown size nếu đã chọn màu
                $('#sizeSelect').prop('disabled', false);
                $('#colorWarning').hide(); // Ẩn thông báo

                // Gửi yêu cầu AJAX để lấy các kích thước của màu sắc đã chọn
                $.ajax({
                    url: '{{ route('getSizesByColor') }}', // Đảm bảo đường dẫn đúng
                    method: 'GET',
                    data: {
                        color_id: colorId,
                        product_id: '{{ $product->id }}' // ID sản phẩm
                    },
                    success: function(sizes) {
                        // Xóa các kích thước hiện có trong select size
                        $('#sizeSelect').empty();
                        $('#sizeSelect').append('<option value="">Lựa chọn kích thước</option>');

                        // Thêm các size vào dropdown
                        sizes.forEach(function(size) {
                            $('#sizeSelect').append('<option value="' + size + '">' + size +
                                '</option>');
                        });
                    }
                });
            } else {
                // Nếu chưa chọn màu, tắt dropdown size và hiển thị thông báo
                $('#sizeSelect').prop('disabled', true);
                $('#sizeSelect').empty();
                $('#sizeSelect').append('<option value="">Lựa chọn kích thước</option>');

                // Hiển thị thông báo yêu cầu chọn màu
                $('#colorWarning').show();
            }
        });

        // Kiểm tra nếu người dùng cố gắng click vào dropdown size mà chưa chọn màu
        $('#sizeSelect').click(function() {
            if ($('#colorSelect').val() == '') {
                $('#colorWarning').show(); // Hiển thị thông báo nếu chưa chọn màu
            }
        });
    </script>


    <!-- jQuery (bắt buộc) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JS của Slick -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            const productId = $('#productId').val(); // Lấy id động thay vì fix cứng

            $('#colorSelect').on('change', function() {
                const colorId = $(this).val();

                if (colorId) {
                    $('#sizeSelect').prop('disabled', false);
                    $('#colorWarning').hide();

                    // AJAX lấy size
                    $.ajax({
                        url: '/get-sizes-by-color',
                        type: 'GET',
                        data: {
                            color_id: colorId,
                            product_id: productId
                        },
                        success: function(sizes) {
                            const sizeSelect = $('#sizeSelect');
                            sizeSelect.empty().append(
                                '<option value="">Lựa chọn kích thước</option>');
                            sizes.forEach(function(size) {
                                sizeSelect.append(
                                    `<option value="${size}">${size}</option>`);
                            });
                        }
                    });

                    // AJAX lấy ảnh theo màu
                    $.ajax({
                        url: '/get-image-by-color',
                        type: 'GET',
                        data: {
                            color_id: colorId,
                            product_id: productId
                        },
                        success: function(response) {
                            const gallery = $('.slick3.gallery-lb');

                            if (gallery.hasClass('slick-initialized')) {
                                gallery.slick('unslick');
                            }

                            gallery.empty();

                            // Thêm ảnh mới
                            response.images.forEach(image => {
                                gallery.append(`
                                <div class="item-slick3" data-thumb="${image}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="${image}" alt="IMG-PRODUCT">
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="${image}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                            `);
                            });

                            // Khởi tạo lại slick sau khi thêm ảnh
                            gallery.slick({
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                fade: true,
                                dots: true,
                                arrows: true,
                                appendDots: $('.wrap-slick3-dots'),
                                appendArrows: $('.wrap-slick3-arrows'),
                            });
                        }
                    });

                } else {
                    $('#sizeSelect').prop('disabled', true).empty().append(
                        '<option value="">Lựa chọn kích thước</option>');
                    $('#colorWarning').show();
                }
            });

            $('#sizeSelect').click(function() {
                if ($('#colorSelect').val() === '') {
                    $('#colorWarning').show();
                }
            });
        });
    </script>




    <script>
        //lay gia tien cua chi tiet san pham 
        document.addEventListener('DOMContentLoaded', function() {
            const colorSelect = document.getElementById('colorSelect');
            const sizeSelect = document.getElementById('sizeSelect');
            const productId = document.getElementById('productId').value;
            const priceDisplay = document.getElementById('productPrice');

            function fetchPrice() {
                const colorId = colorSelect.value;
                const sizeId = sizeSelect.value;

                if (colorId && sizeId) {
                    fetch(`/get-price?product_id=${productId}&color_id=${colorId}&size_id=${sizeId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.price) {
                                priceDisplay.textContent = data.price.toLocaleString('vi-VN', {
                                    style: 'currency',
                                    currency: 'VND'
                                });
                            } else {
                                priceDisplay.textContent = 'Không xác định';
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi khi lấy giá:', error);
                            priceDisplay.textContent = 'Lỗi';
                        });
                }
            }

            colorSelect.addEventListener('change', function() {
                sizeSelect.disabled = !this.value;
                fetchPrice();
            });

            sizeSelect.addEventListener('change', fetchPrice);
        });
    </script>

@endsection
