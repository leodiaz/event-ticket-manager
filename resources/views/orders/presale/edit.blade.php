@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Edit Presale Order
</h1>

<form
    action="{{ route('presale-orders.update', $presaleOrder) }}"
    method="POST"
    class="bg-white p-6 rounded shadow space-y-4"
>
    @csrf
    @method('PUT')

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
                    {{ $presaleOrder->recital_id == $recital->id ? 'selected' : '' }}
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
            value="{{ $presaleOrder->customer_name }}"
            class="border rounded w-full p-2"
        >
    </div>

    <div>
        <label class="block mb-1">
            Customer Email
        </label>

        <input
            type="email"
            name="customer_email"
            value="{{ $presaleOrder->customer_email }}"
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
            value="{{ $presaleOrder->ticket_quantity }}"
            class="border rounded w-full p-2"
        >
    </div>

    <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
    >
        Update Order
    </button>

</form>

@endsection