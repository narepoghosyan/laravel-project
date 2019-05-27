@extends('layouts.app')
@section('content')
    <div class="container">
        @if($customers->count())
            <table class="table">
                <tr>
                    <th>Customer name</th>
                    <th>Tenancy</th>
                </tr>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->first_name }}</td>
                        <td>{{ $customer->tenancies->id }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>No customers found</p>
        @endif
        {{ $customers->links() }}
    </div>
@endsection
