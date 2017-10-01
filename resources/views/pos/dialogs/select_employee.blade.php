<h3>Please type Employee Number:</h3> 
<div>
	@foreach($employees as $emp)
		<div>
			<a href="terminalWithEmployee/{{$emp->id}}">{{$emp->person->full_name}}</a>
		</div>
	@endforeach
</div>