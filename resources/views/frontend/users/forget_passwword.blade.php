<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Đổi mật khẩu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('template/css/login.css') }}">
</head>

<body>
    <!-- Header -->
    <header class="header desktop-header">
        <a href="/" class="brand">
            <img src="image/logo_fashion.png" alt="FashionShop Logo" class="logo" />
        </a>
        <div class="brand-text">
            <span class="brand-name">YaM Fashion</span>
            <span class="brand-slogan">Vẻ đẹp từ phong cách</span>
        </div>
    </header>

    <!-- Đổi mật khẩu -->
    <div class="login-container">
        <div class="login-image"></div>

        <div class="login-form">
            <div class="mobile-header">
                <a href="/" class="brand">
                    <img src="image/logo_fashion.png" alt="FashionShop Logo" class="logo" />
                    <div class="brand-text">
                        <span class="brand-name">YaM Fashion</span>
                        <span class="brand-slogan">Vẻ đẹp từ phong cách</span>
                    </div>
                </a>
            </div>
            <div class="login-image-mobile"></div>
            <h2>Đổi mật khẩu</h2>
            <form action="" method="POST">
                @csrf
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email đã đăng ký" required />
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="new_password" placeholder="Mật khẩu email" required />
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="new_password" placeholder="Mật khẩu mới" required />
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="confirm_password" placeholder="Xác nhận mật khẩu" required />
                </div>

                <button type="submit" class="btn-login">CẬP NHẬT MẬT KHẨU</button>

                <div class="link-forgot">
                    <a href="/login">Quay về đăng nhập</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © 2025 FashionShop. Bản quyền được bảo hộ.
    </footer>
</body>

</html>
