@if($items)
        <p class="showing-info mb-2 mb-sm-0">
            Showing<span>{{$items->from}}-{{$items->to}} of {{$items->total}}</span>Products
        </p>
    @else
        <p class="showing-info mb-2 mb-sm-0">
            Showing<span>0 of 0</span>Products
        </p>
    @endif

<ul class="pagination">
    
    <?php
        $start = 1;
        $end = $items->pages;
        if($items->page>=3){
            // $start = $items->page-2;
            $start = $items->page-2;
        }
        if(($items->page+4)<=$items->pages){
            $end = $items->page+4;
        }  
    ?>
    <li class="prev disabled">
        <a class="pagination-click" aria-label="Previous" tabindex="-1" aria-disabled="true" onclick="changeUrl('page','{{$items->page-1}}')">
            <i class="w-icon-long-arrow-left"></i>Prev
        </a>
    </li>
    
    {{-- #TODO First part Pagination  - Started--}}
    @if ($start !==1)
    <li class="page-item @if($items->page==1) active @endif">
        <a class="page-link pagination-click" onclick="changeUrl('page','{{1}}')" >{{1}}</a>
    </li>
    <i class="">. . . </i>
    @endif
    {{-- First part Pagination  - Ended--}}

    
    {{-- #TODO Second part Pagination  - Started--}}
    @for ($i = $start; $i <= $end; $i++)
        <li class="page-item @if($items->page==$i) active @endif">
            <a class="page-link pagination-click" onclick="changeUrl('page','{{$i}}')" >{{$i}}</a>
        </li>
    @endfor
    {{-- Second part Pagination  - Ended--}}


     {{-- #TODO Third part Pagination  - Started--}}
    @php
        $diff = $items->pages - $end;
        if( $diff >2){
            $diff =1;
        }
    @endphp
    @if ($diff !=0)
        <i class="">. . .</i>
        @for ($f = $items->pages-$diff ; $f < $items->pages; $f++)
            <li class="page-item @if($items->page==$f) active @endif">
                <a class="page-link pagination-click" onclick="changeUrl('page','{{$f}}')" >{{ $f }}</a>
            </li>
        @endfor
    @endif
   {{--Third part Pagination  - ended--}}

    <li class="next">
        <a class="pagination-click" aria-label="Next" onclick="changeUrl('page','{{$items->page+1}}')">
            Next<i class="w-icon-long-arrow-right"></i>
        </a>
    </li>
</ul>