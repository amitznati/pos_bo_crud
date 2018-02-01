<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC_GzE5UvLbPXBJN6QKwNL4hRiAdqAOkbY&amp;libraries=places&amp;language={!!session('locale')!!}"></script>
<script type="text/javascript" src="{{asset('js') }}/jquery.geocomplete.js"></script>
<script type="text/javascript">
    $("#geocomplete").geocomplete().bind("geocode:result", function(event, result){
        console.log(result);
        result.address_components.forEach(function(comp){
            switch(comp.types[0])
            {
            	case 'street_number':
            		console.log('street_number: ' + comp.long_name);
            		break;
            	case 'route':
            		console.log('street_name: ' + comp.long_name);
            		break;
            	case 'locality':
            		console.log('locality: ' + comp.long_name);
            		break;
            }
        });
      })
</script>