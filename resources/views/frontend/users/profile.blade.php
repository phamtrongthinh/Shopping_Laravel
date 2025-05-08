<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Thông tin cá nhân</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('template/css/login.css') }}">
</head>

<style>
    .row.mb-3 {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }

    .row.mb-3 .col-md-4 {
        flex: 1;
        min-width: 100%;
    }

    @media (min-width: 768px) {
        .row.mb-3 .col-md-4 {
            min-width: 30%;
        }
    }

    .form-label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    .form-select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 15px;
    }
</style>

<body>
    <header class="header desktop-header">
        <a href="/" class="brand">
            <img src="{{ asset('image/logo_fashion.png') }}" alt="FashionShop Logo" class="logo" />
            <div class="brand-text">
                <span class="brand-name">YaM Fashion</span>
                <span class="brand-slogan">Vẻ đẹp từ phong cách</span>
            </div>
        </a>
    </header>

    <div class="login-container">
        <div class="login-image"></div>

        <div class="login-form">
            <div class="mobile-header">
                <a href="/" class="brand">
                    <img src="{{ asset('image/logo_fashion.png') }}" alt="FashionShop Logo" class="logo" />
                    <div class="brand-text">
                        <span class="brand-name">YaM Fashion</span>
                        <span class="brand-slogan">Vẻ đẹp từ phong cách</span>
                    </div>
                </a>
            </div>
            <div class="login-image-mobile"></div>
            <h2>Thông tin cá nhân</h2>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="Họ và tên"
                        value="{{ old('name', Auth::user()->name) }}" />
                </div>

                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email"
                        value="{{ old('email', Auth::user()->email) }}" />
                </div>

                <div class="input-group">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="phone" placeholder="Số điện thoại"
                        value="{{ old('phone', Auth::user()->phone) }}" />
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">

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

                    <div class="col-md-4">

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

                    <div class="col-md-4">
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

                {{-- Nhập địa chỉ chi tiết --}}
                <div class="input-group">
                    <i class="fas fa-location-dot"></i>
                    <input type="text" id="address" name="address" class="form-control"
                        placeholder="Số nhà, tên đường" value="{{ old('address', Auth::user()->address) }}" />
                </div>


                {{-- <div class="input-group">
                    <i class="fas fa-location-dot"></i>
                    <input type="text" name="address" placeholder="Địa chỉ"
                        value="{{ old('address', Auth::user()->address) }}" />
                </div> --}}


                @if ($errors->any())
                    <div class="error-message" style="color: red; text-align: center; margin-bottom: 10px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <button type="submit" class="btn-login">CẬP NHẬT</button>

                <div class="link-forgot">
                    <a href="/">← Quay lại trang chủ</a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        © 2025 FashionShop. Bản quyền được bảo hộ.
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Lắng nghe sự kiện thay đổi tỉnh
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

        // Lắng nghe sự kiện thay đổi quận
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

        // Hàm cập nhật địa chỉ đầy đủ
        // function updateFullAddress() {
        //     var provinceVal = $('#province').val();
        //     var districtVal = $('#district').val();
        //     var wardVal = $('#ward').val();
        //     var detailAddress = $('#detail_address').val();

        //     if (provinceVal && districtVal && wardVal && detailAddress.trim() !== '') {
        //         var provinceText = $('#province option:selected').text();
        //         var districtText = $('#district option:selected').text();
        //         var wardText = $('#ward option:selected').text();

        //         var fullAddress = `${detailAddress}, ${wardText}, ${districtText}, ${provinceText}`;
        //         $('#address').val(fullAddress);
        //     } else {
        //         $('#address').val('');
        //     }
        // }

        // Lắng nghe khi người dùng thay đổi detail address hoặc chọn tỉnh/quận/xã
        $('#province, #district, #ward, #detail_address').on('change input', function() {
            updateFullAddress();
        });
    </script>
</body>

</html>
