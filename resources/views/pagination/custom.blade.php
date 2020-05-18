@if ($paginator->hasPages())
    <nav class="wt-pagination">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="wt-prevpage"><a href="javascript:void"><i class="lnr lnr-chevron-left"></i></a></li>
            @else
                <li class="wt-prevpage"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"> <i class="lnr lnr-chevron-left"></i></a></li>
            @endif

            @if($paginator->currentPage() > 3)
                <li class="hidden-xs"><a href="{{ $paginator->url(1) }}">1</a></li>
            @endif
            @if($paginator->currentPage() > 4)
                <li><span>...</span></li>
            @endif
            @foreach(range(1, $paginator->lastPage()) as $i)
                @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                    @if ($i == $paginator->currentPage())
                        <li class="wt-active"><span>{{ $i }}</span></li>
                    @else
                        <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif
            @endforeach
            @if($paginator->currentPage() < $paginator->lastPage() - 3)
                <li><span>...</span></li>
            @endif
            @if($paginator->currentPage() < $paginator->lastPage() - 2)
                <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="wt-nextpage"><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="lnr lnr-chevron-right"></i></a></li>
            @else
            <li class="disabled wt-nextpage"><a href="javascript:void"><i class="lnr lnr-chevron-right"></i></a></li>
            @endif
        </ul>
    </nav>
@endif