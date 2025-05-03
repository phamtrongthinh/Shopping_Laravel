@extends('admin.main')
@section('title', 'Thống kê Sản phẩm bán chạy')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Top Sản phẩm bán chạy</h3>

    <form method="GET" action="{{ route('admin.statistics.products') }}" class="row g-3 mb-4">
        <div class="col-auto">
            <input type="month" name="month" value="{{ request('month', now()->format('Y-m')) }}" class="form-control">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Lọc theo tháng</button>
        </div>
    </form>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng bán</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($topProducts as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->total_quantity }}</td>
                            <td>{{ number_format($product->total_revenue, 0, ',', '.') }}₫</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Không có dữ liệu.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
