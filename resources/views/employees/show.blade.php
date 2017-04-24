@extends('backpack::layout')

@section('content')
    <section class="content-header">
        <h1>
            Employee
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-{{$left}}: 20px">
                    <?php  $employee = $entry;  ?> 
                    @include('employees.show_fields')
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{!! route('crud.employee.index') !!}" class="btn btn-default">Back</a>
                            <a href="{!! route('crud.employee.edit', [$employee->id]) !!}" class='btn btn-default'>Edit<i class="glyphicon glyphicon-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
