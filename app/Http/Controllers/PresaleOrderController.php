<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recital;
use App\Models\PresaleOrder;

class PresaleOrderController extends Controller
{
    public function index()
    {
        $orders = PresaleOrder::latest()->get();

        return view('orders.presale.index', compact('orders'));
    }

    public function create(Request $request)
    {
        $recitals = Recital::all();

        $selectedRecital =
            $request->recital;

        return view(
            'orders.presale.create',
            compact(
                'recitals',
                'selectedRecital'
            )
        );
    }

    public function store(Request $request)
    {
        $recital = Recital::findOrFail($request->recital_id);

        $totalAmount = $recital->ticket_price * $request->ticket_quantity;

        PresaleOrder::create([
            'recital_id' => $request->recital_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'ticket_quantity' => $request->ticket_quantity,

            'total_amount' => $totalAmount,

            'order_number' => uniqid('ORD-'),

            'qr_code' => uniqid('QR-'),

            'is_used' => false,
        ]);

        return redirect()->route('presale-orders.index');
    }

    public function edit(PresaleOrder $presaleOrder)
    {
        $recitals = Recital::all();

        return view(
            'orders.presale.edit',
            compact('presaleOrder', 'recitals')
        );
    }

    public function update(Request $request, PresaleOrder $presaleOrder)
    {
        $recital = Recital::findOrFail($request->recital_id);

        $totalAmount =
            $recital->ticket_price *
            $request->ticket_quantity;

        $presaleOrder->update([
            'recital_id' => $request->recital_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'ticket_quantity' => $request->ticket_quantity,
            'total_amount' => $totalAmount,
        ]);

        return redirect()->route('presale-orders.index');
    }

    public function destroy(PresaleOrder $presaleOrder)
    {
        $presaleOrder->delete();

        return redirect()->route('presale-orders.index');
    }
}
