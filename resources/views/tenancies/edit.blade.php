@extends('layouts.app')
@section('title', 'Edit tenancy')

@section('content')
    <div class="container">
        <h1>Edit a tenancy</h1>
        <form method="POST" action="/tenancies/{{ $tenancy->id }}" enctype="multipart/form-data">
            @method('PATCH')
            {{csrf_field()}}
            <div class="form-group">
                <label for="tenant_id">Choose a tenant</label>
                <select name="tenant_id" id="tenant_id" class="form-control">
                    @foreach($tenants as $id=>$tenant)
                        <option value="{{ $id }}">{{ $tenant }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="property_id">Choose a property</label>
                <select name="property_id" id="property_id" class="form-control">
                    @foreach($properties as $id=>$property)
                        <option value="{{ $id }}">{{$property}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="customer_id">Choose customers</label>
                <select class="me_select form-control" name="customers[]" multiple="multiple" id="customer_id" value="some">
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}"
                            @foreach($tenancy->customers as $sel_customer)
                                @if($customer==$sel_customer->first_name)
                                    selected="selected"
                                @endif
                            @endforeach
                        >{{ $customer }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_date">Start date</label>
                <input type="date" name="start_date" id="start_date" class="form-control"
                       value="{{ $tenancy->start_date }}">
            </div>
            <div class="form-group">
                <label for="end_date">End date</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $tenancy->end_date }}">
            </div>
            <div class="form-group">
                <label for="rent">Monthly rate</label>
                <input type="text" id="rent" name="rent" class="form-control" value="{{ $tenancy->rent }}">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection