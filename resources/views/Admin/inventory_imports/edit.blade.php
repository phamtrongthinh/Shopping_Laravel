@extends('admin.main')
@section('title', 'Chỉnh sửa Phiếu nhập kho')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Chỉnh sửa Phiếu nhập kho #{{ $import->id }}</h3>

    <form method="POST" action="{{ route('admin.inventory.imports.update', $import->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="note">Ghi chú</label>
            <textarea name="note" id="note" class="form-control" rows="3">{{ old('note', $import->note) }}</textarea>
        </div>

        <h5 class="mt-4">Danh sách sản phẩm nhập</h5>
        <table class="table table-bordered" id="product-table">
            <thead>
                <tr>
                    <th style="width: 30%;">Sản phẩm</th>
                    <th style="width: 20%;">Số lượng</th>
                    <th style="width: 20%;">Giá nhập</th>
                    <th style="width: 10%;">Huỷ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($import->items as $index => $item)
                    <tr>
                        <td>
                            <select name="items[{{ $index }}][product_detail_id]" class="form-control" required>
                                <option value="">-- Chọn sản phẩm --</option>
                                @foreach ($productDetails as $product)
                                    <option value="{{ $product->id }}" {{ $item->product_detail_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->product->name ?? 'Chưa có tên' }} - 
                                        {{ $product->color->name ?? 'Chưa có màu' }} - 
                                        {{ $product->size ?? 'Chưa có size' }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" name="items[{{ $index }}][quantity]" class="form-control" min="1" value="{{ $item->quantity }}" required></td>
                        <td><input type="number" name="items[{{ $index }}][unit_price]" class="form-control" min="0" step="0.01" value="{{ $item->unit_price }}" required></td>
                        <td><button type="button" class="btn btn-danger remove-row">X</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="form-group d-flex">
            <button type="button" class="btn btn-secondary mb-3 mr-2" id="add-row">+ Thêm sản phẩm</button>
            <button type="submit" class="btn btn-success mb-3">Cập nhật Phiếu nhập kho</button>
        </div>
    </form>

    <a href="{{ route('admin.inventory.imports.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>

<script>
    let index = {{ count($import->items) }};

    // Thêm dòng sản phẩm mới
    document.getElementById('add-row').addEventListener('click', function () {
        let table = document.getElementById('product-table').querySelector('tbody');
        let newRow = `
        <tr>
            <td>
                <select name="items[${index}][product_detail_id]" class="form-control" required>
                    <option value="">-- Chọn sản phẩm --</option>
                    @foreach ($productDetails as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->product->name ?? 'Chưa có tên' }} - 
                            {{ $product->color->name ?? 'Chưa có màu' }} - 
                            {{ $product->size ?? 'Chưa có size' }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="items[${index}][quantity]" class="form-control" min="1" required></td>
            <td><input type="number" name="items[${index}][unit_price]" class="form-control" min="0" step="0.01" required></td>
            <td><button type="button" class="btn btn-danger remove-row">X</button></td>
        </tr>
        `;
        table.insertAdjacentHTML('beforeend', newRow);
        index++;
    });

    // Xoá dòng
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endsection
