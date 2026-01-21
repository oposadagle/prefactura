@if ($paginator->hasPages())
<div class="card-body">       
    <nav aria-label="Page navigation example">
            <ul class="pagination">

                @if ($paginator->onFirstPage())
                <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="page-link bg-primary" style="color: white" href="javascript:void(0);">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                        </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link bg-primary" style="color: white" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif
              
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="page-link active bg-light" aria-current="page">{{ $page }}</a></li>
                        @else
                            <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

                {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li>
                <a class="page-link bg-primary" style="color: white" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">»</span></a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="page-link bg-primary" style="color: white" href="javascript:void(0);">
                    <span class="sr-only">Next</span>
                    <span aria-hidden="true">»</span>
                  </a>
            </li>
        @endif

            </ul>
          </nav>        
</div>
@endif