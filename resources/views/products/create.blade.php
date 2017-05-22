@extends('backpack::layout')

@section('after_styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js"></script>
@endsection

@section('header')
	<section class="content-header">
	  <h1>
	    {{ trans('backpack::crud.add') }} <span class="text-lowercase">{{ $crud->entity_name }}</span>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
	    <li class="active">{{ trans('backpack::crud.add') }}</li>
	  </ol>
	</section>
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<!-- Default box -->
		@if ($crud->hasAccess('list'))
			<a href="{{ url($crud->route) }}"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span class="text-lowercase">{{ $crud->entity_name_plural }}</span></a><br><br>
		@endif

		@include('crud::inc.grouped_errors')

		  {!! Form::open(array('url' => $crud->route, 'method' => 'post', 'files'=>$crud->hasUploadFields('create'))) !!}
		  <div class="box">

		    <div class="box-header with-border">
		      <h3 class="box-title">{{ trans('backpack::crud.add_a_new') }} {{ $crud->entity_name }}</h3>
		    </div>
		    <div class="box-body row">
		      <!-- load the view from the application if it exists, otherwise load the one in the package -->
		      @if(view()->exists('vendor.backpack.crud.form_content'))

		      	@include('vendor.backpack.crud.form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])

		      @else

		      	@include('crud::form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])
		      	<div class="form-group col-md-12">
					<label>Properties</label>
					<div id="propery_row" class="row">
						<div class="col-md-12">
							<a data-bind="click: addProperty" class="btn btn-pripary" ><i class="fa fa-plus"></i> Add Property</a>
						</div>
					</div>
					<div data-bind="foreach: properties">
					
							<propery-widget></propery-widget>
						
					</div>
				</div>
		      @endif
		    </div><!-- /.box-body -->
		    <div class="box-footer">

                @include('crud::inc.form_save_buttons')

		    </div><!-- /.box-footer-->

		  </div><!-- /.box -->
		  {!! Form::close() !!}
	</div>
</div>
<template id="propery-template">
	<div class="col-md-12">
		<div class="row">		
			<div class="form-group col-xs-3">
				<label>Property name</label>
				<input class="form-control" type="text" name="">
			</div>
			<div class="form-group col-xs-3">
			<label>Property Type</label>
				<select class="property_types form-control">
					@foreach($property_types as $propertyType)
						<option value="{!!$propertyType->id!!}">{!!$propertyType->name!!}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-xs-3">
				<label>Valid Values</label>
				<input class="form-control" type="text" name="">
			</div>
			<div class="form-group col-xs-2">
				<label>Is Mandatory?</label><br>
				<input type="checkbox" name="vehicle" value="Bike">
			</div>
			<div class="form-group col-xs-1">
				<a data-bind="click: $root.deleteProperty" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i></a>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(event) { 
	
   	var departments = {!! $departments !!};
  
    ddDept = $('select[name="dept_id"]');
    ddgroup = $('select[name="group_id"]');

    ddDept.on('change', function() { 
        setGroups(ddDept.val())
    });

    function setGroups(dept_id)
    {
        ddgroup.empty(); 
        if(window.location.pathname == '/products/' || window.location.pathname == '/products')
        {
            ddgroup.prepend("<option value='0'>All</option>").val('0');
        }
        departments.forEach(function(department){
            if(dept_id == department.id)
                department.groups.forEach(function(group){
                    var option = $('<option></option>').attr("value", group.id).text(group.name);
                ddgroup.append(option);

            });                                
        }); 
    }

    $('#add_property').click(function(){
    	var template = $('#propery-template').html();


    	$('.delete_property').click(function(){
    		console.log($(this).parent().parent());
	    	//$(this).parent().parent().remove();
	    });
    	

	    $('#propery_row').append(template);
    });

    
    

});

	
</script>

<script type="text/javascript">
	
	ko.components.register('propery-widget', {
	    viewModel: function(params) {
	        // Data: value is either null, 'like', or 'dislike'
	        this.name = name;
	    this.type = ko.observable();
	    this.values = ko.observable();
	         
	        // Behaviors
	        this.like = function() { this.chosenValue('like'); }.bind(this);
	        this.dislike = function() { this.chosenValue('dislike'); }.bind(this);
	    },
	    template: { element: 'propery-template'}
	});

	function Property() {
	    this.name = name;
	    this.type = ko.observable();
	    this.values = ko.observable();
	}
	 
	function MyViewModel() {
		self = this;
	    this.properties = ko.observableArray();

	    this.deleteProperty = function(item) {
	    	self.properties.remove(item);
	    	console.log(item);
	    	console.log(self.properties());
		};
	}
	 
	MyViewModel.prototype.addProperty = function() {
	    this.properties.push(new Property());
	};


	ko.applyBindings(new MyViewModel());
</script>
@endsection