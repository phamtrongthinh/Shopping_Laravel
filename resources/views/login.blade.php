<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-color: #DBDBDB;
            /* màu xám nhẹ */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 40px;
            background-color: transparent;
        }

        .images-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .images-logo img {
            max-width: 140px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 8px 40px 8px 36px;
            /* giảm chiều cao */
            border: 1px solid #000;
            border-radius: 6px;
            font-size: 15px;
            color: #000;
            background-color: #fff;
        }

        .login-wrapper {
            width: 100%;
            max-width: 600px;
            /* kéo dài form ra hơn trước */
            padding: 30px;
            background-color: transparent;
        }


        .input-group i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #000;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #000;
        }

        .remember {
            display: flex;
            align-items: center;
            font-size: 14px;
            margin: 15px 0;
        }

        .remember input {
            margin-right: 8px;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 15px;
            margin-top: 10px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            background-color: #fff;
            color: #000;
            border: 1px solid #000;
            border-radius: 6px;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .link-forgot {
            text-align: center;
        }

        .link-forgot a {
            color: #777;
            font-size: 14px;
            text-decoration: none;
        }

        .link-forgot a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="images-logo">
            <img src="/storage/setting/1/SDqyaRgTonjZxTCi0lwK.png" alt="logo-login">
        </div>

        <form action="#" method="POST">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>

            <div class="input-group">
                <i class="fas fa-eye" onclick="togglePassword()" id="toggleIcon"></i>
                <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
            </div>

            <div class="remember">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Ghi nhớ trạng thái đăng nhập trên thiết bị này</label>
            </div>

            <button type="submit" class="btn-login">ĐĂNG NHẬP</button>
            <button type="button" class="btn-register">ĐĂNG KÝ</button>

            <div class="link-forgot">
                <a href="#">QUÊN MẬT KHẨU</a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById("password");
            const icon = document.getElementById("toggleIcon");
            if (password.type === "password") {
                password.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                password.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>
