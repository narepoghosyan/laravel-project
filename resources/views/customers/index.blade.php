@extends('layouts.app')
@section('title', 'Customers')

@section('content')
    <div class="container">
        @if($customers->count())
            <table class="table">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone number</th>
                    <th>Date of birth</th>
                </tr>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->first_name }}</td>
                        <td>{{ $customer->last_name }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->birthday }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>No customers found</p>
        @endif
        {{ $customers->links() }}
    </div>
@endsection
