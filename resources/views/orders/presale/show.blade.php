@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white p-6 rounded shadow">

        <h1 class="text-3xl font-bold mb-6">
            {{ $presaleOrder->order_number }}
        </h1>

        <div class="space-y-2">

            <p>
                <strong>Customer:</strong>
                {{ $presaleOrder->customer_name }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $presaleOrder->customer_email }}
            </p>

            <p>
                <strong>Event:</strong>
                {{ $presaleOrder->recital->name }}
            </p>

            <p>
                <strong>Tickets:</strong>
                {{ $presaleOrder->ticket_quantity }}
            </p>

            <p>
                <strong>Total:</strong>
                ${{ number_format($presaleOrder->total_amount, 0, ',', '.') }}
            </p>

        </div>

        @if($presaleOrder->qr_code)

            <div class="mt-8 text-center">

                <img
                    src="{{ asset('storage/' . $presaleOrder->qr_code) }}"
                    alt="QR Code"
                    class="mx-auto w-64"
                >

                <p class="mt-4 text-gray-600">
                    Present this QR code at the event entrance.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection