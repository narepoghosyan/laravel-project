<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPropertyRequest;
use App\Http\Requests\StoreProperty;
use Illuminate\Http\Request;
use App\Property;
use Debugbar;


class PropertiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = auth()->user()->properties()->paginate(2);
        Debugbar::info(auth()->user());

        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $this->authorize('create', Property::class);

        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProperty $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProperty $request)
    {
//        $this->authorize('create', Property::class);
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

        $property = Property::create([
            'user_id'  => auth()->id(),
            'name'     => $request->name,
            'address'  => $request->address,
            'val'      => $request->val,
            'mortgage' => $request->mortgage,
            'photo'    => $fileNameToStore,
        ]);

//        $property->save();

        return redirect('/properties')->with('message', 'Property has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param Property $property
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Property $property)
    {
        $this->authorize('view', $property);

        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Property $property
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Property $property)
    {
        $this->authorize('update', $property);

        return view('properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditPropertyRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPropertyRequest $request, $id)
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

        Property::where('id', $id)
            ->update([
                'name'     => $request->name,
                'address'  => $request->address,
                'val'      => $request->val,
                'mortgage' => $request->mortgage,
                'photo'    => $fileNameToStore,
            ]);

        return redirect('/properties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Property::findOrFail($id)->delete();

        return redirect('/properties');
    }
}
