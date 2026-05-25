@extends('layouts.app')

@section('content')

<div class="mb-6">
    <h1 class="text-3xl font-bold">
        Presale Orders
    </h1>

    <p class="text-gray-600">
        Manage presale ticket orders.
    </p>
</div>

<div class="mb-6">
    <a
        href="{{ route('presale-orders.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
    >
        Create Order
    </a>
</div>

<div class="space-y-4">

    @foreach($orders as $order)

        <div class="bg-white p-5 rounded shadow">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="text-xl font-semibold">
                        {{ $order->customer_name }}
                    </h2>

                    <p class="text-gray-600">
                        Event: {{ $order->recital->name }}
                    </p>

                    <p class="text-gray-600">
                        Email: {{ $order->customer_email }}
                    </p>

                    <p>
                        Tickets: {{ $order->ticket_quantity }}
                    </p>

                    <p class="font-medium">
                        Total: ${{ $order->total_amount }}
                    </p>

                </div>

                <div class="flex gap-2">

                    <a
                        href="{{ route('presale-orders.edit', $order) }}"
                        class="bg-yellow-500 text-white px-3 py-1 rounded"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('presale-orders.destroy', $order) }}"
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

        </div>

    @endforeach

</div>

@endsection