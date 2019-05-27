@extends('layouts.app')
@section('title', 'Tenants')

@section('content')
    <div class="container">
        @if($tenants->count())
            <table class="table">
                <col width="30%">
                <col width="35%">
                <col width="35%">
                <tr>
                    <th>Tenant image</th>
                    <th>Tenant name</th>
                    <th>Tenant address</th>
                </tr>
                @foreach($tenants as $tenant)
                    <tr>
                        <td><a href="/tenants/{{ $tenant->id }}"><img class="img"
                                                                      src="{{ asset($tenant->photo) }}"></a></td>
                        <td>{{ $tenant->name }}</td>
                        <td>{{ $tenant->address }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>No tenants found</p>
        @endif
        {{ $tenants->links() }}
    </div>
@endsection
