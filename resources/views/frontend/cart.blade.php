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
                <div class="col-12 col-lg-12 col-xl-10 mb-5">

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
                <div class="col-12 col-lg-10 col-xl-8 mb-5">
                    <div class="bor10 px-3 px-lg-4 pt-4 pb-5 mx-auto">
                        <h4 class="mtext-109 cl2 pb-3">
                            Tổng giỏ hàng
                        </h4>
            
                        <div class="flex-w flex-t bor12 pb-3">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Tổng phụ:
                                </span>
                            </div>
            
                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    $79.65
                                </span>
                            </div>
                        </div>
            
                        <div class="flex-w flex-t bor12 pt-3 pb-4">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Phí vận chuyển:
                                </span>
                            </div>
            
                            <div class="size-209 pr-lg-4 w-full-ssm">
                                <p class="stext-111 cl6 pt-2">
                                    Hiện tại không có phương thức vận chuyển nào. Vui lòng kiểm tra lại địa chỉ của bạn, hoặc liên hệ với chúng tôi nếu cần hỗ trợ.
                                </p>
            
                                <div class="pt-3">
                                    <span class="stext-112 cl8">
                                        Tính phí vận chuyển
                                    </span>
            
                                    <div class="rs1-select2 rs2-select2 bor8 bg0 mb-3 mt-2">
                                        <select class="js-select2" name="country">
                                            <option>Chọn quốc gia...</option>
                                            <option>USA</option>
                                            <option>UK</option>
                                        </select>
                                    </div>
            
                                    <div class="bor8 bg0 mb-3">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Tỉnh / quốc gia">
                                    </div>
            
                                    <div class="bor8 bg0 mb-3">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Mã bưu điện / Zip">
                                    </div>
            
                                    <div class="flex-w">
                                        <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                            Cập nhật tổng
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class="flex-w flex-t pt-3 pb-4">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Tổng cộng:
                                </span>
                            </div>
            
                            <div class="size-209 pt-1">
                                <span class="mtext-110 cl2">
                                    $79.65
                                </span>
                            </div>
                        </div>
            
                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Tiến hành thanh toán
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </form>
@endsection
