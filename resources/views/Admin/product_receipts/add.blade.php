@extends('admin.main')
@section('title', 'Tạo Phiếu Nhập Kho')

@section('content')
<div class="container">
    <h2 class="mb-4">Tạo Phiếu Nhập Kho</h2>

    <form action="{{-- route('admin.inventory_imports.store') --}}" method="POST">
        @csrf

        <!-- Ngày nhập -->
        <div class="form-group">
            <label for="import_date">Ngày nhập</label>
            <input type="date" name="import_date" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>

        <!-- Ghi chú -->
        <div class="form-group">
            <label for="note">Ghi chú</label>
            <textarea name="note" class="form-control" rows="3" placeholder="Ghi chú thêm (nếu có)..."></textarea>
        </div>

        <!-- Danh sách sản phẩm -->
        <h4 class="mt-4">Chi tiết sản phẩm</h4>
        <table class="table table-bordered" id="product-table">
            <thead>
                <tr>
                    <th style="width: 30%;">Sản phẩm</th>
                    <th style="width: 20%;">Số lượng</th>
                    <th style="width: 20%;">Giá nhập</th>
                    <th style="width: 10%;">#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="products[0][product_id]" class="form-control" required>
                            <option value="">-- Chọn sản phẩm --</option>
                            {{-- @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach --}}
                        </select>
                    </td>
                    <td><input type="number" name="products[0][quantity]" class="form-control" min="1" required></td>
                    <td><input type="number" name="products[0][price]" class="form-control" min="0" step="0.01" required></td>
                    <td><button type="button" class="btn btn-danger remove-row">X</button></td>
                </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-secondary mb-3" id="add-row">+ Thêm sản phẩm</button>
        <br>

        <button type="submit" class="btn btn-primary">Lưu Phiếu Nhập</button>
    </form>
</div>

<script>
    let index = 1;

    document.getElementById('add-row').addEventListener('click', function () {
        let table = document.getElementById('product-table').querySelector('tbody');
        let newRow = `
            // <tr>
            //     <td>
            //         <select name="products[${index}][product_id]" class="form-control" required>
            //             <option value="">-- Chọn sản phẩm --</option>
            //            
            //         </select>
            //     </td>
            //     <td><input type="number" name="products[${index}][quantity]" class="form-control" min="1" required></td>
            //     <td><input type="number" name="products[${index}][price]" class="form-control" min="0" step="0.01" required></td>
            //     <td><button type="button" class="btn btn-danger remove-row">X</button></td>
            // </tr>`;
        table.insertAdjacentHTML('beforeend', newRow);
        index++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endsection
