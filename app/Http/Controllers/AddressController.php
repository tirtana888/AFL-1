<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = ShippingAddress::where('user_id', Auth::id())->get();
        return view('profile.addresses', compact('addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'recipient_name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $isDefault = ShippingAddress::where('user_id', Auth::id())->count() === 0;

        ShippingAddress::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'recipient_name' => $request->recipient_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'is_default' => $isDefault || $request->has('is_default'),
        ]);

        if ($request->has('is_default')) {
            ShippingAddress::where('user_id', Auth::id())
                ->where('id', '!=', ShippingAddress::latest()->first()->id)
                ->update(['is_default' => false]);
        }

        return back()->with('success', 'Address added successfully!');
    }

    public function setDefault(ShippingAddress $address)
    {
        if ($address->user_id !== Auth::id()) abort(403);

        ShippingAddress::where('user_id', Auth::id())->update(['is_default' => false]);
        $address->update(['is_default' => true]);

        return back()->with('success', 'Default address updated!');
    }

    public function destroy(ShippingAddress $address)
    {
        if ($address->user_id !== Auth::id()) abort(403);
        $address->delete();
        return back()->with('success', 'Address deleted!');
    }
}
