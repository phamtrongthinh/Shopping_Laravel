@extends('Admin.main')
@section('content')
    <!-----------------------------Danh sách người dùng--------------------------->
    <div class="card-body">
        <div class="d-flex justify-content-between mb-2">
            <h2>Danh Sách Người Dùng</h2>
            <div class="d-flex">
                <!-- Ô tìm kiếm -->
                <form action="{{ route('admin.account.listusser') }}" method="GET" class="d-flex">
                    <input type="text" name="search_user" class="form-control mr-2" placeholder="Tìm kiếm tài khoản..."
                        value="{{ request('search_user') }}">
                    <button type="submit" class="btn btn-secondary">Tìm</button>
                </form>
                <a href="{{ route('admin.account.create') }}" class="btn btn-primary ml-2">Thêm Người Dùng</a>
            </div>
        </div>

        <!-- Hiển thị thông báo kết quả tìm kiếm -->
        @if (request()->has('search_user') && request('search_user') != '')
            <div class="alert alert-info">
                Kết quả tìm kiếm cho từ khóa: <strong>{{ request('search_user') }}</strong>
            </div>
        @endif

        <div class="table-responsive">
            @if ($users->count() > 0)
                <table id="userTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ Tên</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Vai Trò</th>
                            <th>Trạng Thái</th>
                            <th>Ngày Tạo</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id ?? 'Chưa cập nhật' }}</td>
                                <td>{{ $user->name ?? 'Chưa cập nhật' }}</td>
                                <td>{{ $user->email ?? 'Chưa cập nhật' }}</td>
                                <td>{{ $user->phone ?? 'Chưa cập nhật' }}</td>
                                <td>{{ $user->address ?? 'Chưa cập nhật' }}</td>
                                <td>
                                    @switch($user->role)
                                        @case('khach_hang') Khách Hàng @break
                                        @case('nhan_vien_ban_hang') Nhân Viên Bán Hàng @break
                                        @case('nhan_vien_kho') Nhân Viên Kho @break
                                        @case('chu_cua_hang') Chủ Cửa Hàng @break
                                        @default {{ $user->role }}
                                    @endswitch
                                </td>
                                <td>
                                    <span class="badge badge-{{ $user->status === 'Active' ? 'success' : 'secondary' }}">
                                        {{ $user->status === 'Active' ? 'Hoạt động' : 'Không hoạt động' }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at ? $user->created_at->format('d/m/Y') : 'Chưa cập nhật' }}</td>
                                <td>
                                    <a href="{{ route('admin.account.edit', $user->id) }}"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <form action="{{ route('admin.account.delete', $user->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning">
                    Không có kết quả tìm kiếm nào phù hợp với từ khóa: <strong>{{ request('search_user') }}</strong>
                    <a href="{{ route('admin.account.listusser') }}" class="btn btn-sm btn-primary ml-2">Quay lại</a>
                </div>
            @endif
        </div>

        <!-- Hiển thị phân trang -->
        <div class="mt-3">
            {{ $users->appends(['search_user' => request('search_user')])->links() }}
        </div>
    </div>
@endsection
