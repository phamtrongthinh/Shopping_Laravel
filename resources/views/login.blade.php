<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel= "stylesheet" href="{{ asset('template/css/login.css') }}">
    <style>
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 12px;
        }

        .logo {
            height: 45px;
            margin: 10px;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.4;
        }

        .brand-name {
            font-size: 24px;
            font-weight: 600;
            color: #000;
        }

        .brand-slogan {
            font-size: 14px;
            color: #888;
            font-style: italic;
        }

        /* Mặc định: desktop hiển thị, mobile ẩn */
        .desktop-header {
            display: flex;
        }

        .mobile-header {
            display: none;
        }

        /* Khi màn hình nhỏ hơn 768px: đổi lại */
        @media (max-width: 768px) {
            .desktop-header {
                display: none;
            }

            .mobile-header {
                display: flex;
                justify-content: center;
                margin-bottom: 20px;
            }

            .mobile-header .brand {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .brand-name {
                font-size: 20px;
            }

            .brand-slogan {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>
    <!-- Header chỉ chứa logo bên trái -->
    <header class="header desktop-header">
        <a href="/" class="brand">
            <img src="image/logo_fashion.png" alt="FashionShop Logo" class="logo" />
        </a>
        <div class="brand-text">
            <span class="brand-name">FashionShop</span>
            <span class="brand-slogan">Vẻ đẹp từ phong cách</span>
        </div>

    </header>
    <!-- Phần đăng nhập chia 2 cột -->
    <div class="login-container">
        <div class="login-image"></div>

        <div class="login-form">
            <div class="mobile-header">
                <a href="/" class="brand">
                    <img src="image/logo_fashion.png" alt="FashionShop Logo" class="logo" />
                    <div class="brand-text">
                        <span class="brand-name">FashionShop</span>
                        <span class="brand-slogan">Vẻ đẹp từ phong cách</span>
                    </div>
                </a>
            </div>
            <div class="login-image-mobile"></div>
            <h2>Đăng nhập tài khoản</h2>
            <form action="#" method="POST">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Tên đăng nhập" required />
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Mật khẩu" required />
                </div>

                <div class="remember">
                    <input type="checkbox" id="remember" />
                    <label for="remember">Ghi nhớ đăng nhập</label>
                </div>

                <button type="submit" class="btn-login">ĐĂNG NHẬP</button>

                <div class="link-forgot">
                    <a href="#">Quên mật khẩu?</a>
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
