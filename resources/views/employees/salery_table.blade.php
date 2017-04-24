<table class="table table-responsive table-hover table-condensed">
    <thead>
        <th>Salery Type</th>
        <th>Amount</th>
        <th>Start Date</th>
        <th>End Date</th>
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