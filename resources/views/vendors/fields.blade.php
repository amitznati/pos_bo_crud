<!-- Company Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('company_name', trans('pos.catalog.vendor.vendor_name')) !!}
    {!! Form::text('company_name', isset($vendor) ? $vendor->company_name : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {{ Form::label('contacts',trans('pos.people.contact.contacts') ) }}
    {{ Form::select('contacts[]',$contacts, isset($vendor) ? $vendor->contacts : null, ["class" => "form-control select2-multi", 'multiple' => 'multiple']) }}
</div>
<h1 class="form-group col-sm-12">
   <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('crud.contact.create') !!}">{{trans('pos.people.contact.new_contact')}}</a>
</h1>

<div class="row">
    <div class="col-sm-12">
        <section class="content-header">
            <h1>
                {{trans('pos.people.address.address')}}
            </h1>
        </section>         
        @include('addresses.fields')
    </div>
</div>
    