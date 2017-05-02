<section class="content-header">
    <h2>
        פרטים אישיים
    </h2>
</section>
<!-- First Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('first_name', trans('pos.people.person.first_name')) !!}
    {!! Form::text('first_name', isset($person) ? $person->first_name : null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('last_name', trans('pos.people.person.last_name')) !!}
    {!! Form::text('last_name', isset($person) ? $person->last_name : null, ['class' => 'form-control']) !!}
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('full_name', trans('pos.people.person.full_name')) !!}
    {!! Form::text('full_name', isset($person) ? $person->full_name : null, ['class' => 'form-control','readonly']) !!}
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-4">
    {!! Form::label('birthday', trans('pos.people.person.birthday')) !!}
    {!! Form::date('birthday', isset($person) ? $person->birthday : null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-4">
    {!! Form::label('phone', trans('pos.people.person.phone')) !!}
    {!! Form::text('phone', isset($person) ? $person->phone : null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', trans('pos.people.person.email')) !!}
    {!! Form::email('email', isset($person) ? $person->email : null, ['class' => 'form-control']) !!}
</div>


<!-- Password Field -->
<div class="form-group col-sm-4">
    {!! Form::label('identifier', trans('pos.people.person.identifier')) !!}
    {!! Form::text('identifier',isset($person) ? $person->identifier : null, ['class' => 'form-control']) !!}
</div>

<!-- Address Fields -->

<div class="box-body row">
    <div class="col-sm-12">
        <section class="content-header">
            <h2>
                {{trans('pos.people.address.address')}}
            </h2>
        </section>
    </div>
</div>
<?php 
if(isset($person))
    $address = $person->address;
?>          
@include('addresses.fields')
