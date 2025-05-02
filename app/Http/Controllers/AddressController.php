<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use App\Models\Country;
use App\Models\Municipality;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Address::with(['user', 'country', 'municipality'])->get();
        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Combina firstName y lastName para el dropdown
        $users = User::all()->mapWithKeys(function($u) {
            return [ $u->UserId => "{$u->firstName} {$u->lastName}" ];
        });

        $countries      = Country::pluck('Name', 'CountryId');
        $municipalities = Municipality::pluck('Name', 'MunId');

        return view('addresses.create', compact('users', 'countries', 'municipalities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'UserId'         => 'required|exists:users,UserId',
            'AddressLine1'   => 'required|string',
            'AddressLine2'   => 'nullable|string',
            'City'           => 'required|string',
            'State'          => 'required|string',
            'ZipCode'        => 'nullable|integer',
            'Country'        => 'required|string',
            'CountryId'      => 'nullable|exists:countries,CountryId',
            'MunicipalityId' => 'nullable|exists:municipalities,MunId',
            'AddressType'    => 'required|string|max:50',
            'IsDefault'      => 'required|boolean',
            'IsActive'       => 'required|boolean',
        ]);

        Address::create($data);

        return redirect()
            ->route('addresses.index')
            ->with('success', 'Dirección creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return view('addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        $users = User::all()->mapWithKeys(function($u) {
            return [ $u->UserId => "{$u->firstName} {$u->lastName}" ];
        });

        $countries      = Country::pluck('Name', 'CountryId');
        $municipalities = Municipality::pluck('Name', 'MunId');

        return view('addresses.edit', compact('address', 'users', 'countries', 'municipalities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $data = $request->validate([
            'AddressLine1'   => 'required|string',
            'AddressLine2'   => 'nullable|string',
            'City'           => 'required|string',
            'State'          => 'required|string',
            'ZipCode'        => 'nullable|integer',
            'Country'        => 'required|string',
            'CountryId'      => 'nullable|exists:countries,CountryId',
            'MunicipalityId' => 'nullable|exists:municipalities,MunId',
            'AddressType'    => 'required|string|max:50',
            'IsDefault'      => 'required|boolean',
            'IsActive'       => 'required|boolean',
        ]);

        $address->update($data);

        return redirect()
            ->route('addresses.index')
            ->with('success', 'Dirección actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()
            ->route('addresses.index')
            ->with('success', 'Dirección eliminada correctamente.');
    }
}
