@if ($paginator->hasPages())
<div class="uk-margin-medium-top">
         <ul class="uk-pagination uk-flex-center" uk-margin>
        @if ($paginator->onFirstPage())
         <!--<li><a href="#"><span uk-pagination-previous></span></a></li> -->
        @else
             <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" ><span uk-pagination-previous></span></a></li> 
        @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis"><span>{{ $element }}</span></span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @php
                        if(isset($category_uri)){
                            $url = $url. "&category=".$category_uri;
                        }
                        if(isset($sorting)){
                            $url = $url. "&sorting=".$sorting;
                        }
                        if(isset($content_search)){
                            $url = $url. "&content_search=".$content_search;
                        }
                        @endphp

                        @if ($page == $paginator->currentPage())
                            <li class="uk-active"><a>{{ $page }}</a></li>
                        @else
                            <li class=""><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

        @if ($paginator->hasMorePages())
            <li> <a href="{{ $paginator->nextPageUrl() }}" rel="next"><span uk-pagination-next></span></a></li> 
        @else
         <!--<li><a href="#"><span uk-pagination-next></span></a></li> -->
        @endif 
        </ul>
    </div>
@endif
