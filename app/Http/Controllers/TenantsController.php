<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTenant;
use Illuminate\Http\Request;
use App\Tenant;

class TenantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = auth()->user()->tenants()->paginate(2);

        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTenant $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTenant $request)
    {
        if ($request->hasFile('photo')) {
//            get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
//              get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
//            filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        $tenant = Tenant::create([
            'user_id' => auth()->id(),
            'name'    => $request->name,
            'address' => $request->address,
            'photo'   => $fileNameToStore,
        ]);

        return redirect('/tenants')->with('message', 'Tenant has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param Tenant $tenant
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Tenant $tenant)
    {
        $this->authorize('update', $tenant);

        return view('tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tenant $tenant
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Tenant $tenant)
    {
        $this->authorize('update', $tenant);

        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('photo')) {
//            get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
//              get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
//            filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        Tenant::where('id', $id)
            ->update([
                'name'    => $request->name,
                'address' => $request->address,
                'photo'   => $fileNameToStore,
            ]);

        return redirect('/tenants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tenant::findOrFail($id)->delete();

        return redirect('/tenants');
    }
}
