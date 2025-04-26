@extends('frontend.partial.main')

@section('content')
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Danh sách yêu thích
        </span>
    </div>
</div>

<div class="container mt-5">
    @if ($dataproduct->isEmpty()) <!-- Kiểm tra xem danh sách sản phẩm có trống không -->
        <div class="alert alert-warning" role="alert">
            Bạn chưa có sản phẩm yêu thích nào.
        </div>
    @else
        <div class="row isotope-grid">
            @foreach ($dataproduct as $item)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $item->gender ?? '' }}">
                    <!-- Block2 -->
                    <div class="block2" data-id="{{ $item->id }}" style="padding: 15px; background-color: #fff; border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                        <div class="block2-pic hov-img0" style="position: relative;">
                            <a href="{{ route('product.detail', ['id' => $item->id]) }}">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                     style="height: 334px; width: 270px; object-fit: cover; display: block; border-radius: 10px;">
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l">
                                <a href="{{ route('product.detail', ['id' => $item->id]) }}"
                                   class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6"
                                   style="word-wrap: break-word; white-space: normal;">
                                    {{ $item->name }}
                                </a>

                                <span class="stext-105 cl3" style="display: block; margin-top: 5px;">
                                    {{ $item->price_range }}
                                </span>
                            </div>

                            @php
                                // Kiểm tra xem sản phẩm đã được like chưa
                                $isLiked = auth()->check() &&
                                           $item->likes &&
                                           $item->likes->contains('user_id', auth()->id());
                            @endphp

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#"
                                   class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 {{ $isLiked ? 'js-addedwish-b2' : '' }}"
                                   data-id="{{ $item->id }}">
                                    <img class="icon-heart1 dis-block trans-04"
                                         src="template/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                         src="template/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
