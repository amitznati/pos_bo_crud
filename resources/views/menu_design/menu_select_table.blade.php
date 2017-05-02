<table class="table table-responsive" id="menus-table">
    <thead>
        <th>{{trans('backpack::crud.id')}}</th>
        <th>{{trans('pos.menu_display.menu.menu_name')}}</th>
        <th colspan="3">{{trans('backpack::crud.actions')}}</th>
    </thead>
    <tbody data-bind="foreach: menus">
        <tr>
            <td data-bind="text: id"></td>
            <td data-bind="text: name"></td>
            <td>
                <button data-bind="click: $root.menuSelect" class='btn btn-default btn-menu-select'> {{trans('backpack::crud.select')}} </button>
            </td>
        </tr>
    </tbody>
</table>