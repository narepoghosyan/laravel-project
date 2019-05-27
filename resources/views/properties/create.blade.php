@extends('layouts.app')
@section('title', 'Create property')

@section('content')
    <div class="container">
        <h1>Create a property</h1>
        <form method="POST" action="/properties" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Property name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                       placeholder="Property name" name="name">
            </div>
            <div class="form-group">
                <label for="address">Property address</label>
                <input type="text" class="form-control" id="address" placeholder="Property address" name="address">
            </div>
            <div class="form-group">
                <label for="value">Property value</label>
                <input type="text" class="form-control" id="value" placeholder="Property value" name="val">
            </div>
            <div class="form-group">
                <label for="mortgage">Mortgage</label>
                <input type="text" class="form-control" id="mortgage" placeholder="Mortgage" name="mortgage">
            </div>
            <div class="form-group">
                <input type="file" name="photo">
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