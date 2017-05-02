@extends('backpack::layout')

@section('before_scripts')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{trans('pos.people.contact.contacts')}}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div id="person_fields" class="row">
                    {!! Form::open(['route' => 'contacts.store']) !!}

                        @include('people.fields')
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('contacts.index') !!}" class="btn btn-default">{{trans('backpack::crud.cancel')}}</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after_scripts')
    @include('people.name_changed_script')
    @include('addresses.address_api_script')
@endsection
