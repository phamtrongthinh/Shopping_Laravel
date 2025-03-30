<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
    <style>
        /* Giới hạn vùng chữ chạy */
        .marquee-container {
            width: 60%;
            /* Mặc định 50% trên màn hình lớn */
            text-align: center;
            overflow: hidden;
            white-space: nowrap;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Tùy chỉnh chữ chạy */
        .marquee-container marquee {
            font-weight: bold;
            /* color: blue; */
            font-size: 20px;
        }

        /* Khi màn hình nhỏ hơn 768px (mobile, tablet) */
        @media (max-width: 768px) {
            .marquee-container {
                width: 30%;
                /* Giảm còn 30% khi màn hình thu nhỏ */
            }
        }

        label.star_red::after {
            content: " *";
            /* Thêm dấu sao */
            color: red;
            /* Đổi màu đỏ */
        }
    </style>

</head>
<!---------------------------- Giao diện màn hình chính ------------------------->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav
            class="main-header navbar navbar-expand navbar-white navbar-light d-flex justify-content-between align-items-center">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Chữ chạy (Giới hạn vùng chạy) -->
            <div class="marquee-container">
                <marquee behavior="scroll" direction="left" class="navbar-text">
                    Chào mừng bạn đến với trang web quản trị bán hàng của cửa hàng thời trang YaM!
                </marquee>
            </div>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="logout-button" role="button">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>

        @include('admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!---------------------------------------------- Main content ------------------------------------------------->
            <section class="content">
                <div class="container-fluid">
                    @include('admin.alert')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary mt-2">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $title ?? null }}</h3>
                                </div>
                                <!-------------- yiel content --------------->
                                @yield('content')

                            </div>
                        </div>

                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Phiên Bản</b> 1.0.0
            </div>
            <strong>Bản Quyền &copy; 2024 <a href="#">YaM Fashion</a>.</strong> Mọi quyền được bảo lưu.
        </footer>



    </div>
    <!-- ./wrapper -->

    @include('Admin.footer')
</body>

</html>


<!-- Thêm đoạn JavaScript này vào cuối file hoặc trong phần scripts -->
<script>
    document.getElementById('logout-button').addEventListener('click', function(e) {
        e.preventDefault();

        if (confirm("Bạn có chắc chắn muốn đăng xuất khỏi hệ thống?")) {
            window.location.href = "{{ route('admin.logout') }}";
        }
    });
</script>

<!-- Thêm JavaScript để tự động ẩn thông báo từ alert -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0"; // Làm mờ dần
                setTimeout(() => alert.remove(), 500); // Xóa hoàn toàn sau khi mờ
            });
        }, 5000); // 5 giây
    });
</script>
