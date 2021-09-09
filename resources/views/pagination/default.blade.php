@if ($paginator->hasPages())
    <ul class="page__paginator">
        @if (!$paginator->onFirstPage())
            <li class="page__paginator-item_prev"><a href="{{ $paginator->previousPageUrl() }}" class="page__paginator-link">&#8249;</a></li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page__paginator-item active"><a href="#" class="page__paginator-link">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page__paginator-item active"><a href="#" class="page__paginator-link">{{ $page }}</a></li>
                    @else
                        <li class="page__paginator-item"><a href="{{ $url }}" class="page__paginator-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="page__paginator-item_next"><a href="{{ $paginator->nextPageUrl() }}" class="page__paginator-link">&#8250;</a></li>
        @endif
    </ul>
@endif
