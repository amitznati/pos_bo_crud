<!-- Roles Field -->
<section class="content-header">
        <h2>
            תפקיד
        </h2>
    </section>
<div class="box-body">
   <div class="row">
		@foreach($roles as $role)
       	<div class="form-group col-sm-3">
       		{!! Form::radio('role[]', $role->id,(isset($employee) && $employee->hasRole($role->name)) ? ['checked' => 'checked'] : []) !!}
		      {!! Form::label('role', $role->name ) !!}
		</div>
		@endforeach
   </div>
</div>

<!-- Permissions Field -->
<section class="content-header">
        <h2>
            הרשאות נוספות
        </h2>
    </section>
<div class="box-body">
   <div class="row" id="permissions" >
		@foreach($permissions as $permission)
       	<div class="form-group col-sm-3">
       		{!! Form::checkbox('permissions['.$permission->id .']', $permission->id,(isset($employee) && $employee->permissions->contains($permission->id)) ? ['checked' => 'checked']:[]) !!}
		    {!! Form::label('permission', $permission->name ) !!}
		</div>
		@endforeach
   </div>
</div>

<section class="content-header">
  <h2>
      שכר
  </h2>
  @if(isset($employee))
    @include('employees.salery_table')
      <div class="form-group col-sm-12" >
        {!! Form::checkbox('add_salery', 'checked') !!}
        {!! Form::label('add_salery', 'Update Salery' ) !!}
      </div>
  @else
    <div class="form-group col-sm-12" >
      {!! Form::checkbox('add_salery', 'checked') !!}
      {!! Form::label('add_salery', 'Add Salery' ) !!}
    </div>
  @endif

</section>
<div class="box-body">
   <div class="row" id="salery-div" >
    <div class="form-group col-sm-4">
        {!! Form::label('salery_type_id', 'Salery Type:') !!}
        {!! Form::select('salery_type_id', $saleries, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('amount', 'Amount:') !!}
        {!! Form::number('amount', 0, ['class' => 'form-control currency','min' => 0, 'step' => '0.01']) !!}
    </div>
   </div>
</div>