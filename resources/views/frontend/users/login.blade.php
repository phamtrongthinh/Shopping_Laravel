<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../image/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel= "stylesheet" href="{{ asset('template/css/login.css') }}">
    <style>

    </style>
</head>

<body>
    <!-- Header chỉ chứa logo bên trái -->
    <header class="header desktop-header">
        <a href="/" class="brand">
            <img src="image/logo_fashion.png" alt="FashionShop Logo" class="logo" />
            <div class="brand-text">
                <span class="brand-name">YaM Fashion</span>
                <span class="brand-slogan">Vẻ đẹp từ phong cách</span>
            </div>
        </a>


    </header>
    <!-- Phần đăng nhập chia 2 cột -->
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
            <h2>Đăng nhập tài khoản</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf <!-- Bắt buộc có -->


                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="email" id="email" placeholder="Tên đăng nhập" />
                   
                </div>



                <div class="input-group">

                    <i id="toggleIcon" class="fas fa-eye" onclick="togglePassword()"></i>
                    <input type="password" id="password" name="password" placeholder="Mật khẩu" />
                </div>

                <div class="remember">
                    <input type="checkbox" id="remember" name="remember" />
                    <label for="remember">Ghi nhớ đăng nhập</label>
                </div>
                @if ($errors->any())
                    <div class="error-message"  style="color: red; margin-bottom: 10px; text-align: center; padding:3px">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div id="js-error" class="error-message"
                    style="color: red; margin-bottom: 10px; text-align: center; padding:3px"></div>

                <button type="submit" class="btn-login">ĐĂNG NHẬP</button>
                <div class="link-forgot">
                    <a href="/register">Đăng ký tài khoản</a>
                    {{-- <span>|</span>
                    <a href="/forget-password">Quên mật khẩu?</a> --}}
                </div>

            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © 2025 FashionShop. Bản quyền được bảo hộ.
    </footer>
</body>
<script>
    function togglePassword() {
        const password = document.getElementById("password");
        const icon = document.getElementById("toggleIcon");
        if (password.type === "password") {
            password.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            password.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }

    // Kiểm tra form khi submit
    document.querySelector('form').addEventListener('submit', function(e) {
        const username = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const errorDiv = document.getElementById('js-error');

        if (!username || !password) {
            e.preventDefault(); // chặn submit
            errorDiv.textContent = 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.';
        } else {
            errorDiv.textContent = ''; // xóa lỗi nếu có
        }
    });
</script>

</html>
