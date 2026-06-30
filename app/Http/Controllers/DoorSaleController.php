<?php

namespace App\Http\Controllers;

use App\Models\DoorSale;
use App\Models\Recital;

use Illuminate\Http\Request;


class DoorSaleController extends Controller
{
    public function index()
    {
        $doorSales = DoorSale::latest()->get();

        return view(
            'orders.door.index',
            compact('doorSales')
        );
    }

    public function create(Request $request)
    {
        $recitals = Recital::all();

        $selectedRecital =
            $request->recital;

        return view(
            'orders.door.create',
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

        $doorSale = DoorSale::create([
            'recital_id' => $request->recital_id,
            'customer_name' => $request->customer_name,
            'ticket_quantity' => $request->ticket_quantity,
            'payment_method' => $request->payment_method,
            'total_amount' => $totalAmount,
        ]);

        return redirect()->route('recitals.show', $doorSale->recital);
    }

    public function edit(DoorSale $doorSale)
    {
        $recitals = Recital::all();

        return view(
            'orders.door.edit',
            compact(
                'doorSale',
                'recitals'
            )
        );
    }

    public function update(Request $request,DoorSale $doorSale)
    {
        $recital = Recital::findOrFail(
            $request->recital_id
        );

        $totalAmount =
            $recital->ticket_price *
            $request->ticket_quantity;

        $doorSale->update([
            'recital_id' => $request->recital_id,

            'customer_name' => $request->customer_name,

            'ticket_quantity' => $request->ticket_quantity,

            'payment_method' => $request->payment_method,

            'total_amount' => $totalAmount,
        ]);

        return redirect()
            ->route('door-sales.index');
    }

    public function destroy(DoorSale $doorSale)
    {
        $doorSale->delete();

        return redirect()
            ->route('door-sales.index');
    }
}
