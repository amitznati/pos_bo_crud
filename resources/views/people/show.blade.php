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
                    <a href="{{ url($crud->route) }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
