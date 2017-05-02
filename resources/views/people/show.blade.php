@extends('backpack::layout')

@section('content')
    <section class="content-header">
        <h1>
            {{ $crud->entity_name }}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <?php 
                        $person = $entry->person;
                        $address = $entry->person->address; 
                      ?>
                    @include('people.show_fields')
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ url($crud->route) }}" class="btn btn-default">{{trans('backpack::crud.back_to_all')}}</a>
                            <a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class='btn btn-default'>{{trans('backpack::crud.edit')}} <i class="glyphicon glyphicon-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
