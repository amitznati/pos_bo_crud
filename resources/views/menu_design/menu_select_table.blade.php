<table class="table table-responsive" id="menus-table">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody data-bind="foreach: menus">
        <tr>
            <td data-bind="text: id"></td>
            <td data-bind="text: name"></td>
            <td>
                <button data-bind="click: $root.menuSelect" class='btn btn-default btn-menu-select'> בחר </button>
            </td>
        </tr>
    </tbody>
</table>