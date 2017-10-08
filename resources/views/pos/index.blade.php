@extends('pos/layout')


@section('header')
    <section class="content-header">
      <h1>
        myPos<small>hello</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('pos/pos') }}">POS Home</a></li>
      </ol>
    </section>
@endsection




@section('content')

    

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
                </div>
                <div class="box-body">{{ trans('backpack::base.logged_in') }}</div>
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
            <h1 id="go-to-store"><a href="#">Go To Store</a></h1>

            <button id="demo">Enter/Exit Shift</button>

    	</div>
    </div>

    

@endsection


@section('after_scripts')
<script>
    $('#demo').click(function(){
        $('#dialog_content').load('dialog/shift_type',openDialog);
    });
    $('#go-to-store').click(function(){
        $('#dialog_content').load('dialog/select_employee',openDialog);
    });
</script>

@endsection

