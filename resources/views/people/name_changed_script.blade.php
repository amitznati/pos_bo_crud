<script type="text/javascript">
	var first = $("input[name='first_name']");
	var last = $("input[name='last_name']");
	var full = $("input[name='full_name']");
	first.change(function(){
		changeFull();
	})
	last.change(function(){
		changeFull();
	})
	function changeFull()
	{
		full.val(first.val() + ' ' + last.val());
	}
</script>