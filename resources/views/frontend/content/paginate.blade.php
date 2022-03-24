

@if ($paginator->hasPages())
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <ul class="pagination-center">
        @foreach ($elements as $element)
        
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif
        
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href=" {{$url}} ">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
</div>
@endif 