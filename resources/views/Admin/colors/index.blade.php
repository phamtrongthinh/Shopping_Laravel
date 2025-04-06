@extends('Admin.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow rounded">
            <div class="card-header">
                <h3 class="card-title">Danh Sách Màu Sắc</h3>
            </div>
            <div class="card-body">
                @if ($colors->isEmpty())
                    <p>Chưa có màu sắc nào.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên Màu</th>
                                <th>Mã Màu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                                <tr>
                                    <td>{{ $color->name }}</td>
                                    <td>
                                        <span
                                            style="display:inline-block;width:20px;height:20px;background-color:{{ $color->code }};"></span>
                                        {{ $color->code }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.colors.edit', $color->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>
                                        <form action="{{ route('admin.products.colors.delete', $color->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa màu sắc này?')">
                                                <i class="fas fa-trash"></i> Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.products.colors.add') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Thêm Màu Mới
                </a>
            </div>
        </div>
    </div>
@endsection
