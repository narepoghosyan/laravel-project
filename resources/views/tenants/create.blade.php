@extends('layouts.app')
@section('title', 'Create tenant')

@section('content')
    <div class="container">
        <h1>Create a tenant</h1>
        <form method="POST" action="/tenants"  enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Name" name="name">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Address" name="address">
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