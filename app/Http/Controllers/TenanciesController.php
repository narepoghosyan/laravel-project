<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTenancy;

use App\Tenant;
use App\Property;
use App\Tenancy;
use App\Customer;
use DB;

class TenanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenancies = Tenancy::with(['property' => function ($query) {
            $query->select(['properties.id', 'name']);
        }, 'tenant'                            => function ($query) {
            $query->select(['tenants.id', 'name']);
        }, 'customers'                         => function ($query) {
            $query->select(['customers.id', 'first_name']);
        }])->paginate(3);

        return view('tenancies.index', compact("tenancies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties = Property::pluck('name', 'id')->toArray();
        $tenants = Tenant::pluck('name', 'id')->toArray();
        $customers = Customer::pluck('first_name', 'id')->toArray();

        return view('tenancies.create', compact('properties', 'tenants', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTenancy $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTenancy $request)
    {
        $tenancy = Tenancy::create([
            'user_id'     => auth()->id(),
            'tenant_id'   => $request->tenant_id,
            'property_id' => $request->property_id,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'rent'        => $request->rent,
        ]);

        $tenancy->customers()->attach($request->customers);

        return redirect('/tenancies');
    }

    /**
     * Display the specified resource.
     *
     * @param  Tenancy $tenancy
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Tenancy $tenancy)
    {
        $this->authorize('view', $tenancy);

        return view('tenancies.show', compact('tenancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tenancy $tenancy
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Tenancy $tenancy)
    {
        $this->authorize('update', $tenancy);

        $properties = Property::pluck('name', 'id');
        $tenants = Tenant::pluck('name', 'id');
        $customers = Customer::pluck('first_name', 'id');
        return view('tenancies.edit', compact('properties', 'tenants', 'customers', 'tenancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Tenancy $tenancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenancy $tenancy)
    {
        $tenancy->update([
            'tenant_id'   => $request->tenant_id,
            'property_id' => $request->property_id,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'rent'        => $request->rent,
        ]);

        $tenancy->customers()->sync($request->customers);

        return redirect('/tenancies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tenancy::findOrFail($id)->delete();

        return redirect('/tenancies');
    }
}
