@if(isset($address))
<!-- Street Name Field -->
<div class="form-group col-sm-2">
    {!! Form::label('street_name', trans('pos.people.address.street_name')) !!}
    <p>{!! $address->street_name !!}</p>
</div>

<!-- Street Number Field -->
<div class="form-group col-sm-2">
    {!! Form::label('street_number', trans('pos.people.address.street_number')) !!}
    <p>{!! $address->street_number !!}</p>
</div>

<!-- Hous Number Field -->
<div class="form-group col-sm-2">
    {!! Form::label('hous_number', trans('pos.people.address.hous_number')) !!}
    <p>{!! $address->hous_number !!}</p>
</div>

<!-- City Field -->
<div class="form-group col-sm-2">
    {!! Form::label('city', trans('pos.people.address.city')) !!}
    <p>{!! $address->city !!}</p>
</div>

<!-- Zip Field -->
<div class="form-group col-sm-2">
    {!! Form::label('zip', trans('pos.people.address.zip')) !!}
    <p>{!! $address->zip !!}</p>
</div>

@endif
