@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white p-6 rounded shadow">

        <h1 class="text-3xl font-bold mb-6">
            Check-In Result
        </h1>

        @if($order)

            <p>
                <strong>Order:</strong>
                {{ $order->order_number }}
            </p>

            <p>
                <strong>Customer:</strong>
                {{ $order->customer_name }}
            </p>

            <p>
                <strong>Event:</strong>
                {{ $order->recital->name }}
            </p>

            <p>
                <strong>Tickets:</strong>
                {{ $order->ticket_quantity }}
            </p>

            <p>
                <strong>Status:</strong>

                @if($order->is_used)

                    <span class="text-red-600 font-bold">
                        Already Used
                    </span>

                @else

                    <span class="text-green-600 font-bold">
                        Valid Ticket
                    </span>

                @endif

            </p>

            @if(!$order->is_used)

                <form
                    action="{{ route('check-in.validate', $order) }}"
                    method="POST"
                    class="mt-6"
                >

                    @csrf

                    <button
                        type="submit"
                        class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700"
                    >
                        Validate Ticket
                    </button>

                </form>

            @endif

        @else

            <p class="text-red-600 font-bold">
                Ticket not found.
            </p>

        @endif

    </div>

</div>

@endsection