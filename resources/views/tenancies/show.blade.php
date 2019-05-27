@extends('layouts.app')
@section('title', 'Show tenancy')

@section('content')
    <div class="container">
        <p><strong>Tenant name:</strong> {{ $tenancy->tenant->name }}</p>
        <p><strong>Property name:</strong> {{ $tenancy->property->name }}</p>
        <p><strong>Start date:</strong> {{ $tenancy->start_date }}</p>
        <p><strong>End date:</strong> {{ $tenancy->end_date }}</p>
        <p><strong>Rent:</strong> {{ $tenancy->rent }}</p>
        <a href="/tenancies/{{ $tenancy->id }}/edit" class="btn btn-primary" style="color: white">Edit</a>
        <form method="post" action="/tenancies/{{ $tenancy->id }}" style="display:inline-block">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Delete Tenancy</button>
        </form>
    </div>
@endsection