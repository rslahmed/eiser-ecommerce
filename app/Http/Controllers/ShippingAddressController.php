<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{

    public function create()
    {
        return view('frontend.shipping_address.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'address' => 'required',
           'number' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;
        ShippingAddress::create($data);
        return back();
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'address' => 'required',
            'number' => 'required',
        ]);

        ShippingAddress::where('user_id',auth()->user()->id)->update($data);
        return back();
    }
}
