<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{
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
}
