<h3>Please Select Employee:</h3> 

<div >
@foreach($employees as $emp)
	<div>
	{{Form::open(array('route' => 'pos.terminal','method' => 'GET'))}}
		{{Form::hidden('empid',$emp->id)}}
		{{Form::submit($emp->person->full_name,array('class' => 'btn btn-success btn-lg' , 'style' => 'margin-top: 20px') )}} 
	{{Form::close()}}
	</div>
@endforeach

</div>