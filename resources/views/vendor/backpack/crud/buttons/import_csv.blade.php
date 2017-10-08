
<a id="import-csv" href="#" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Import CSV </span></a>
@section('dialog-script')
<script type="text/javascript">
	$('#import-csv').click(function(){
		$('#dialog_content').load('import/{{ $crud->entity_name }}/csv',openDialog);
	});
</script>
@endsection

