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
}
