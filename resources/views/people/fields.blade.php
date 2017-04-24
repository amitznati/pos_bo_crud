<section class="content-header">
    <h2>
        פרטים אישיים
    </h2>
</section>
<!-- First Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', isset($person) ? $person->first_name : null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', isset($person) ? $person->last_name : null, ['class' => 'form-control']) !!}
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', isset($person) ? $person->full_name : null, ['class' => 'form-control','readonly']) !!}
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-4">
    {!! Form::label('birthday', 'Birthday:') !!}
    {!! Form::date('birthday', isset($person) ? $person->birthday : null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-4">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', isset($person) ? $person->phone : null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', isset($person) ? $person->email : null, ['class' => 'form-control']) !!}
</div>


<!-- Password Field -->
<div class="form-group col-sm-4">
    {!! Form::label('identifier', 'Identifier:') !!}
    {!! Form::text('identifier',isset($person) ? $person->identifier : null, ['class' => 'form-control']) !!}
</div>

<!-- Address Fields -->

<div class="box-body row">
    <div class="col-sm-12">
        <section class="content-header">
            <h2>
                Address
            </h2>
        </section>
    </div>
</div>
<?php 
if(isset($person))
    $address = $person->address;
?>          
@include('addresses.fields')
