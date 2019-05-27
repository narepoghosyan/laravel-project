@extends('layouts.app')
@section('title', 'Show property')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <img class="img mb-3" src="{{ asset($property->photo) }}">
                <br>
                <a href="/properties/{{ $property->id }}/edit" class="btn btn-primary" style="color: white">Edit</a>
                <form method="post" action="/properties/{{$property->id}}" style="display:inline-block">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete Property</button>
                </form>
            </div>
            <div class="col-sm-9">
                <h3>{{ $property->name }}</h3>
                <p><strong>Address</strong>: {{ $property->address }}</p>
                <p><strong>Value</strong>: {{ $property->val }}</p>
                <p><strong>Mortgage</strong>: {{ $property->mortgage }}</p>
            </div>
        </div>
    </div>
@endsection
