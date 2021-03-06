@extends('backpack::layout')

@section('content')
    <section class="content-header">
        <h1>
            {{trans('pos.people.contact.contact')}}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('contacts.show_fields')
                    <a href="{!! route('contacts.index') !!}" class="btn btn-default">{{trans('backpack::crud.back_to_all')}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
