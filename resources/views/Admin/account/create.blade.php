@extends('Admin.main')

@section('content')
    `<!-----------------------------Thêm tài khoản--------------------------->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Account</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.account.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name" class="star_red">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="email" class="star_red">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter address">
                </div>

                <div class="form-group">
                    <label for="role"class="star_red">Role</label>
                    <select name="role" class="form-control">
                        <option value="khach_hang">Khách Hàng</option>
                        <option value="nhan_vien_ban_hang">Nhân Viên Bán Hàng</option>
                        <option value="nhan_vien_kho">Nhân Viên Kho</option>
                        <option value="chu_cua_hang">Chủ Cửa Hàng</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status" class="star_red">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password"class="star_red"> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="star_red">Confirm passwword</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Enter confirm password">
                </div>

                <button type="submit" class="btn btn-primary">Create Account</button>
            </form>
        </div>
    </div>
@endsection
