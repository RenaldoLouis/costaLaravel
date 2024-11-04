<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressesController extends Controller
{
    public function index()
    {
        $addresses = Address::where('user_id', Auth::id())->get();
        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        $provinces = Region::getProvinces();
        return view('addresses.form', ['provinces' => $provinces, 'address' => new Address(), 'action' => route('addresses.store'), 'method' => 'POST']);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'province_code' => 'required|string',
            'city_code' => 'required|string',
            'district_code' => 'required|string',
            'village_code' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'recipient_name' => 'nullable|string|max:255',
            'recipient_email' => 'nullable|email|max:255',
            'recipient_phone' => 'nullable|string|max:20',
            'is_default' => 'boolean',
        ]);

        if ($request->is_default) {
            Address::where('user_id', Auth::id())->update(['is_default' => false]);
        }

        Address::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'address' => $request->address,
            'province_code' => $request->province_code,
            'city_code' => $request->city_code,
            'district_code' => $request->district_code,
            'village_code' => $request->village_code,
            'postal_code' => $request->postal_code,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'recipient_name' => $request->recipient_name,
            'recipient_email' => $request->recipient_email,
            'recipient_phone' => $request->recipient_phone,
            'is_default' => $request->is_default ?? false,
        ]);

        return redirect()->route('addresses.index')->with('success', 'Address created successfully.');
    }

    public function edit(Address $address)
    {
        $provinces = Region::getProvinces();
        return view('addresses.form', ['provinces' => $provinces, 'address' => $address, 'action' => route('addresses.update', $address->id), 'method' => 'PUT']);
    }

    public function update(Request $request, Address $address)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'province_code' => 'required|string',
            'city_code' => 'required|string',
            'district_code' => 'required|string',
            'village_code' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'recipient_name' => 'nullable|string|max:255',
            'recipient_email' => 'nullable|email|max:255',
            'recipient_phone' => 'nullable|string|max:20',
            'is_default' => 'boolean',
        ]);

        if ($request->is_default) {
            Address::where('user_id', Auth::id())->update(['is_default' => false]);
        }

        $address->update([
            'name' => $request->name,
            'address' => $request->address,
            'province_code' => $request->province_code,
            'city_code' => $request->city_code,
            'district_code' => $request->district_code,
            'village_code' => $request->village_code,
            'postal_code' => $request->postal_code,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'recipient_name' => $request->recipient_name,
            'recipient_email' => $request->recipient_email,
            'recipient_phone' => $request->recipient_phone,
            'is_default' => $request->is_default ?? false,
        ]);

        return redirect()->route('addresses.index')->with('success', 'Address updated successfully.');
    }

    public function destroy(Address $address)
    {
        if ($address->is_default) {
            return redirect()->route('addresses.index')->with('error', 'Default address cannot be deleted.');
        }

        $address->delete();
        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully.');
    }

    public function setDefault(Address $address)
    {
        Address::where('user_id', Auth::id())->update(['is_default' => false]);
        $address->update(['is_default' => true]);

        return redirect()->route('addresses.index')->with('success', 'Address set as default successfully.');
    }
}
