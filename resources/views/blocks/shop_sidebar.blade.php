
<div class="filter-actions">
    <label>Filter :</label>
    <a href="/shop" class="btn btn-dark btn-link filter-clean">Clean All</a>
</div>
@foreach($items->filters as $key => $data)

    @if($data->slug==='categories')
        <div class="widget widget-collapsible">
            <h3 class="widget-title"><span>All Categories</span></h3>
            <ul class="widget-body filter-items search-ul">
            @foreach($data->items as $key => $item)
                <li><a onclick="changeUrl('category','{{$item->slug}}')">{{$item->name}}</a></li>
            @endforeach
            </ul>
        </div>

    @elseif($data->slug==='price')
        <div class="widget widget-collapsible">
            <h3 class="widget-title"><span>Price</span></h3>
            <div class="widget-body">
                <div class="price-range">
                    <input type="number" id="min_price" class="min_price text-center" data-min-value="{{$data->min}}"  value="{{$data->min}}" required>
                    <span class="delimiter">-</span>
                    <input type="number" id="max_price" class="max_price text-center" data-max-value="{{$data->max}}"  value="{{$data->max}}" required>
                    <a class="btn btn-primary btn-rounded" onclick="changePrice()">Go</a>
                </div>
            </div>
        </div>

    @else
    <!-- Start of Collapsible Widget -->
    <div class="widget widget-collapsible">
        <h3 class="widget-title"><span>{{$data->slug}}</span></h3>
        <ul class="widget-body filter-items item-check mt-1">
            @foreach($data->items as $key => $item)
                <li><a href="{{$item->slug}}">{{ucfirst($item->name)}}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- End of Collapsible Widget -->

    @endif

@endforeach
