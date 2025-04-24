@extends('Admin.main')

@section('content')
    <!-----------------------------Thêm tài khoản--------------------------->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tạo tài khoản mới</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.account.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name" class="star_red">Tên</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên">
                </div>

                <div class="form-group">
                    <label for="email" class="star_red">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Nhập email">
                </div>

                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
                </div>

                <div class="form-group">
                    <label for="role" class="star_red">Vai trò</label>
                    <select name="role" class="form-control">
                        <option value="khach_hang">Khách Hàng</option>
                        <option value="nhan_vien_ban_hang">Nhân Viên Bán Hàng</option>
                        <option value="nhan_vien_kho">Nhân Viên Kho</option>
                        <option value="chu_cua_hang">Chủ Cửa Hàng</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status" class="star_red">Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="Active">Hoạt động</option>
                        <option value="Inactive">Không hoạt động</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password" class="star_red">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="star_red">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu">
                </div>

                <button type="submit" class="btn btn-primary">Tạo tài khoản</button>
                <a href="{{ route('admin.account.listusser') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
@endsection
