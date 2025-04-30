@extends('admin.main')

@section('title', 'Quản lý Liên Hệ')
<style>


</style>

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh Sách Liên Hệ</h2>
    </div>


    @if ($contacts->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 5%;">STT</th>
                    <th style="width: 20%;">Thông Tin</th>
                    <th style="width: 25%;">Nội Dung</th>
                    <th style="width: 10%;">Tài khoản</th>
                    <th style="width: 15%;">Trạng Thái</th>
                    <th style="width: 15%;">Ngày Tạo</th>
                    <th style="width: 10%;">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($contacts->sortByDesc('created_at') as $stt => $contact)
                    <tr>
                        <td>{{ $stt + 1 }}</td>
                        <!-- Cột 1: Tên, Email, SĐT -->
                        <td>
                            <strong>Tên:</strong> {{ $contact->name }}<br>
                            <strong>Email:</strong> {{ $contact->email }}<br>
                            <strong>SĐT:</strong> {{ $contact->phone }}
                        </td>

                        <!-- Cột 2: Nội dung -->
                        <td>{{ Str::limit($contact->content ?? 'Không có nội dung', 80, '...') }}</td>
                        <td>
                            @if (in_array($contact->email, $users))
                                Thành viên
                            @else
                                Khách vãng lai
                            @endif
                        </td>

                        <!-- Cột 3: Trạng thái có thể chỉnh sửa -->
                        <td>
                            <select class="form-control form-control-sm status-select" data-id="{{ $contact->id }}">
                                <option value="pending" {{ $contact->status == 'pending' ? 'selected' : '' }}>Chờ xử lý
                                </option>
                                <option value="processing" {{ $contact->status == 'processing' ? 'selected' : '' }}>Đang xử
                                    lý</option>
                                <option value="completed" {{ $contact->status == 'completed' ? 'selected' : '' }}>Đã xử lý
                                </option>
                            </select>
                        </td>

                        <!-- Cột 4: Ngày tạo -->
                        <td>{{ $contact->created_at }}</td>

                        <!-- Cột 5: Hành động -->
                        <td style="text-align: center;">
                            <form action="{{ route('admin.contacts.delete', $contact->id) }}" method="POST"
                                style="display:inline-block;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
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
            return confirm('Bạn có chắc chắn muốn xóa liên hệ này không?');
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.status-select').forEach(function(select) {
                select.addEventListener('change', function() {
                    const contactId = this.dataset.id;
                    const newStatus = this.value;


                    fetch(`/admin/contacts/update-status/${contactId}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                status: newStatus
                            })
                        })
                        .then(async (res) => {
                            const contentType = res.headers.get('content-type');
                            if (contentType && contentType.includes('application/json')) {
                                const data = await res.json();
                                if (data.success) {
                                    alert('Cập nhật trạng thái thành công!');
                                } else {
                                    alert('Cập nhật thất bại!');
                                }
                            } else {
                                const text = await res.text();
                                console.error("Phản hồi không phải JSON:", text);
                                alert("Phản hồi không hợp lệ từ server!");
                            }
                        })
                        .catch((error) => {
                            console.error("Lỗi khi cập nhật trạng thái:", error);
                            alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                        });
                });
            });

        });

        document.addEventListener('DOMContentLoaded', function() {
            const selects = document.querySelectorAll('.status-select');

            selects.forEach(function(select) {
                changeColor(select); // khi load

                select.addEventListener('change', function() {
                    changeColor(select); // khi thay đổi
                });
            });

            function changeColor(select) {
                const status = select.value;
                select.style.backgroundColor = {
                    'pending': '#f8d7da', // Đỏ nhạt
                    'processing': '#cce5ff', // Xanh da trời nhạt
                    'completed': '#d4edda' // Xanh lá nhạt
                } [status] || 'white';

                select.style.color = {
                    'pending': '#721c24', // Đỏ đậm
                    'processing': '#004085', // Xanh dương đậm
                    'completed': '#155724' // Xanh lá đậm
                } [status] || 'black';

            }
        });


        function confirmDelete() {
            return confirm('Bạn có chắc muốn xóa liên hệ này?');
        }
    </script>


@endsection
