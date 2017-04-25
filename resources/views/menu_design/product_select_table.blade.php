<table class="table-{{$left}} table table-responsive" id="products-table">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Group</th>
        <th>Sale Price</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody data-bind="foreach: products">
        <tr >
            <td data-bind="text: id"></td>
            <td data-bind="text: name"></td>
            <td data-bind="text: department.name"></td>
            <td data-bind="text: group.name"></td>
            <td data-bind="text: sale_price"></td>
            <td>
                <button data-bind="click: $root.productSelect" class='btn btn-default'> בחר </button>
            </td>
        </tr>
    </tbody>
</table>