<h1>Import {{$crud}}</h1>

{{Form::open(array('route' => 'admin.import.save','files'=>true,'class' => 'form','method' => 'post','enctype'=>"multipart/form-data"))}}

<div class="form-group">
    {!! Form::label('import_file','CSV File') !!}
     {!! Form::file('import_file', null,['class' => 'form-control-file']) !!} 
</div>
{{ Form::hidden('crud_name', $crud) }}
{{ Form::hidden('import_type', 'CSV') }}
<div class="form-group">
    {!! Form::submit('Import!', array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div>