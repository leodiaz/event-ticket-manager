@extends('layouts.app')

@section('content')

<div class="mb-6"> <h1 class="text-3xl font-bold"> Door Sales </h1> </div>

<div class="mb-6"> <a href="{{ route('door-sales.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded" > Create Sale </a> </div>

@foreach($doorSales as $sale)

<div class="bg-white p-5 rounded shadow mb-4">

    <h2 class="text-xl font-semibold">
        {{ $sale->customer_name }}
    </h2>

    <p>
        Event:
        {{ $sale->recital->name }}
    </p>

    <p>
        Tickets:
        {{ $sale->ticket_quantity }}
    </p>

    <p>
        Payment:
        {{ $sale->payment_method }}
    </p>

    <p>
        Total:
        ${{ $sale->total_amount }}
    </p>

    <div class="flex gap-2 mt-4">

        <a
            href="{{ route('door-sales.edit', $sale) }}"
            class="bg-yellow-500 text-white px-3 py-1 rounded"
        >
            Edit
        </a>

        <form
            action="{{ route('door-sales.destroy', $sale) }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="bg-red-600 text-white px-3 py-1 rounded"
            >
                Delete
            </button>

        </form>

    </div>

</div>

@endforeach

@endsection