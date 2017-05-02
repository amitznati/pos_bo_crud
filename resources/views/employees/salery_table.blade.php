<table class="table table-responsive table-hover table-condensed">
    <thead>
        <th>{{trans('pos.people.employee.salery_type')}}</th>
        <th>{{trans('pos.people.employee.amount')}}</th>
        <th>{{trans('backpack::crud.created_at')}}</th>
        <th>{{trans('backpack::crud.updated_at')}}</th>
    </thead>
    <tbody>
    @foreach($employee->employeeSaleries()->withTrashed()->get() as $salery)
        <tr style="{{$salery->deleted_at != null ? 'text-decoration: line-through' : ''}}">
            <td>{!! $salery->saleryType->name !!}</td>
            <td>{!! $salery->amount !!}</td>
            <td>{!! $salery->created_at !!}</td>
            <td>{!! $salery->deleted_at !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>