@extends('admin.main')
@section('title', 'Quản lý Liên Hệ')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh Sách Liên Hệ</h2>     
    </div>


    @if ($contacts->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 5%;">STT</th>
                    <th style="width: 20%;">Tên Người Gửi</th>
                    <th style="width: 25%;">Email</th>
                    <th style="width: 20%;">Số Điện Thoại</th>
                    <th style="width: 25%;">Nội Dung</th>
                    <th style="width: 10%;">Trạng Thái</th> <!-- Cột Trạng Thái -->
                    <th style="width: 15%;">Ngày Tạo</th>
                    <th style="width: 15%;">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $STT => $contact)
                    <tr>
                        <td>{{ $STT + 1 }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ Str::limit($contact->content ?? 'Không có nội dung', 80, '...') }}</td>

                        <!-- Cột Trạng Thái -->
                        <td>
                            @if($contact->status == 'pending')
                                <span class="badge badge-warning">Chờ Xử Lý</span>
                            @elseif($contact->status == 'processing')
                                <span class="badge badge-primary">Đang Xử Lý</span>
                            @elseif($contact->status == 'completed')
                                <span class="badge badge-success">Đã Xử Lý</span>
                            @else
                                <span class="badge badge-secondary">Chưa Xử Lý</span>
                            @endif
                        </td>

                        <td>{{ $contact->created_at }}</td>
                        <td>
                           
                            <form action="{{--route('admin.contacts.delete', $contact->id) --}}" method="POST"
                                style="display:inline-block;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $contacts->links() }} --}}
    @else
        <div class="alert alert-warning">
            Chưa có thông tin liên hệ nào được gửi đến.       
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-primary ml-2">Quay lại</a>
        </div>
    @endif

    <script>
        function confirmDelete() {
            return confirm("Bạn có chắc muốn xóa thông tin liên hệ này?");
        }
    </script>

@endsection
