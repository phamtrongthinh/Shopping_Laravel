@extends('frontend.partial.main')

@section('content')
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                @switch($gender)
                    @case('nam') Sản phẩm nam @break
                    @case('nu') Sản phẩm nữ @break
                    @case('unisex') Sản phẩm nam & nữ @break
                    @default Danh mục sản phẩm
                @endswitch
            </span>
        </div>
    </div>

    <div class="container mt-5">
        @if ($dataproduct->isEmpty())
            <div class="alert alert-warning" role="alert">
                Không có sản phẩm nào trong danh mục này.
            </div>
        @else
            <div class="row isotope-grid">
                @foreach ($dataproduct as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $item->gender ?? '' }}">
                        <div class="block2" data-id="{{ $item->id }}"
                             style="padding: 15px; background-color: #fff; border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                            <div class="block2-pic hov-img0" style="position: relative;">
                                <a href="{{ route('product.detail', ['id' => $item->id]) }}">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                         style="height: 334px; width: 100%; object-fit: cover; display: block; border-radius: 10px;">
                                </a>
                            </div>

                            <div class="block2-txt p-t-14">
                                <div class="d-flex justify-content-between align-items-start flex-wrap">
                                    <div class="flex-grow-1" style="min-width: 0;">
                                        <a href="{{ route('product.detail', ['id' => $item->id]) }}"
                                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 d-block"
                                           style="word-wrap: break-word; white-space: normal;">
                                            {{ $item->name }}
                                        </a>

                                        <span class="stext-105 cl3 d-block mt-1">
                                            {{ $item->price_range }}
                                        </span>
                                    </div>

                                    @php
                                        $isLiked = auth()->check() &&
                                                   $item->likes &&
                                                   $item->likes->contains('user_id', auth()->id());
                                    @endphp

                                    <div class="p-t-3 ms-2">
                                        <a href="#"
                                           class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 {{ $isLiked ? 'js-addedwish-b2' : '' }}"
                                           data-id="{{ $item->id }}">
                                            <img class="icon-heart1 dis-block trans-04"
                                                 src="{{ asset('template/images/icons/icon-heart-01.png') }}" alt="ICON">
                                            <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                 src="{{ asset('template/images/icons/icon-heart-02.png') }}" alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
