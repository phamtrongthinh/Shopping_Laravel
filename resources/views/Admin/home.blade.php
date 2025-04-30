@extends('Admin.main')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="mb-4">Dashboard - Quản trị hệ thống</h2>

    <div class="row g-4">
        <!-- Thẻ thống kê -->
        <div class="col-md-6 col-xl-3">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Tổng đơn hàng</h5>
                    <h3 class="text-primary">124</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Tổng doanh thu</h5>
                    <h3 class="text-success">152,300,000₫</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Người dùng</h5>
                    <h3 class="text-info">245</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Sản phẩm</h5>
                    <h3 class="text-warning">68</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Đơn hàng gần đây -->
    <div class="mt-5">
        <h4>Đơn hàng gần đây</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered rounded-4 overflow-hidden">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>Nguyễn Văn A</td>
                        <td>1,200,000₫</td>
                        <td>28/04/2025</td>
                        <td><span class="badge bg-success">Hoàn tất</span></td>
                    </tr>
                    <tr>
                        <td>102</td>
                        <td>Trần Thị B</td>
                        <td>850,000₫</td>
                        <td>27/04/2025</td>
                        <td><span class="badge bg-warning text-dark">Đang xử lý</span></td>
                    </tr>
                    <tr>
                        <td>103</td>
                        <td>Lê Văn C</td>
                        <td>3,400,000₫</td>
                        <td>27/04/2025</td>
                        <td><span class="badge bg-secondary">Hủy</span></td>
                    </tr>
                    <tr>
                        <td>104</td>
                        <td>Phạm Thị D</td>
                        <td>2,100,000₫</td>
                        <td>26/04/2025</td>
                        <td><span class="badge bg-success">Hoàn tất</span></td>
                    </tr>
                    <tr>
                        <td>105</td>
                        <td>Đỗ Văn E</td>
                        <td>1,750,000₫</td>
                        <td>25/04/2025</td>
                        <td><span class="badge bg-warning text-dark">Đang xử lý</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
