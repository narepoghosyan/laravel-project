@extends('layouts.app')
@section('title', 'Create tenancy')

@section('content')
    <div class="container">
        <h1>Create a tenancy</h1>
        <form method="POST" action="/tenancies" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="tenant_id">Choose a tenant</label>
                <select name="tenant_id" id="tenant_id" class="form-control">
                    @foreach($tenants as $id => $tenant)
                        <option value="{{ $id }}">{{ $tenant }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="property_id">Choose a property</label>
                <select name="property_id" id="property_id" class="form-control">
                    @foreach($properties as $id => $property)
                        <option value="{{ $id }}">{{ $property }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="customer_id">Choose customers</label>
                <select class="m_select form-control" name="customers[]" multiple="multiple" id="customer_id">
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}">{{ $customer }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_date">Start date</label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="end_date">End date</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="rent">Monthly rate</label>
                <input type="text" id="rent" name="rent" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            @if ($errors->any())
                <div class="alert alert-danger mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection