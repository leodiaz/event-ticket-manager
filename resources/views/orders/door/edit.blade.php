@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6"> Edit Door Sale </h1>

<form action="{{ route('door-sales.update', $doorSale) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4" > @csrf @method('PUT')

<div>
    <label class="block mb-1">
        Recital
    </label>

    <select
        name="recital_id"
        class="border rounded w-full p-2"
    >
        @foreach($recitals as $recital)

            <option
                value="{{ $recital->id }}"
                {{ $doorSale->recital_id == $recital->id ? 'selected' : '' }}
            >
                {{ $recital->name }}
            </option>

        @endforeach
    </select>
</div>

<div>
    <label class="block mb-1">
        Customer Name
    </label>

    <input
        type="text"
        name="customer_name"
        value="{{ $doorSale->customer_name }}"
        class="border rounded w-full p-2"
    >
</div>

<div>
    <label class="block mb-1">
        Ticket Quantity
    </label>

    <input
        type="number"
        name="ticket_quantity"
        value="{{ $doorSale->ticket_quantity }}"
        class="border rounded w-full p-2"
    >
</div>

<div>
    <label class="block mb-1">
        Payment Method
    </label>

    <select
        name="payment_method"
        class="border rounded w-full p-2"
    >
        <option
            value="cash"
            {{ $doorSale->payment_method == 'cash' ? 'selected' : '' }}
        >
            Cash
        </option>

        <option
            value="transfer"
            {{ $doorSale->payment_method == 'transfer' ? 'selected' : '' }}
        >
            Transfer
        </option>
    </select>
</div>

<button
    type="submit"
    class="bg-blue-600 text-white px-4 py-2 rounded"
>
    Update Sale
</button>

</form>

@endsection