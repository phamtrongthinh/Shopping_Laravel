@if ($paginator->hasPages())
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            gap: 6px;
        }

        .pagination .page-item .page-link {
            background-color: #555555; /* nền đen đậm */
            color: #ffffff; /* chữ trắng */
            border: none;
            border-radius: 50%; /* bo tròn */
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            padding: 0;
            transition: background-color 0.3s, transform 0.3s;
        }

        .pagination .page-item .page-link:hover {
            background-color: #555555; /* đen sáng hơn tí khi hover */
            transform: scale(1.05); /* phóng nhẹ khi hover */
        }

        .pagination .page-item.active .page-link {
            background-color: #717fe0; /* nền tím khi active */
            color: #ffffff;
            cursor: default;
        }

        .pagination .page-item.disabled .page-link {
            background-color: #333333; /* disabled vẫn đen */
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>

    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
