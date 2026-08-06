@if ($paginator->hasPages())
    {{-- 21st.dev / shadcn Simple Pagination Component --}}
    <nav data-slot="pagination" role="navigation" aria-label="Pagination Navigation" class="pagination-21st-nav">
        <ul data-slot="pagination-content" class="pagination-21st-content">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li data-slot="pagination-item">
                    <span data-slot="button" class="btn-pagination-21st btn-pagination-nav disabled" aria-disabled="true">
                        <i class="fa-solid fa-chevron-left"></i>
                        <span>Previous</span>
                    </span>
                </li>
            @else
                <li data-slot="pagination-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" data-slot="button" class="btn-pagination-21st btn-pagination-nav">
                        <i class="fa-solid fa-chevron-left"></i>
                        <span>Previous</span>
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li data-slot="pagination-item">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" data-slot="button" class="btn-pagination-21st btn-pagination-nav">
                        <span>Next</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li data-slot="pagination-item">
                    <span data-slot="button" class="btn-pagination-21st btn-pagination-nav disabled" aria-disabled="true">
                        <span>Next</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
