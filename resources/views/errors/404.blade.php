@extends('Admin.main')
@section('content')
    <div class="text-center">
        <h1>404 - Không tìm thấy trang</h1>
        <p>Trang bạn yêu cầu không tồn tại.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Quay về trang chủ</a>
    </div>
@endsection
