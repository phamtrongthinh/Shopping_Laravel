@extends('admin.main')
@section('title', 'Danh sách Phiếu nhập kho')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Danh sách Phiếu nhập kho</h3>

    <a href="{{ route('admin.inventory.imports.create') }}" class="btn btn-primary mb-4">Tạo phiếu nhập kho</a>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã phiếu nhập</th>
                        <th>Ngày tạo</th>
                        <th>Tổng số tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($imports as $index => $import)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $import->id }}</td>
                            <td>{{ $import->created_at->format('d/m/Y') }}</td>
                            <td>{{ number_format($import->total_amount, 0, ',', '.') }}₫</td>
                            <td>
                                <a href="{{ route('admin.inventory.imports.show', $import->id) }}" class="btn btn-info">Xem chi tiết</a>
                                <form action="{{ route('admin.inventory.imports.destroy', $import->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa phiếu nhập này không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>

                        </tr>
                        
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Không có dữ liệu.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $imports ->links()}}
        </div>
    </div>
</div>
@endsection
