@extends('frontend.partial.main')
<style>
    .custom-qty-up,
    .custom-qty-down {
        width: 45px;
        height: 100%;
        cursor: pointer;
    }

    .btn-order:hover {
        background-color: #5a4bcf !important;
        text-decoration: none;
    }

    .modal-content {

        /* margin-top: 80px; */

    }

    .form-control,
    .form-select {
        height: 45px;
        /* Chiều cao đồng đều */
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        /* Kích thước chữ */
        line-height: 1.5;
        color: #333;
        /* Màu chữ đậm dễ nhìn */
        width: 100%;
        /* Đảm bảo chiếm toàn bộ chiều ngang ô */
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        background-color: #fff;
    }


    @media (min-width: 1200px) {
        .custom-modal {
            max-width: 60% !important;
            /* hoặc dùng 1400px nếu muốn cố định */
            margin-top: 200px;

        }

    }
</style>

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
    <div class="bg0 p-t-75 p-b-85"> <!-- ĐÚNG -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 mb-5">
                    <div class="mx-auto px-3 px-lg-4">
                        <div class="wrap-table-shopping-cart">
                            <table class="table table-bordered text-center align-middle" style="width: 100%;">
                                <thead style="background-color: white; color: black; font-weight: bold;">
                                    <tr>
                                        <th style="width: 20%; text-align: center;">Sản phẩm</th>
                                        <th style="width: 15%; text-align: center;">Tên</th>
                                        <th style="width: 10%; text-align: center;">Màu sắc</th>
                                        <th style="width: 12%; text-align: center;">Kích thước</th>
                                        <th style="width: 15%; text-align: center;">Giá</th>
                                        <th style="width: 15%; text-align: center;">Số lượng</th>
                                        <th style="width: 10%; text-align: center;">Tổng</th>
                                        <th style="width: 10%; text-align: center;">Xóa</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($cartItems->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center" style="padding: 50px;">
                                                <span class="stext-109 cl4" style="font-size: 18px; font-weight: bold;">
                                                    Giỏ hàng của bạn hiện tại chưa có sản phẩm nào.
                                                </span>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($cartItems as $item)
                                            {{-- @dd($item->id) --}}
                                            <tr>
                                                <td style="vertical-align:middle">
                                                    <img src="{{ $item->productDetail->image }}" alt="IMG"
                                                        style="width: 120px; height: 150px; object-fit: cover; border-radius: 8px;">
                                                </td>
                                                <td style="vertical-align:middle">{{ $item->product_name }}</td>
                                                <td style="vertical-align:middle">{{ $item->color_name ?? 'Không có' }}
                                                </td>

                                                <td style="vertical-align:middle">{{ $item->size }}</td>
                                                <td style="vertical-align:middle">{{ number_format($item->price) }}₫
                                                </td>
                                                <td style="vertical-align:middle">
                                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                        <div class="custom-qty-down cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>

                                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                            name="num-product" value="{{ $item->quantity }}"
                                                            data-item-id="{{ $item->id }}">

                                                        <div class="custom-qty-up cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="item-total" data-id="{{ $item->id }}"
                                                    style="vertical-align:middle">
                                                    {{ number_format($item->price * $item->quantity) }}₫
                                                </td>

                                                <td style="vertical-align:middle">
                                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST"
                                                        onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i> Xóa
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif

                                    <!-- Tổng tiền -->
                                    <tr>
                                        <td colspan="8">
                                            <div class="d-flex flex-column align-items-end pe-4">
                                                <div class="mb-2">
                                                    <strong style="font-size: 18px;">
                                                        Tổng tiền:
                                                        <span id="cart-total">
                                                            {{ number_format(
                                                                $cartItems->sum(function ($item) {
                                                                    return $item->price * $item->quantity;
                                                                }),
                                                            ) }}₫
                                                        </span>
                                                    </strong>
                                                </div>
                                                @if (count($cartItems) > 0)
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#cartSummaryModal"
                                                        class="btn-order d-flex align-items-center justify-content-center px-4 py-2 rounded gap-2"
                                                        style="font-size: 16px; background-color: #7066e0; color: white; min-width: 160px; transition: 0.3s; ">

                                                        <span>Đặt hàng</span>
                                                    </a>
                                                @endif


                                            </div>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="cartSummaryModal" tabindex="-1" aria-labelledby="cartSummaryLabel">
        <div class="modal-dialog modal-xl custom-modal modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-white" style="background-color: rgb(113, 127, 224) !important;">
                    <h5 class="modal-title" id="cartSummaryLabel">Xác nhận đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th style="text-align: center">Ảnh</th>
                                <th style="text-align: center">Tên</th>
                                <th style="text-align: center">Màu</th>
                                <th style="text-align: center">Size</th>
                                <th style="text-align: center">Giá</th>
                                <th style="text-align: center">Số lượng</th>
                                <th style="text-align: center">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td><img src="{{ $item->productDetail->image }}" width="80" height="100"
                                            style="object-fit: cover;"></td>
                                    <td>
                                        @if ($item->product_name !== $item->product->name)
                                            <span class="text-warning"
                                                title="Tên đã thay đổi">{{ $item->product_name }}<br>
                                                <i>(Cập nhật: {{ $item->product->name }})</i></span>
                                        @else
                                            {{ $item->product_name }}
                                        @endif
                                    </td>
                                    @php
                                        $isColorValid = in_array($item->color_name, $colorNames);
                                    @endphp <td>
                                        @if (!$isColorValid)
                                            <span class="text-danger"
                                                title="Mã màu không còn tồn tại">{{ $item->color_name }}
                                                <br> <i>(Mã màu này ko còn tồn tại )</i>
                                            </span>
                                        @else
                                            {{ $item->color_name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->size !== $item->productDetail->size)
                                            <span class="text-warning"
                                                title="Size này không còn tồn tại">{{ $item->size }}
                                                <br> <i>(Cập nhật: {{ $item->productDetail->size }})</i>
                                            </span>
                                        @else
                                            {{ $item->size }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->price !== $item->productDetail->price)
                                            <span class="text-warning"
                                                title="Gía này không còn tồn tại">{{ number_format($item->price) }}₫
                                                <br> <i>(Cập nhật: {{ number_format($item->productDetail->price) }}₫)</i>
                                            </span>
                                        @else
                                            {{ $item->price }}
                                        @endif
                                    </td>


                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->price * $item->quantity) }}₫</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center mt-3">
                        <strong>Tổng cộng:
                            <span
                                class="text-danger">{{ number_format($cartItems->sum(fn($item) => $item->price * $item->quantity)) }}₫</span>
                        </strong>
                    </div>

                    <hr>

                    <!-- Form for Order Info -->
                    <div class="row justify-content-center">
                        <div class="col-12 mb-4">
                            <div class="container mt-5">
                                <div class="col-12 col-lg-12 mb-4">
                                    <form action="{{ route('orders.store') }}" data-url="{{ route('orders.store') }}"
                                        data-ajax="submit03" data-target="alert" data-href="#modalAjax"
                                        data-content="#content" data-method="post" method="POST" name="frm"
                                        id="frm">
                                        <input type="hidden" name="title" value="THÔNG TIN LIÊN HỆ">
                                        <input type="hidden" name="robot_check" value="" id="robot_check">
                                        @csrf
                                        <h4 class="mb-4 text-center">Thông tin người đặt hàng</h4>
                                        <!-- Name & Phone -->

                                        <!-- Full Name -->
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="fullname" class="form-label">Họ và tên</label>
                                                <input type="text" id="fullname" name="fullname"
                                                    class="form-control" placeholder="Nhập họ và tên"
                                                    value="{{ old('name', Auth::user()->name) }}" autofocus>
                                            </div>

                                            <!-- Phone -->
                                            <div class="col-md-4 mb-3">
                                                <label for="phone" class="form-label">Số điện thoại</label>
                                                <input type="text" id="phone" name="phone" class="form-control"
                                                    placeholder="Nhập số điện thoại"
                                                    value="{{ old('phone', Auth::user()->phone) }}">
                                            </div>

                                            <!-- Email -->
                                            <div class="col-md-4 mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Nhập email (nếu có)"
                                                    value="{{ old('email', Auth::user()->email) }}">
                                            </div>
                                        </div>

                                        <!-- Address -->
                                        <div class="row">
                                            <!-- Province -->
                                            <div class="col-md-4 mb-3">
                                                <label for="province" class="form-label">Tỉnh / Thành phố</label>
                                                <select id="province" name="province" class="form-select">
                                                    <option value="">-- Chọn tỉnh / thành phố --</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}"
                                                            {{ old('province', Auth::user()->province) == $province->id ? 'selected' : '' }}>
                                                            {{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- District -->
                                            <div class="col-md-4 mb-3">
                                                <label for="district" class="form-label">Quận / Huyện</label>
                                                <select id="district" name="district" class="form-select">
                                                    <option value="">-- Chọn quận / huyện --</option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}"
                                                            {{ old('district', Auth::user()->district) == $district->id ? 'selected' : '' }}>
                                                            {{ $district->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Ward -->
                                            <div class="col-md-4 mb-3">
                                                <label for="ward" class="form-label">Xã / Phường</label>
                                                <select id="ward" name="ward" class="form-select">
                                                    <option value="">-- Chọn xã / phường --</option>
                                                    @foreach ($wards as $ward)
                                                        <option value="{{ $ward->id }}"
                                                            {{ old('ward', Auth::user()->ward) == $ward->id ? 'selected' : '' }}>
                                                            {{ $ward->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Detailed Address -->
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Địa chỉ giao hàng</label>
                                            <input type="text" id="address" name="address" class="form-control"
                                                placeholder="Nhập địa chỉ giao hàng"
                                                value="{{ old('address', Auth::user()->address) }}">
                                        </div>

                                        <!-- Note -->
                                        <div class="mb-3">
                                            <label for="note" class="form-label">Ghi chú (nếu có)</label>
                                            <textarea id="note" name="note" class="form-control" rows="3"
                                                placeholder="VD: Giao trong giờ hành chính"></textarea>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="text-center">
                                            <!-- Nút submit -->
                                            <button type="submit"
                                                class="flex-c-m stext-101 cl0 size-111 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer w-100">
                                                Tiến hành đặt hàng
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Popper.js (Bootstrap dependency) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Thêm jQuery vào đầu trang (hoặc trước đoạn script của bạn) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //cap nhap so luong san pham va tong tien
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('.num-product');

            // Khi số lượng thay đổi, gửi AJAX
            quantityInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const itemId = this.dataset.itemId;
                    const newQuantity = this.value;

                    fetch(`/cart/update/${itemId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: new URLSearchParams({
                                quantity: newQuantity
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Cập nhật giỏ hàng thành công!');
                                // Cập nhật giao diện nếu muốn
                                updateTotal?.(data.total);
                                updateItemTotal?.(itemId, data.itemTotal);
                            } else {
                                console.error('Lỗi khi cập nhật:', data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi mạng:', error);
                        });
                });
            });

            // Nút tăng số lượng
            document.querySelectorAll('.custom-qty-up').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('.num-product');
                    input.value = parseInt(input.value) + 1;
                    input.dispatchEvent(new Event('change'));
                });
            });

            // Nút giảm số lượng
            document.querySelectorAll('.custom-qty-down').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('.num-product');
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                        input.dispatchEvent(new Event('change'));
                    }
                });
            });
            // Cập nhật tổng tiền của từng sản phẩm
            function updateItemTotal(itemId, itemTotal) {
                const itemTotalCell = document.querySelector(`.item-total[data-id="${itemId}"]`);
                if (itemTotalCell) {
                    itemTotalCell.textContent = formatCurrency(itemTotal);
                }
            }

            // Cập nhật tổng tiền của toàn bộ giỏ hàng
            function updateTotal(total) {
                const totalElement = document.getElementById('cart-total');
                if (totalElement) {
                    totalElement.textContent = formatCurrency(total);
                }
            }

            // Hàm định dạng tiền tệ kiểu Việt Nam
            function formatCurrency(number) {
                return new Intl.NumberFormat('vi-VN').format(number) + '₫';
            }
        });
    </script>

    <script>
        // Lắng nghe sự kiện thay đổi tỉnh thành phố
        $('#province').on('change', function() {
            var provinceId = $(this).val();
            $('#district').html('<option value="">-- Đang tải --</option>');
            $('#ward').html('<option value="">-- Chọn xã / phường --</option>');

            if (provinceId) {
                $.get('/get-districts/' + provinceId, function(data) {
                    let html = '<option value="">-- Chọn quận / huyện --</option>';
                    data.forEach(function(d) {
                        html += `<option value="${d.id}">${d.name}</option>`;
                    });
                    $('#district').html(html);
                });
            }
        });

        $('#district').on('change', function() {
            var districtId = $(this).val();
            $('#ward').html('<option value="">-- Đang tải --</option>');

            if (districtId) {
                $.get('/get-wards/' + districtId, function(data) {
                    let html = '<option value="">-- Chọn xã / phường --</option>';
                    data.forEach(function(w) {
                        html += `<option value="${w.id}">${w.name}</option>`;
                    });
                    $('#ward').html(html);
                });
            }
        });
    </script>
    <!-- jQuery CDN (phiên bản mới và phổ biến) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        //check validate form
        $(document).on('submit', "[data-ajax='submit03']", function(event) {
            event.preventDefault();
            let myThis = $(this);
            let formValues = myThis.serialize();
            let dataInput = myThis.data();

            // Lấy giá trị các input
            let nameVal = myThis.find('[name="fullname"]').val().trim();
            let emailVal = myThis.find('[name="email"]').val().trim();
            let phoneVal = myThis.find('[name="phone"]').val().trim();
            let provinceVal = myThis.find('[name="province"]').val().trim();
            let districtVal = myThis.find('[name="district"]').val().trim();
            let wardVal = myThis.find('[name="ward"]').val().trim();
            let addressVal = myThis.find('[name="address"]').val().trim();
            let robotCheckVal = myThis.find('[name="robot_check"]').val().trim();

            // Regex kiểm tra
            let isEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            let isPhone = /^(0[2-9]{1}[0-9]{8,9})$/;

            if (robotCheckVal !== '') {
                Swal.fire({
                    icon: 'error',
                    title: "Yêu cầu không hợp lệ!",
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }

            // Validate form
            if (nameVal === '') {
                return showError('Vui lòng nhập họ tên!');
            }

            // if (emailVal === '') {
            //     return showError('Vui lòng nhập email!');
            // } else if (!isEmail.test(emailVal)) {
            //     return showError('Email không hợp lệ!');
            // }

            if (phoneVal === '') {
                return showError('Vui lòng nhập số điện thoại!');
            } else if (!isPhone.test(phoneVal)) {
                return showError('Số điện thoại không hợp lệ!');
            }

            if (provinceVal === '') {
                return showError('Vui lòng chọn Tỉnh / Thành phố!');
            }

            if (districtVal === '') {
                return showError('Vui lòng chọn Quận / Huyện!');
            }

            if (wardVal === '') {
                return showError('Vui lòng chọn Xã / Phường!');
            }

            if (addressVal === '') {
                return showError('Vui lòng nhập địa chỉ cụ thể!');
            }

            // Gửi ajax
            $.ajax({
                type: dataInput.method,
                url: dataInput.url,
                data: formValues,
                dataType: "json",


                success: function(response) {
                    if (response.code == 200) {
                        myThis.find('input:not([type="hidden"]), textarea').val('');

                        if (dataInput.content) {
                            $(dataInput.content).html(response.html);
                        }

                        // ✅ Chuyển hướng, thông báo sẽ hiển thị ở trang đích
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    } else {
                        showError(response.html);
                    }
                },

                error: function() {
                    showError('Gửi thông tin thất bại');
                }
            });

            return false;
            console.log('Sending ajax POST to:', dataInput.url);
            console.log('Form values:', formValues);

            // Hàm hiển thị lỗi
            function showError(message) {
                Swal.fire({
                    icon: 'error',
                    title: message,
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }
        });
    </script>

@endsection
