@extends('layouts.app')

@section('content')

<div class="mb-6">

<h1 class="text-3xl font-bold">
    {{ $recital->name }}
</h1>

<p class="text-gray-600">
    Event Details
</p>

</div>

<div class="flex gap-3 mb-6">

<a
    href="{{ route('presale-orders.create', ['recital' => $recital->id]) }}"
    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
>
    + Add Presale Order
</a>

<a
    href="{{ route('door-sales.create', ['recital' => $recital->id]) }}"
    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
>
    + Add Door Sale
</a>

</div>

<div class="bg-white p-6 rounded shadow">

<div class="space-y-2">

    <p>
        <strong>Date:</strong>
        {{ $recital->event_date }}
    </p>

    <p>
        <strong>Location:</strong>
        {{ $recital->location }}
    </p>

    <p>
        <strong>Ticket Price:</strong>
        ${{ number_format($recital->ticket_price, 0, ',', '.') }}
    </p>

</div>

</div>

{{-- Tickets --}}

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">

<div class="bg-white p-6 rounded shadow text-center">

    <h3 class="font-bold text-gray-600 mb-2">
        Presale Tickets
    </h3>

    <p class="text-4xl font-bold">
        {{ $presaleTickets }}
    </p>

</div>

<div class="bg-white p-6 rounded shadow text-center">

    <h3 class="font-bold text-gray-600 mb-2">
        Door Tickets
    </h3>

    <p class="text-4xl font-bold">
        {{ $doorTickets }}
    </p>

</div>

<div class="bg-white p-6 rounded shadow text-center">

    <h3 class="font-bold text-gray-600 mb-2">
        Total Tickets
    </h3>

    <p class="text-4xl font-bold">
        {{ $presaleTickets + $doorTickets }}
    </p>

</div>

</div>

{{-- Revenue --}}

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">

<div class="bg-white p-6 rounded shadow text-center">

    <h3 class="font-bold text-gray-600 mb-2">
        Presale Revenue
    </h3>

    <p class="text-2xl font-bold">
        ${{ number_format($presaleRevenue, 0, ',', '.') }}
    </p>

</div>

<div class="bg-white p-6 rounded shadow text-center">

    <h3 class="font-bold text-gray-600 mb-2">
        Door Revenue
    </h3>

    <p class="text-2xl font-bold">
        ${{ number_format($doorRevenue, 0, ',', '.') }}
    </p>

</div>

<div class="bg-white p-6 rounded shadow text-center">

    <h3 class="font-bold text-gray-600 mb-2">
        Total Revenue
    </h3>

    <p class="text-2xl font-bold">
        ${{ number_format($totalRevenue, 0, ',', '.') }}
    </p>

</div>

</div>

{{-- Latest Activity --}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

<div class="bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">
        Latest Presales
    </h2>

    @forelse($latestPresales as $order)

        <div class="border-b py-3">

            <p class="font-semibold">
                {{ $order->customer_name }}
            </p>

            <p class="text-sm text-gray-600">
                {{ $order->ticket_quantity }} tickets
            </p>

            <p class="font-medium">
                ${{ number_format($order->total_amount, 0, ',', '.') }}
            </p>

            <p class="text-xs text-gray-500">
                {{ $order->created_at->format('d/m/Y H:i') }}
            </p>

        </div>

    @empty

        <p class="text-gray-500">
            No presales yet.
        </p>

    @endforelse

</div>

<div class="bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">
        Latest Door Sales
    </h2>

    @forelse($latestDoorSales as $sale)

        <div class="border-b py-3">

            <p class="font-semibold">
                {{ $sale->customer_name }}
            </p>

            <p class="text-sm text-gray-600">
                {{ $sale->ticket_quantity }} tickets
            </p>

            <p class="text-sm">
                {{ ucfirst($sale->payment_method) }}
            </p>

            <p class="font-medium">
                ${{ number_format($sale->total_amount, 0, ',', '.') }}
            </p>

            <p class="text-xs text-gray-500">
                {{ $sale->created_at->format('d/m/Y H:i') }}
            </p>

        </div>

    @empty

        <p class="text-gray-500">
            No door sales yet.
        </p>

    @endforelse

</div>

</div>

@endsection