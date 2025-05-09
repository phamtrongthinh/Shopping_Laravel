@extends('admin.main')
@section('title', 'Thống kê Doanh thu')
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        .container,
        .container * {
            visibility: visible;
        }

        .container {
            position: absolute;
            left: 0;
            top: 0;
        }

        .btn {
            display: none;
            /* Ẩn nút in khi in */
        }
    }
</style>


@section('content')
    <div class="container py-4">
        <h3 class="mb-4">Thống kê Doanh thu</h3>
        <div class="mb-3">
            <h6>
                Đang thống kê:
                @if (request('type') === 'day')
                    Ngày
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', request('date', now()->format('Y-m-d')))->format('d/m/Y') }}
                @elseif (request('type') === 'month')
                    Tháng
                    {{ \Carbon\Carbon::createFromFormat('Y-m', request('month', now()->format('Y-m')))->format('m/Y') }}
                @elseif (request('type') === 'year')
                    Năm {{ request('year', now()->year) }}
                @endif
            </h6>

        </div>
        

        <form method="GET" action="{{ route('admin.statistics.revenue') }}" class="row g-3 mb-4 align-items-end">
            <div class="col-auto">
                <label for="typeSelect" class="form-label">Loại thống kê</label>
                <select name="type" class="form-control" id="typeSelect">
                    <option value="day" {{ request('type') == 'day' ? 'selected' : '' }}>Theo ngày</option>
                    <option value="month" {{ request('type') == 'month' ? 'selected' : '' }}>Theo tháng</option>
                    <option value="year" {{ request('type') == 'year' ? 'selected' : '' }}>Theo năm</option>
                </select>
            </div>

            <div class="col-auto" id="dateContainer">
                <label for="dateInput" class="form-label">Chọn ngày</label>
                <input type="date" name="date" value="{{ request('date', now()->format('Y-m-d')) }}"
                    class="form-control" id="dateInput">
            </div>

            <div class="col-auto" id="monthContainer">
                <label for="monthInput" class="form-label">Chọn tháng</label>
                <input type="month" name="month" value="{{ request('month', now()->format('Y-m')) }}"
                    class="form-control" id="monthInput">
            </div>

            <div class="col-auto" id="yearContainer">
                <label for="yearInput" class="form-label">Chọn năm</label>
                <input type="number" name="year" value="{{ request('year', now()->year) }}" class="form-control"
                    min="2000" max="{{ now()->year }}" id="yearInput">
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Xem thống kê</button>
            </div>
            <div class="col-auto">
           <button type="button" onclick="printReport()" class="btn btn-secondary">In Phiếu Thống Kê</button>

        </div>
        </form>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h5>Tổng doanh thu:
                    <strong class="text-success">
                        {{ number_format($revenues->sum('total_revenue'), 0, ',', '.') }}₫
                    </strong>
                </h5>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                @if (request('type') === 'day')
                                    Ngày
                                @elseif (request('type') === 'month')
                                    Tháng
                                @elseif (request('type') === 'year')
                                    Năm
                                @endif
                            </th>
                            <th>Số đơn hàng</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($revenues as $revenue)
                            <tr>
                                <td>
                                    @if (request('type') === 'month')
                                        Tháng {{ $revenue->date }}
                                    @elseif (request('type') === 'year')
                                        Năm {{ $revenue->date }}
                                    @else
                                        {{ \Carbon\Carbon::parse($revenue->date)->format('d/m/Y') }}
                                    @endif
                                </td>
                                <td>{{ $revenue->total_orders }}</td>
                                <td>{{ number_format($revenue->total_revenue, 0, ',', '.') }}₫</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Không có dữ liệu.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typeSelect = document.getElementById('typeSelect');
        const dateContainer = document.getElementById('dateContainer');
        const monthContainer = document.getElementById('monthContainer');
        const yearContainer = document.getElementById('yearContainer');

        function updateInputs() {
            const type = typeSelect.value;

            // Chỉ hiển thị input tương ứng với kiểu thống kê
            dateContainer.style.display = (type === 'day') ? 'block' : 'none';
            monthContainer.style.display = (type === 'month') ? 'block' : 'none';
            yearContainer.style.display = (type === 'year') ? 'block' : 'none';
        }

        typeSelect.addEventListener('change', updateInputs);
        updateInputs(); // Gọi khi load trang
    });
</script>
<script>
    function printReport() {
        window.print(); // Gọi chức năng in của trình duyệt
    }
</script>

