@if ($paginator->hasPages())
    <style>
    .pagination {
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pagination a {
        color: black;
        padding: 8px 16px;
        text-decoration: none;
    }

    .my-active {
        color:blanchedalmond;
        border-bottom: 3px solid blanchedalmond;
    }
    </style>

    <div class="col-12  pagination">
        @if ($paginator->hasPages())
        
        
            @if ($paginator->onFirstPage())
                <a class="disabled"><span>← Previous</span></a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pager-list">← Previous</a>
            @endif


        
            @foreach ($elements as $element)
            
                @if (is_string($element))
                    <a class="disabled"><span>{{ $element }}</span></a>
                @endif


            
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class=" my-active"><span>{{ $page }}</span></a>
                        @else
                            <a href="{{ $url }}" class="pager-list">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach


            
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pager-list">Next →</a>
            @else
                <a class="disabled"><span>Next →</span></a>
            @endif
        </ul>
        @endif 
    </div>
@endif