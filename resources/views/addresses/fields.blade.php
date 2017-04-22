
    

<div class="form-group col-sm-12">
    {!! Form::label('address_string', 'Address:') !!}
    <input id="geocomplete" type="text" placeholder="Type in an address" size="90" class="form-control" />
</div>
<!-- Street Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('street_name', 'Street Name:') !!}
    {!! Form::text('street_name', isset($address) ? $address->street_name : null , ['class' => 'form-control']) !!}
</div>

<!-- Street Number Field -->
<div class="form-group col-sm-4">
    {!! Form::label('street_number', 'Street Number:') !!}
    {!! Form::number('street_number', isset($address) ? $address->street_number : 0, ['class' => 'form-control']) !!}
</div>

<!-- Hous Number Field -->
<div class="form-group col-sm-4">
    {!! Form::label('hous_number', 'Hous Number:') !!}
    {!! Form::number('hous_number', isset($address) ? $address->hous_number : 0, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-4">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', isset($address) ? $address->city : null, ['class' => 'form-control']) !!}
</div>

<!-- Zip Field -->
<div class="form-group col-sm-4">
    {!! Form::label('zip', 'Zip:') !!}
    {!! Form::number('zip', isset($address) ? $address->zip : 0, ['class' => 'form-control']) !!}
</div>


