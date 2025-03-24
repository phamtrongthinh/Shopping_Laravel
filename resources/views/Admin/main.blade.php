<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>
<!---------------------------- Giao diện màn hình chính ------------------------->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

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
                                    <h3 class="card-title">{{ $title }}</h3>
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
