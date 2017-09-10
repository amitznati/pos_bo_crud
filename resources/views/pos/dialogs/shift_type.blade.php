<h3>Please type Employee Number:</h3> 
{{ Form::open(array('route' => 'pos.type_attendance','method' => 'GET')) }}
<div class="form-group"> 
	<input class="form-control" type="text" name="empnum"> 
</div> 
 
<div class="form-group"> 
	{{ Form::submit('OK',array('class' => 'btn btn-success btn-lg' , 'style' => 'margin-top: 20px') )}} 
</div> 
{{ Form::close() }}