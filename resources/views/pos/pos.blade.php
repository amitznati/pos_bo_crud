@extends('pos/layout')

@section('after_styles')
<style type="text/css">
    .row-20{
        border: 1px solid black;
        background-color: red;
        height: 20%;
    }
</style>
@endsection

@section('header')
    <section class="content-header">
      <h1>
        myPos<small>Point Of Sale</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('pos/home') }}">POS Home</a></li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row-20">
        
    </div>
@endsection
