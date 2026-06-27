<?php

namespace App\Http\Controllers;
use App\Models\Recital;

use Illuminate\Http\Request;

class RecitalController extends Controller
{
    public function index()
    {
        $recitals = Recital::latest()->get();

        return view('recitals.index', compact('recitals'));
    }

    public function create()
    {
        return view('recitals.create');
    }

    public function store(Request $request)
    {
        Recital::create([
            'name' => $request->name,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'ticket_price' => $request->ticket_price,
            'additional_info' => $request->additional_info,
        ]);

        return redirect()->route('recitals.index');
    }

    public function edit(Recital $recital)
    {
        return view('recitals.edit', compact('recital'));
    }

    public function update(Request $request, Recital $recital)
    {
        $recital->update([
            'name' => $request->name,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'ticket_price' => $request->ticket_price,
            'additional_info' => $request->additional_info,
        ]);

        return redirect()->route('recitals.index');
    }

    public function destroy(Recital $recital)
    {
        $recital->delete();

        return redirect()->route('recitals.index');
    }

  public function show(Recital $recital)
    {
        $presaleTickets =
            $recital->presaleOrders->sum('ticket_quantity');

        $doorTickets =
            $recital->doorSales->sum('ticket_quantity');

        $presaleRevenue =
            $recital->presaleOrders->sum('total_amount');

        $doorRevenue =
            $recital->doorSales->sum('total_amount');

        $totalRevenue =
            $presaleRevenue + $doorRevenue;

        $latestPresales = $recital
        ->presaleOrders()
        ->latest()
        ->take(5)
        ->get();

        $latestDoorSales = $recital
            ->doorSales()
            ->latest()
            ->take(5)
            ->get();

        return view(
            'recitals.show',
            compact(
                'recital',
                'presaleTickets',
                'doorTickets',
                'presaleRevenue',
                'doorRevenue',
                'totalRevenue',
                'latestPresales',
                'latestDoorSales'
            )
        );
    }
}
