<?php

namespace App\Http\Controllers;
use App\Services\QrCodeService;

use Illuminate\Http\Request;
use App\Models\Recital;
use App\Models\PresaleOrder;

class PresaleOrderController extends Controller
{
    public function __construct(private QrCodeService $qrCodeService) 
    {
    }

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

        $order = PresaleOrder::create([
            'recital_id' => $request->recital_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'ticket_quantity' => $request->ticket_quantity,
            'total_amount' => $totalAmount,
            'order_number' => '',
            'qr_code' => '',
            'is_used' => false,
        ]);

        $orderNumber = 'EA-' . str_pad($order->id, 6, '0', STR_PAD_LEFT);

        $qrPath = storage_path(
            'app/public/qrcodes/' . $orderNumber . '.png'
        );

        $this->qrCodeService->generate(
            $orderNumber,
            $qrPath
        );

        $order->update([
            'order_number' => $orderNumber,
            'qr_code' => 'qrcodes/' . $orderNumber . '.png',
        ]);

        return redirect()->route('presale-orders.show',$order);
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

    public function show(PresaleOrder $presaleOrder)
    {
        return view(
            'orders.presale.show',
            compact('presaleOrder')
        );
    }

    public function destroy(PresaleOrder $presaleOrder)
    {
        $presaleOrder->delete();

        return redirect()->route('presale-orders.index');
    }
}
