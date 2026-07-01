<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PresaleOrder;

class CheckInController extends Controller
{
    public function index()
    {
        return view('check-in.index');
    }

    public function search(Request $request)
    {
        $order = PresaleOrder::where(
            'order_number',
            $request->order_number
        )->first();

        return view(
            'check-in.result',
            compact('order')
        );
    }

    public function validate(PresaleOrder $presaleOrder)
    {
        $presaleOrder->update([
            'is_used' => true,
        ]);

        return redirect()->route(
            'check-in.search',
            [
                'order_number' => $presaleOrder->order_number,
            ]
        );
    }
}
