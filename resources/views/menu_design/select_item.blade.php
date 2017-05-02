<ul class="nav nav-tabs nav-justified" id="myTab">
    <li class="active">
        <a data-toggle="tab" href="#service-one">{{trans('pos.menu_display.menu.menus')}}</a>
    </li>

    <li class="">
        <a data-toggle="tab" href="#service-two">{{trans('pos.catalog.product.products')}}</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" id="service-one">
       	@include('menu_design.product_select_table')
    </div>

    <div class="tab-pane fade in" id="service-two">
        @include('menu_design.menu_select_table')
    </div>
</div>