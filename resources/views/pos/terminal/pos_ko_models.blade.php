<script type="text/javascript">
	
	var Order = function()
	{
		var customer = ko.observable();
		var employee = ko.observable();
		var orderPayment = ko.observable();
		var orderLines = ko.observableArray();

	}

	var OrderLine = function()
	{
		var product = ko.observable();
		var selectedProperties = ko.observableArray();
	}

	

</script>