@extends('admin.main')
@section('title', 'Tạo Phiếu nhập kho')

@section('content')
    <div class="container py-4">
        <h3 class="mb-4">Tạo Phiếu nhập kho</h3>

        <form method="POST" action="{{ route('admin.inventory.imports.store') }}">
            @csrf
            <div class="form-group">
                <label for="note">Ghi chú</label>
                <textarea name="note" id="note" class="form-control" rows="3">{{ old('note') }}</textarea>
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
                    <tr>
                        <td>
                            <select name="items[0][product_detail_id]" class="form-control" required>
                                <option value="">-- Chọn sản phẩm --</option> <!-- Lựa chọn sản phẩm trên đầu -->
                                @foreach ($productDetails as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->product->name ?? 'Chưa có tên sản phẩm' }} -
                                        {{ $product->color->name ?? 'Chưa có màu' }} -
                                        {{ $product->size ?? 'Chưa có kích cỡ' }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" name="items[0][quantity]" class="form-control" min="1" required>
                        </td>
                        <td><input type="number" name="items[0][unit_price]" class="form-control" min="0"
                                step="0.01" required></td>
                        <td><button type="button" class="btn btn-danger remove-row">X</button></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group d-flex">
                <button type="button" class="btn btn-secondary mb-3 mr-2" id="add-row">+ Thêm sản phẩm</button>
                <button type="submit" class="btn btn-primary mb-3">Lưu Phiếu nhập kho</button>
            </div>


        </form>

    </div>


    <script>
        let index = 1;

        // Thêm dòng sản phẩm mới
        document.getElementById('add-row').addEventListener('click', function() {
            let table = document.getElementById('product-table').querySelector('tbody');
            let newRow = `
            <tr>
                <td>
                    <select name="items[${index}][product_detail_id]" class="form-control" required>
                         <option value="">-- Chọn sản phẩm --</option> 
                        @foreach ($productDetails as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->product->name ?? 'Chưa có tên sản phẩm' }} - 
                                {{ $product->color->name ?? 'Chưa có màu' }} - 
                                {{ $product->size ?? 'Chưa có kích cỡ' }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" name="items[${index}][quantity]" class="form-control" min="1" required></td>
                <td><input type="number" name="items[${index}][unit_price]" class="form-control" min="0" step="0.01" required></td>
                <td><button type="button" class="btn btn-danger remove-row">X</button></td>
            </tr>`;
            table.insertAdjacentHTML('beforeend', newRow);
            index++;
        });

        // Xóa dòng sản phẩm
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row')) {
                e.target.closest('tr').remove();
            }
        });
    </script>


@endsection
