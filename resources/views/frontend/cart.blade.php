@extends('frontend.partial.main')
@section('content')
    {{-- bread crumb --}}
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Giỏ hàng
            </span>
        </div>
    </div>
    {{-- shoping cart --}}
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 mb-5">
                    <div class="mx-auto px-3 px-lg-4">
                        <div class="wrap-table-shopping-cart">
                            <table class="table table-bordered text-center align-middle" style="width: 100%;">
                                <thead style="background-color: white; color: black; font-weight: bold;">
                                    <tr>
                                        <th style="width: 25%; text-align: center;">Sản phẩm</th>
                                        <th style="width: 15%; text-align: center;">Tên</th>
                                        <th style="width: 10%; text-align: center;">Màu sắc</th>
                                        <th style="width: 10%; text-align: center;">Kích thước</th>
                                        <th style="width: 15%; text-align: center;">Giá</th>
                                        <th style="width: 15%; text-align: center;">Số lượng</th>
                                        <th style="width: 10%; text-align: center;">Tổng</th>
                                        <th style="width: 10%; text-align: center;">Xóa</th>
                                    </tr>
                                </thead>
            
                                <tbody>
                                    <!-- Sản phẩm 1 -->
                                    <tr>
                                        <td style="vertical-align:middle">
                                            <img src="template/images/item-cart-04.jpg" alt="IMG"
                                                style="width: 120px; height: 150px; object-fit: cover; border-radius: 8px;">
                                        </td>
                                        <td style="vertical-align:middle">Dâu tây tươi</td>
                                        <td style="vertical-align:middle"><span class="badge bg-danger">Đỏ</span></td>
                                        <td style="vertical-align:middle">-</td>
                                        <td style="vertical-align:middle">₫870,000</td>
                                        <td style="vertical-align:middle">
                                            <div class="wrap-num-product flex-w justify-content-center">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>
            
                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    name="num-product" value="1">
            
                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="vertical-align:middle">₫870,000</td>
                                        <td style="vertical-align:middle">
                                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(event)">
                                                <i class="fa fa-trash"></i> Xóa
                                            </button>
                                        </td>
                                    </tr>
            
                                    <!-- Sản phẩm 2 -->
                                    <tr>
                                        <td style="vertical-align:middle">
                                            <img src="template/images/item-cart-05.jpg" alt="IMG"
                                                style="width: 120px; height: 150px; object-fit: cover; border-radius: 8px;">
                                        </td>
                                        <td style="vertical-align:middle">Áo khoác nhẹ</td>
                                        <td style="vertical-align:middle"><span class="badge bg-secondary">Xám</span></td>
                                        <td style="vertical-align:middle">M</td>
                                        <td style="vertical-align:middle">₫384,000</td>
                                        <td style="vertical-align:middle">
                                            <div class="wrap-num-product flex-w justify-content-center">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>
            
                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    name="num-product" value="1">
            
                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="vertical-align:middle">₫384,000</td>
                                        <td style="vertical-align:middle">
                                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(event)">
                                                <i class="fa fa-trash"></i> Xóa
                                            </button>
                                        </td>
                                    </tr>
            
                                    <!-- Tổng tiền -->
                                    <tr>
                                        <td colspan="7" class="text-end" style="padding-right: 30px;">
                                            <span style="font-size: 18px; font-weight: bold;">Tổng tiền: 1,254,000đ</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-xl-12 mb-5" style="padding: 34px;">
                    <div class="bor10 px-3 px-lg-4 pt-4 pb-5 mx-auto">
                        <h4 class="mtext-109 cl2 pb-3">
                            Thông tin người đặt hàng
                        </h4>

                        <form>
                            <div class="mb-3">
                                <label class="stext-110 cl2" for="fullname">Họ và tên</label>
                                <input type="text" id="fullname" class="form-control" placeholder="Nhập họ và tên">
                            </div>

                            <div class="mb-3">
                                <label class="stext-110 cl2" for="phone">Số điện thoại</label>
                                <input type="text" id="phone" class="form-control" placeholder="Nhập số điện thoại">
                            </div>

                            <div class="mb-3">
                                <label class="stext-110 cl2" for="email">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="Nhập email (nếu có)">
                            </div>

                            <div class="mb-3">
                                <label class="stext-110 cl2" for="address">Địa chỉ giao hàng</label>
                                <textarea id="address" class="form-control" rows="3" placeholder="Nhập địa chỉ giao hàng"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="stext-110 cl2" for="province">Tỉnh / Thành phố</label>
                                    <input type="text" id="province" class="form-control" placeholder="VD: Hà Nội">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="stext-110 cl2" for="district">Quận / Huyện</label>
                                    <input type="text" id="district" class="form-control" placeholder="VD: Thanh Trì">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="stext-110 cl2" for="note">Ghi chú (nếu có)</label>
                                <textarea id="note" class="form-control" rows="2" placeholder="VD: Giao trong giờ hành chính"></textarea>
                            </div>

                            <button type="submit"
                                class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer w-100">
                                Tiến hành đặt hàng
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Hàm xác nhận xóa sản phẩm
        function confirmDelete(event) {
            // Hiển thị hộp thoại xác nhận
            var confirmation = confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
            
            // Nếu người dùng nhấn "OK", tiến hành xóa sản phẩm
            if (!confirmation) {
                // Ngừng hành động xóa nếu người dùng chọn "Cancel"
                event.preventDefault();
            }
        }
    </script>
@endsection
