<!-- Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id', trans('backpack::crud.id') ) !!}
    <p>{!! $contact->id !!}</p>
</div>
<?php  $person = $contact->person ?>

@include('people.show_fields')


