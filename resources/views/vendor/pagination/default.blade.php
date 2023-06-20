@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <x-titles.section-title class="u-visually-hidden" title="Pagination"/>
        <div class="pagination">
            <ul class="pagination__container">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">
                            <span class="d-none d-md-block">&lsaquo;</span>
                            <span class="d-block d-md-none u-visually-hidden">@lang('pagination.previous')</span>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link"
                           aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled page-item" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active page-item" aria-current="page"><span class="page-link active">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}" title="Go to page {{ $page }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>

                @endif
            </ul>
        </div>
    </nav>
@endif
