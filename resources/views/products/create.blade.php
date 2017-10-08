@extends('backpack::layout')

@section('after_styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js"></script>
    {!! Html::style('css/parsley.css') !!}
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
			
		  {!! Form::open(array('url' => $crud->route, 'method' => 'post', 'files'=>true)) !!}
		  <div class="box">

		    <div class="box-header with-border">
		      <h3 class="box-title">{{ trans('backpack::crud.add_a_new') }} {{ $crud->entity_name }}</h3>
		    </div>
		    <div class="box-body">
		      <!-- load the view from the application if it exists, otherwise load the one in the package -->
		      @if(view()->exists('vendor.backpack.crud.form_content'))

		      	@include('vendor.backpack.crud.form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])

		      @else

		      	@include('crud::form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])
		      	<div class="form-group col-md-12">
					<div class="form-group col-md-12">
					<label>Properties</label>
					<div class="row">
						<div class="col-md-12">
							<a data-bind="click: addProperty" class="btn btn-pripary" ><i class="fa fa-plus"></i> Add Property</a>
						</div>

						<div data-bind='foreach: { data: properties, includeDestroyed: true }'>

								<div class="col-md-12">
									<div class="row">		
										<div class="form-group col-xs-6">
											<label>Property name</label>
											<input required="" data-bind="value: name" class="form-control" type="text" >
										</div>
										<div class="form-group col-xs-6">
											<label>Property Type</label>
											<select  data-bind="options: $root.property_types,optionsText: 'name',value: type,optionsValue: 'id',event:{ change: $root.typeChanged}" class="form-control"></select>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-xs-6">
											<label>Valid Values<br><small> separete the options by ',' i.e. option1,option2,...</small></label>
											<input required="" data-bind="value: options_required() ? valid_values : '',enable: options_required" class="form-control" type="text" >
										</div>
										<div class="form-group col-xs-6">
											<label>Is Mandatory?</label><br>
											<input data-bind="checked: mandatory" type="checkbox" >
										</div>
									</div>
									<div class="row">
										<div class="form-group col-xs-1">
											<a data-bind="click: $root.deleteProperty" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i></a>
										</div>
									</div>
									
								</div>
						</div>
						
					</div>
				</div>
		      @endif
			</div>
			<!-- /.box-body -->

            <div class="box-footer">

                @include('crud::inc.form_save_buttons')

		    </div><!-- /.box-footer-->
		  </div><!-- /.box -->
		  <input name="properties" type="hidden" data-bind="value: ko.toJSON(properties(), null, 2)">
		  {!! Form::close() !!}
	</div>
</div>
@endsection

@section('after_scripts2')
{!! Html::script('js/parsley.min.js') !!}
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
	});

	
</script>

<script type="text/javascript">
	

	function Property() {
		self = this;
	    this.name = ko.observable();
	    this.valid_values = ko.observable();
	    this.mandatory = ko.observable(false);
	    this.type = ko.observable();
	    this.options_required = ko.observable(true);
	}


	 
	function MyViewModel() {
		self = this;
		this.property_types = ko.observableArray({!!$property_types!!});
	    this.properties = ko.observableArray([]);
	    this.deleteProperty = function(item) {
	    	viewModel.properties.remove(item);
		};

		this.addProperty = function(prop){
			viewModel.properties.push(new Property());
		};

		this.typeChanged = function(prop){
			for(var i=0;i<viewModel.property_types().length;i++)
			{
				var type = viewModel.property_types()[i];
				if(type.id == prop.type())
					prop.options_required(type.options_required);
			}
		}

		
	}
	var viewModel = new MyViewModel();
	ko.applyBindings(viewModel);
</script>
@endsection