@extends('frontend.partial.main')
<style>
    .block2-txt-child2 {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        margin-left: auto;
        /* Đảm bảo căn phải */
    }

    .btn-addwish-b2 {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .icon-heart1,
    .icon-heart2 {
        width: 20px;
        /* Điều chỉnh kích thước icon */
        height: 20px;
    }

    /* Responsive media query */
    @media (max-width: 767px) {
        .block2-txt-child2 {
            justify-content: flex-end;
            /* Căn phải cho icon ở màn hình nhỏ */
            margin-left: 0;
            /* Reset left margin */
        }

        .icon-heart1,
        .icon-heart2 {
            width: 18px;
            /* Giảm kích thước icon cho màn hình nhỏ */
            height: 18px;
        }
    }
</style>
@section('content')
    {{-- bread crumb --}}
    <div class="container">
        <div class="bread-crumb flex-w  p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Cửa hàng
            </span>
        </div>
    </div>

    <!--product-->
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        Tất cả sản phẩm
                    </button>
                    @foreach ($categorys as $category)
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
                            data-filter=".{{ Str::slug($category->name) }}">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>

                    {{-- <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div> --}}
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                            placeholder="Search">
                    </div>
                </div>

                <!-- Bộ lọc -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter bg6 w-full p-6 rounded-xl shadow-md">
                        <form action="{{ route('product') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6">

                            <!-- Sắp xếp theo -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Sắp xếp theo</label>
                                <select name="sort_by"
                                    class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Mặc định</option>
                                    <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Mới nhất
                                    </option>
                                   
                                </select>
                            </div>

                            <!-- Lọc theo Giá -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Khoảng giá</label>
                                <select name="price_range"
                                    class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="all">Tất cả</option>
                                    <option value="0-200000" {{ request('price_range') == '0-200000' ? 'selected' : '' }}>0
                                        - 200,000 VND</option>
                                    <option value="200000-400000"
                                        {{ request('price_range') == '200000-400000' ? 'selected' : '' }}>200,000 - 400,000
                                        VND</option>
                                    <option value="400000-1000000"
                                        {{ request('price_range') == '400000-1000000' ? 'selected' : '' }}>400,000 VND trở
                                        lên</option>
                                </select>
                            </div>

                            <!-- Lọc theo Màu sắc -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Màu sắc</label>
                                <select name="color_id"
                                    class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Tất cả</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}"
                                            {{ request('color_id') == $color->id ? 'selected' : '' }}>
                                            {{ $color->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Nút lọc -->
                            <div class="flex items-end">
                                <button type="submit"
                                    class="w-full bg-blue-600 text-black font-semibold py-2 rounded hover:bg-blue-700 transition">
                                    Lọc sản phẩm
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="container mt-5">
                <div class="row isotope-grid g-4">
                    @foreach ($dataproduct as $product)
                        <div
                            class="col-sm-6 col-md-4 col-lg-3 mb-4 isotope-item {{ Str::slug($product->category->name) ?? '' }}">
                            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                                <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                        class="card-img-top" style="height: 334px; object-fit: cover;">
                                </a>

                                <div class="card-body d-flex justify-content-between p-3">
                                    <div>
                                        <h6 class="card-title mb-2">
                                            <a href="{{ route('product.detail', ['id' => $product->id]) }}"
                                                class="text-dark text-decoration-none fw-semibold">
                                                {{ $product->name }}
                                            </a>
                                        </h6>
                                        <p class=" fw-bold mb-0">
                                            {{ $product->price_range }}
                                        </p>
                                    </div>

                                    @php
                                        $isLiked =
                                            auth()->check() &&
                                            $product->likes &&
                                            $product->likes->contains('user_id', auth()->id());
                                    @endphp

                                    <div class="mt-3 text-end">
                                        <a href="#"
                                            class="btn-addwish-b2 js-addwish-b2 {{ $isLiked ? 'js-addedwish-b2' : '' }}"
                                            data-id="{{ $product->id }}"
                                            style="position: relative; display: inline-block; width: 24px; height: 24px;">

                                            <!-- Icon trái tim rỗng -->
                                            <img class="icon-heart1 dis-block trans-04"
                                                src="{{ asset('template/images/icons/icon-heart-01.png') }}" alt="ICON"
                                                style="width: 24px; height: 24px; position: absolute; top: 0; left: 0;">

                                            <!-- Icon trái tim đầy -->
                                            <img class="icon-heart2 dis-block trans-04"
                                                src="{{ asset('template/images/icons/icon-heart-02.png') }}" alt="ICON"
                                                style="width: 24px; height: 24px; position: absolute; top: 0; left: 0;">
                                        </a>


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            {{-- Pagination --}}

            <div class="d-flex justify-content-end mt-4">
                {{ $dataproduct->links('frontend.partial.my_paginate') }}
            </div>
        </div>
    @endsection
