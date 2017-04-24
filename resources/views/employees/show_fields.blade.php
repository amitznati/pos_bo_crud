<!-- Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $employee->id !!}</p>
</div>


<!-- Roles Field -->

        <h4>
            תפקיד
        </h4>



       	<div class="form-group col-sm-12">
       		{!! Form::label('role', 'Role Name:' ) !!}
       		<p>{!! $employee->roles->first()->name !!}</p>		    
		</div>


		<h4>
            הרשאות
        </h4>
		@foreach($employee->roles()->first()->permissions as $permission)
       	<div class="form-group col-sm-12">       		
       		<p>{!! $permission->name !!}</p>   
		</div>
		@endforeach

<!-- Permissions Field -->
@if($employee->permissions()->count() >0)
        <h4>
            הרשאות נוספות
        </h4>


		@foreach($employee->permissions as $permission)
       	<div class="form-group col-sm-12">
       		<p>{!! $permission->name !!}</p>   
		</div>
		@endforeach
@endif



        <h4>
            שכר
        </h4>


@include('employees.salery_table')
    {{-- <div class="form-group col-sm-3">
        {!! Form::label('salery_type_id', 'Salery Type:') !!}
        <p>{!! $employee->employeeSaleries->first()->saleryType->name !!}</p>
    </div>
    <div class="form-group col-sm-9">
        {!! Form::label('amount', 'Amount:') !!}
        <p>{!! $employee->employeeSaleries->first()->amount !!}</p>
    </div> --}}


        <h4>
            פרטים אישיים
        </h4>

<?php  $person = $employee->person ?>
@include('people.show_fields')

