<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function store(Request $request){
        $create = Payment::create([
            'user_id' => auth()->user()->id,
            'payment_id' => $request->payment_id,
            'payer_id' => $request->payer_id,
            'payer_name' => $request->payer_name,
            'payer_email' => $request->payer_email,
            'amount' => $request->amount,
            'status' => $request->status,
        ]);
        if($create){
            return response()->json($create->id);
        }
    }
}
