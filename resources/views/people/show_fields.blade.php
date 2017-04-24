<!-- First Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{!! $person->first_name !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{!! $person->last_name !!}</p>
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{!! $person->full_name !!}</p>
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-4">
    {!! Form::label('birthday', 'Birthday:') !!}
    <p>{!! $person->birthday !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group col-sm-4">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $person->phone !!}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $person->email !!}</p>
</div>

<!-- Identifier Field -->
<div class="form-group col-sm-4">
    {!! Form::label('identifier', 'Identifier:') !!}
    <p>{!! $person->identifier !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $person->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $person->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $person->deleted_at !!}</p>
</div>

<div class="box-body row">
    <div class="col-sm-12">
        <section class="content-header">
            <h2>
                Address
            </h2>
        </section>
    </div>
</div>  
<?php $address = $person->address ?>
@include('addresses.show_fields')






