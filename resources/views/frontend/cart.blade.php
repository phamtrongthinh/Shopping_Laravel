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
                <div class="col-12 col-lg-12 col-xl-12 mb-5">

                    <div class="mx-auto px-3 px-lg-4">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">Sản phẩm</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Giá</th>
                                        <th class="column-4">Số lượng</th>
                                        <th class="column-5">Tổng</th>
                                    </tr>

                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="template/images/item-cart-04.jpg" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2">Dâu tây tươi</td>
                                        <td class="column-3">$ 36.00</td>

                                        <td class="column-4">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    name="num-product1" value="1">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="column-5">$ 36.00</td>
                                    </tr>


                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="template/images/item-cart-05.jpg" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2">Áo khoác nhẹ</td>
                                        <td class="column-3">₫ 384,000</td>
                                        <td class="column-4">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    name="num-product2" value="1">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="column-5">₫ 384,000</td>
                                    </tr>
                                    <!-- Dòng hiển thị tổng tiền -->
                                    <tr class="table_row" style="height: 40px;">
                                        <td colspan="5"
                                            style="text-align: right; font-weight: bold; font-size: 14px; padding: 5px 40px;">
                                            Tổng tiền: ₫ 420,000
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                        {{-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                    name="coupon" placeholder="Mã giảm giá">
                        
                                <div
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Áp dụng mã
                                </div>
                            </div>
                        
                            <div
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Cập nhật giỏ hàng
                            </div>
                        </div> --}}

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
                                    <input type="text" id="district" class="form-control"
                                        placeholder="VD: Thanh Trì">
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
@endsection
