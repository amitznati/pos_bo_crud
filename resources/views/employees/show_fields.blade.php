<!-- Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id', trans('backpack::crud.id') ) !!}
    <p>{!! $employee->id !!}</p>
</div>


<!-- Roles Field -->

<h4>
    {{trans('pos.people.employee.role')}}
</h4>



<div class="form-group col-sm-12">
	<p>{!! $employee->roles->first()->name !!}</p>		    
</div>


<h4>
  {{trans('pos.people.employee.permissions')}}
</h4>

@foreach($employee->roles()->first()->permissions as $permission)
   	<div class="form-group col-sm-12">       		
   		<p>{!! $permission->name !!}</p>   
</div>
@endforeach

<!-- Permissions Field -->
@if($employee->permissions()->count() >0)

  <h4>
      {{trans('pos.people.employee.extra_permissions')}}
  </h4>

	@foreach($employee->permissions as $permission)
   	<div class="form-group col-sm-12">
   		<p>{!! $permission->name !!}</p>   
    </div>
	@endforeach

@endif


<h4>
    {{trans('pos.people.employee.salery')}}
</h4>


@include('employees.salery_table')


<h4>
    {{trans('pos.people.personal_details')}}
</h4>

<?php  $person = $employee->person ?>

@include('people.show_fields')

