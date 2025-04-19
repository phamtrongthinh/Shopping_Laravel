<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Thông tin cá nhân</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('template/css/login.css') }}">
</head>

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
                
                <div class="input-group">
                    <i class="fas fa-location-dot"></i>
                    <input type="text" name="address" placeholder="Địa chỉ"
                        value="{{ old('address', Auth::user()->address) }}" />
                </div>


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
</body>

</html>
