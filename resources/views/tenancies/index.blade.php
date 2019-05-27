@extends('layouts.app')
@section('title', 'Tenancies')

@section('content')
    <div class="container">
        @if($tenancies->count())
            <table class="table">
                <tr>
                    <th>Tenant name</th>
                    <th>Property</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Monthly rent</th>
                    <th>Customers</th>
                </tr>
                @foreach($tenancies as $tenancy)
                    <tr>
                        <td>{{ $tenancy->tenant->name }}</td>
                        <td>{{ $tenancy->property->name }}</td>
                        <td>{{ $tenancy->start_date }}</td>
                        <td>{{ $tenancy->end_date }}</td>
                        <td>{{ $tenancy->rent }}</td>
                        <td>
                            @foreach($tenancy->customers as $customer)
                                <p>{{$customer->first_name}}</p>
                            @endforeach
                        </td>
                        @can('view', $tenancy)
                            <td><a href="/tenancies/{{ $tenancy->id }}">See more</a></td>
                        @endcan
                    </tr>
                @endforeach
            </table>
        @else
            <p>No tenancies found</p>
        @endif
        {{ $tenancies->links() }}
    </div>
@endsection