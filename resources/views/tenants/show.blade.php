@extends('layouts.app')
@section('title', 'Show tenant')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <img class="img mb-3" src="{{ asset($tenant->photo) }}">
            </div>
            <div class="col-sm-9">
                <h3>{{ $tenant->name }}</h3>
                <p><strong>Address</strong>: {{ $tenant->address }}</p>
                <a href="/tenants/{{ $tenant->id }}/edit" class="btn btn-primary" style="color: white">Edit</a>
                <form method="post" action="/tenants/{{ $tenant->id }}" style="display:inline-block">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete Tenant</button>
                </form>
            </div>
        </div>
    </div>
@endsection
