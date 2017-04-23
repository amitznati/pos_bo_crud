@extends('backpack::layout')

@section('after_styles')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@stop
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
              @include('vendors.fields')
            </div><!-- /.box-body -->
            <div class="box-footer">

                @include('crud::inc.form_save_buttons')

            </div><!-- /.box-footer-->

          </div><!-- /.box -->
          {!! Form::close() !!}
    </div>
</div>

@endsection
@section('after_scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    @if(isset($vendor))
    <script type="text/javascript">
        $(".select2-multi").select2();
        $(".select2-multi").select2().val({!! json_encode($vendor->contacts()->getRelatedIds()) !!}).trigger('change'); 
        
    </script>
    @else
        <script type="text/javascript">
        $(".select2-multi").select2(); 
    </script>
    @endif

@endsection