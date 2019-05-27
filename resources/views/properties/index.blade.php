@extends('layouts.app')
@section('title', 'Properties')
@section('content')
    <div class="container">
        @if($properties->count())
            <table class="table">
                <tr>
                    <th>Property image</th>
                    <th>Property name</th>
                    <th>Property address</th>
                    <th>Property value</th>
                    <th>Mortgage</th>
                </tr>
                @foreach($properties as $property)
                    <tr>
                        <td><a href="/properties/{{ $property->id }}"><img class="img" src="{{ asset($property->photo )}}"></a>
                        </td>
                        <td>{{ $property->name }}</td>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->val }}</td>
                        <td>{{ $property->mortgage }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>No properties found</p>

        @endif
        {{ $properties->links() }}
    </div>
@endsection
