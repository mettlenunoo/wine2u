<style>
.pagination {
  text-align: center;
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
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
                        <a class="active my-active"><span>{{ $page }}</span></a>
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