@if ($paginator->hasPages())
    {{-- 21st.dev / shadcn Pagination Component --}}
    <nav data-slot="pagination" role="navigation" aria-label="Pagination Navigation" class="pagination-21st-nav">
        <ul data-slot="pagination-content" class="pagination-21st-content">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li data-slot="pagination-item">
                    <span data-slot="button" class="btn-pagination-21st btn-pagination-nav disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <i class="fa-solid fa-chevron-left"></i>
                        <span>Previous</span>
                    </span>
                </li>
            @else
                <li data-slot="pagination-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" data-slot="button" class="btn-pagination-21st btn-pagination-nav" aria-label="@lang('pagination.previous')">
                        <i class="fa-solid fa-chevron-left"></i>
                        <span>Previous</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li data-slot="pagination-item">
                        <span data-slot="pagination-ellipsis" class="pagination-21st-ellipsis" aria-hidden="true">
                            <i class="fa-solid fa-ellipsis"></i>
                            <span class="visually-hidden">More pages</span>
                        </span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li data-slot="pagination-item">
                            @if ($page == $paginator->currentPage())
                                <span data-slot="button" class="btn-pagination-21st btn-pagination-icon active" aria-current="page">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" data-slot="button" class="btn-pagination-21st btn-pagination-icon">
                                    {{ $page }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li data-slot="pagination-item">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" data-slot="button" class="btn-pagination-21st btn-pagination-nav" aria-label="@lang('pagination.next')">
                        <span>Next</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li data-slot="pagination-item">
                    <span data-slot="button" class="btn-pagination-21st btn-pagination-nav disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span>Next</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
