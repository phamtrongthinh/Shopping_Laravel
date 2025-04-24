@extends('Admin.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa tài khoản</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.account.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="star_red">Tên</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email" class="star_red">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ $user->phone && strtolower($user->phone) != 'chưa câp nhât' ? $user->phone : '' }}">
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                </div>

                <div class="form-group">
                    <label for="role" class="star_red">Vai trò</label>
                    <select name="role" class="form-control">
                        <option value="khach_hang" {{ $user->role == 'khach_hang' ? 'selected' : '' }}>Khách Hàng</option>
                        <option value="nhan_vien_ban_hang" {{ $user->role == 'nhan_vien_ban_hang' ? 'selected' : '' }}>Nhân Viên Bán Hàng</option>
                        <option value="nhan_vien_kho" {{ $user->role == 'nhan_vien_kho' ? 'selected' : '' }}>Nhân Viên Kho</option>
                        <option value="chu_cua_hang" {{ $user->role == 'chu_cua_hang' ? 'selected' : '' }}>Chủ Cửa Hàng</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status" class="star_red">Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="Active" {{ $user->status == 'Active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="Inactive" {{ $user->status == 'Inactive' ? 'selected' : '' }}>Không hoạt động</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu mới (để trống nếu không thay đổi)</label>
                    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Nhập lại mật khẩu mới">
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
                <a href="{{ route('admin.account.listusser') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
@endsection
