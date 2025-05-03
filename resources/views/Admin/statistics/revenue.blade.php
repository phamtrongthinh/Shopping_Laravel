@extends('admin.main')
@section('title', 'Thống kê Doanh thu')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Thống kê Doanh thu</h3>

    <form method="GET" action="{{ route('admin.statistics.revenue') }}" class="row g-3 mb-4">
        <div class="col-auto">
            <input type="month" name="month" value="{{ request('month', now()->format('Y-m')) }}" class="form-control">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Xem thống kê</button>
        </div>
    </form>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Tổng doanh thu: <strong class="text-success">{{--number_format($revenues, 0, ',', '.') --}}₫</strong></h5>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Ngày</th>
                        <th>Số đơn hàng</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($dailyStats as $day => $data)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($day)->format('d/m/Y') }}</td>
                            <td>{{ $data['orders'] }}</td>
                            <td>{{ number_format($data['revenue'], 0, ',', '.') }}₫</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Không có dữ liệu.</td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
