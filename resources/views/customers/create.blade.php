@extends('layouts.app')
@section('title', 'Register as customer')

@section('content')
    <div class="container">
        <h1>Register as customer</h1>
        <form method="POST" action="/customers">
            {{csrf_field()}}
            <div class="form-group">
                <label for="f_name">First Name</label>
                <input type="text" class="form-control" id="f_name" aria-describedby="emailHelp"
                       placeholder="First Name" name="first_name">
            </div>
            <div class="form-group">
                <label for="l_name">Last Name</label>
                <input type="text" class="form-control" id="l_name" placeholder="Last Name" name="last_name">
            </div>
            <div class="form-group">
                <label for="num">Phone Number</label>
                <input type="text" class="form-control" id="num" placeholder="Phone Number" name="phone_number">
            </div>
            <div class="form-group">
                <label for="birthday">Date of Birth</label>
                <input type="DATE" class="form-control" id="birthday" placeholder="Date of Birth" name="birthday">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
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