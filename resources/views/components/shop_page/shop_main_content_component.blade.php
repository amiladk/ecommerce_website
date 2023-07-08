<div class="main-content">
    <nav class="toolbox sticky-toolbox sticky-content fix-top">
        <div class="toolbox-left">
            <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                btn-icon-left d-block d-lg-none"><i
                    class="w-icon-category"></i><span>Filters</span></a>
            <div class="toolbox-item toolbox-sort select-box text-dark">
                <label>Sort By :</label>
                <select onchange="changeUrl('sort',this.value)" name="orderby" class="form-control">
                    <option  value="default">Default</option>
                    <option  value="order_asc">Ascending</option>
                    <option  value="order_desc">Descending</option>
                    <option  value="name_asc">Name (A-Z)</option>
                    <option  value="name_desc">Name (Z-A)</option>
                    <option  value="price_min">Price (Min)</option>
                    <option  value="price_max">Price (Max)</option>
                </select>
            </div>
        </div>
        <div class="toolbox-right">
            <div class="toolbox-item toolbox-show select-box">
                <select onchange="changeUrl('limit',this.value)" name="count" class="form-control">
                    <option value="9">Show 9</option>
                    <option value="12">Show 12</option>
                    <option value="24">Show 24</option>
                    <option value="36">Show 36</option>
                </select>
            </div>
            <div class="toolbox-item toolbox-layout">
                <a class="icon-mode-grid btn-layout active btn-pointer">
                    <i onclick="changeUrl('type','block')"  class="w-icon-grid"></i>
                </a>
                <a class="icon-mode-list btn-layout btn-pointer">
                    <i onclick="changeUrl('type','list')" class="w-icon-list"></i>
                </a>
            </div>
        </div>
    </nav>
    <!-- <div id="shop-main-content" class="product-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-2">
       
    </div> -->

    <div id="shop-main-content" >
       
    </div>

    <div class="toolbox toolbox-pagination justify-content-between" id="shop-pagination">

    </div>
</div>