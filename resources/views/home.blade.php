@extends('layouts.app')

@section('content')

<div class="text-center mb-10">

    <h1 class="text-5xl font-bold text-gray-800">
        🎟️ GigPass
    </h1>

    <p class="text-gray-600 mt-3">
        Event Ticket Management System
    </p>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <a
        href="{{ route('recitals.index') }}"
        class="bg-white p-8 rounded shadow hover:shadow-lg transition text-center"
    >
        <h2 class="text-2xl font-bold">
            🎵 Recitals
        </h2>

        <p class="text-gray-600 mt-2">
            Manage your events.
        </p>
    </a>

    <a
        href="{{ route('presale-orders.index') }}"
        class="bg-white p-8 rounded shadow hover:shadow-lg transition text-center"
    >
        <h2 class="text-2xl font-bold">
            🎟️ Presales
        </h2>

        <p class="text-gray-600 mt-2">
            Manage presale tickets.
        </p>
    </a>

    <a
        href="{{ route('door-sales.index') }}"
        class="bg-white p-8 rounded shadow hover:shadow-lg transition text-center"
    >
        <h2 class="text-2xl font-bold">
            🚪 Door Sales
        </h2>

        <p class="text-gray-600 mt-2">
            Register tickets sold at the venue.
        </p>
    </a>

    <a
        href="{{ route('check-in.index') }}"
        class="bg-white p-8 rounded shadow hover:shadow-lg transition text-center"
    >
        <h2 class="text-2xl font-bold">
            ✅ Check-In
        </h2>

        <p class="text-gray-600 mt-2">
            Validate tickets at the entrance.
        </p>
    </a>

</div>

@endsection