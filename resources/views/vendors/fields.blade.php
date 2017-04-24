<!-- Company Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('company_name', 'Company Name:') !!}
    {!! Form::text('company_name', isset($vendor) ? $vendor->company_name : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {{ Form::label('contacts','Contacts:') }}
    {{ Form::select('contacts[]',$contacts, isset($vendor) ? $vendor->contacts : null, ["class" => "form-control select2-multi", 'multiple' => 'multiple']) }}
</div>
<h1 class="form-group col-sm-12">
   <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('crud.contact.create') !!}">New Contact</a>
</h1>

<div class="row">
    <div class="col-sm-12">
        <section class="content-header">
            <h1>
                Address
            </h1>
        </section>         
        @include('addresses.fields')
    </div>
</div>
    