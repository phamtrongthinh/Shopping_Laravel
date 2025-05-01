@extends('frontend.partial.main')
<style>
    .custom-qty-up,
    .custom-qty-down {
        width: 45px;
        height: 100%;
        cursor: pointer;
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
                                                <td style="vertical-align:middle">{{ $item->product->name }}</td>
                                                <td style="vertical-align:middle">{{ $item->color->name ?? 'Không có' }}
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
                                            <div class="d-flex justify-content-end w-100 pe-4 pr-2">
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
                        <form data-ajax="submit03" data-target="alert" data-href="#modalAjax" data-content="#content"
                            data-method="POST" method="POST" name="frm" id="frm">
                            <input type="hidden" name="title" value="THÔNG TIN ĐẶT HÀNG" id="title">
                            <input type="hidden" name="robot_check" value="" id="robot_check">
                            @csrf
                            <!-- Thông tin người đặt hàng -->
                            <div class="mb-4">
                                <h4 class="mtext-109 cl2 pb-3">Thông tin người đặt hàng</h4>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="stext-110 cl2" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Nhập email (nếu có)" value="{{ old('email', $user->email ?? '') }}">
                            </div>

                            <div class="row">
                                <!-- Họ và tên -->
                                <div class="col-md-6 mb-3">
                                    <label class="stext-110 cl2" for="fullname">Họ và tên</label>
                                    <input type="text" id="fullname" name="fullname" class="form-control"
                                        placeholder="Nhập họ và tên" value="{{ old('name', $user->name ?? '') }}">
                                </div>

                                <!-- Số điện thoại -->
                                <div class="col-md-6 mb-3">
                                    <label class="stext-110 cl2" for="phone">Số điện thoại</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        placeholder="Nhập số điện thoại" value="{{ old('phone', $user->phone ?? '') }}">
                                </div>
                            </div>



                            <div class="row">
                                <!-- Tỉnh / Thành phố -->
                                <div class="col-md-6 mb-3">
                                    <label class="stext-110 cl2" for="province">Tỉnh / Thành phố</label>
                                    <!-- Tỉnh / Thành phố -->
                                    <select id="province" name="province_id" class="form-control">
                                        <option value="">-- Chọn tỉnh / thành phố --</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Quận / Huyện -->
                                <div class="col-md-6 mb-3">
                                    <label class="stext-110 cl2" for="district">Quận / Huyện</label>
                                    <select id="district" name="district_code" class="form-control">
                                        <option value="">-- Chọn quận / huyện --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Xã / Phường -->
                                <div class="col-md-6 mb-3">
                                    <label class="stext-110 cl2" for="ward">Xã / Phường</label>
                                    <select id="ward" name="ward_code" class="form-control">
                                        <option value="">-- Chọn xã / phường --</option>
                                    </select>
                                </div>

                                <!-- Thị trấn -->
                                <div class="col-md-6 mb-3">
                                    <label class="stext-110 cl2" for="address">Địa chỉ giao hàng</label>
                                    <input type="text" id="detail_address" name="address" class="form-control"
                                        placeholder="Nhập địa chỉ giao hàng"
                                        value="{{ old('address', $user->address ?? '') }}">
                                </div>
                            </div>

                            <!-- Ghi chú -->
                            <div class="mb-4">
                                <label class="stext-110 cl2" for="note">Ghi chú (nếu có)</label>
                                <textarea id="note" class="form-control" rows="2" placeholder="VD: Giao trong giờ hành chính"></textarea>
                            </div>

                            <!-- Nút submit -->
                            <button type="submit"
                                class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer w-100">
                                Tiến hành đặt hàng
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Thêm jQuery vào đầu trang (hoặc trước đoạn script của bạn) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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
                        html += `<option value="${w.code}">${w.name}</option>`;
                    });
                    $('#ward').html(html);
                });
            }
        });
    </script>
    <!-- jQuery CDN (phiên bản mới và phổ biến) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).on('submit', "[data-ajax='submit03']", function(event) {
            event.preventDefault();
            let myThis = $(this);
            let formValues = myThis.serialize();
            let dataInput = myThis.data();

            // Lấy giá trị các input
            let nameVal = myThis.find('[name="fullname"]').val().trim();
            let emailVal = myThis.find('[name="email"]').val().trim();
            let phoneVal = myThis.find('[name="phone"]').val().trim();
            let provinceVal = myThis.find('[name="province_id"]').val().trim();
            let districtVal = myThis.find('[name="district_code"]').val().trim();
            let wardVal = myThis.find('[name="ward_code"]').val().trim();
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

                        if (dataInput.target === 'modal') {
                            $(dataInput.href).modal();
                        } else if (dataInput.target === 'alert') {
                            Swal.fire({
                                icon: 'success',
                                title: response.html,
                                showConfirmButton: false,
                                timer: 1500
                            });
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
