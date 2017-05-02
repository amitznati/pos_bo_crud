<table class="table-{{$left}} table table-responsive" id="products-table">
    <thead>
        <th>{{trans('backpack::crud.id')}}</th>
        <th>{{trans('pos.catalog.product.product_name')}}</th>
        <th>{{trans('pos.catalog.department.department')}}</th>
        <th>{{trans('pos.catalog.group.group')}}</th>
        <th>{{trans('pos.catalog.product.sale_price')}}</th>
        <th colspan="3">{{trans('backpack::crud.actions')}}</th>
    </thead>
    <tbody data-bind="foreach: products">
        <tr >
            <td data-bind="text: id"></td>
            <td data-bind="text: name"></td>
            <td data-bind="text: department.name"></td>
            <td data-bind="text: group.name"></td>
            <td data-bind="text: sale_price"></td>
            <td>
                <button data-bind="click: $root.productSelect" class='btn btn-default'> {{trans('backpack::crud.select')}} </button>
            </td>
        </tr>
    </tbody>
</table>