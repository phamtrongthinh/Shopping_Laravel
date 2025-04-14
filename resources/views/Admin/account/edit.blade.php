@extends('Admin.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Account</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.account.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="star_red">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email" class="star_red">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ $user->phone && strtolower($user->phone) != 'chưa câp nhât' ? $user->phone : '' }}">

                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                </div>

                <div class="form-group">
                    <label for="role" class="star_red">Role</label>
                    <select name="role" class="form-control">
                        <option value="khach_hang" {{ $user->role == 'khach_hang' ? 'selected' : '' }}>Khách Hàng</option>
                        <option value="nhan_vien_ban_hang" {{ $user->role == 'nhan_vien_ban_hang' ? 'selected' : '' }}>Nhân
                            Viên Bán Hàng</option>
                        <option value="nhan_vien_kho" {{ $user->role == 'nhan_vien_kho' ? 'selected' : '' }}>Nhân Viên Kho
                        </option>
                        <option value="chu_cua_hang" {{ $user->role == 'chu_cua_hang' ? 'selected' : '' }}>Chủ Cửa Hàng
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status" class="star_red">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active" {{ $user->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $user->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">New Password (leave blank if not changing)</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter new password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Confirm new password">
                </div>

                <button type="submit" class="btn btn-primary">Update Account</button>
                <a href="{{ route('admin.account.listusser') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
@endsection
