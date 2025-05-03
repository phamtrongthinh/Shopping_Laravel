<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Đăng ký</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../image/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('template/css/login.css') }}">
</head>

<body>
    <!-- Header -->
    <header class="header desktop-header">
        <a href="/" class="brand">
            <img src="image/logo_fashion.png" alt="FashionShop Logo" class="logo" />
            <div class="brand-text">
                <span class="brand-name">YaM Fashion</span>
                <span class="brand-slogan">Vẻ đẹp từ phong cách</span>
            </div>
        </a>

    </header>

    <!-- Đăng ký -->
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
            <h2>Tạo tài khoản mới</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="Họ và tên" />
                </div>

                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" />
                </div>

                <div class="input-group">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="phone" placeholder="Số điện thoại" />
                </div>
                
                <div class="input-group">
                    <i class="fas fa-location-dot"></i>
                    <input type="text" name="address" placeholder="Địa chỉ" />
                </div>


                <div class="input-group">
                    <i id="toggleIcon" class="fas fa-eye" onclick="togglePassword()"></i>
                    <input type="password" id="password" name="password" placeholder="Mật khẩu" />
                </div>

                <div class="input-group">
                    <i id="toggleIcon2" class="fas fa-eye" onclick="togglePassword2()"></i>
                    <input type="password" id="password2" name="password_confirmation"
                        placeholder="Nhập lại mật khẩu" />
                </div>
                @if ($errors->any())
                    <div class="error-message" style="color: red; margin-bottom: 10px; text-align: center; padding:3px">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div id="js-error" class="error-message"
                    style="color: red; margin-bottom: 10px; text-align: center; padding:3px"></div>

                <button type="submit" class="btn-login">ĐĂNG KÝ</button>

                <div class="link-forgot">
                    <a href="/login">Đã có tài khoản? Đăng nhập ngay!</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © 2025 FashionShop. Bản quyền được bảo hộ.
    </footer>
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

        function togglePassword2() {
            const password = document.getElementById("password2");
            const icon = document.getElementById("toggleIcon2");
            if (password.type === "password") {
                password.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                password.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.querySelector('input[name="name"]').value.trim();
            const email = document.querySelector('input[name="email"]').value.trim();
            const phone = document.querySelector('input[name="phone"]').value.trim();
            const password = document.querySelector('input[name="password"]').value;
            const passwordConfirmation = document.querySelector('input[name="password_confirmation"]').value;
            const errorBox = document.getElementById('js-error');

            errorBox.innerText = ''; // Clear error

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const phoneRegex = /^(0[1-9])+([0-9]{8,9})$/; // SĐT VN cơ bản

            if (!name || !email || !phone || !password || !passwordConfirmation) {
                e.preventDefault();
                errorBox.innerText = 'Vui lòng điền đầy đủ tất cả các trường.';
                return;
            }

            if (!emailRegex.test(email)) {
                e.preventDefault();
                errorBox.innerText = 'Email không hợp lệ.';
                return;
            }

            if (!phoneRegex.test(phone)) {
                e.preventDefault();
                errorBox.innerText = 'Số điện thoại không hợp lệ.';
                return;
            }

            if (password.length < 6) {
                e.preventDefault();
                errorBox.innerText = 'Mật khẩu phải có ít nhất 6 ký tự.';
                return;
            }

            if (password !== passwordConfirmation) {
                e.preventDefault();
                errorBox.innerText = 'Mật khẩu xác nhận không khớp.';
                return;
            }
        });
    </script>

</body>

</html>
