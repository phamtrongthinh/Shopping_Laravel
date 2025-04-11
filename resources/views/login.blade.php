<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel= "stylesheet" href="{{ asset('template/css/login.css') }}">
</head>

<body>
    <!-- Header chỉ chứa logo bên trái -->
    <header>
        <a href="/">
            <img src="image/logo_fashion.png" alt="FashionShop Logo" style="height: 40px" />
        </a>
        
    </header>

    <!-- Phần đăng nhập chia 2 cột -->
    <div class="login-container">
        <div class="login-image"></div>

        <div class="login-form">
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
