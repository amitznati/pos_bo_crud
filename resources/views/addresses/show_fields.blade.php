@if(isset($address))
<!-- Street Name Field -->
<div class="form-group col-sm-2">
    {!! Form::label('street_name', 'Street Name:') !!}
    <p>{!! $address->street_name !!}</p>
</div>

<!-- Street Number Field -->
<div class="form-group col-sm-2">
    {!! Form::label('street_number', 'Street Number:') !!}
    <p>{!! $address->street_number !!}</p>
</div>

<!-- Hous Number Field -->
<div class="form-group col-sm-2">
    {!! Form::label('hous_number', 'Hous Number:') !!}
    <p>{!! $address->hous_number !!}</p>
</div>

<!-- City Field -->
<div class="form-group col-sm-2">
    {!! Form::label('city', 'City:') !!}
    <p>{!! $address->city !!}</p>
</div>

<!-- Zip Field -->
<div class="form-group col-sm-2">
    {!! Form::label('zip', 'Zip:') !!}
    <p>{!! $address->zip !!}</p>
</div>

@endif
