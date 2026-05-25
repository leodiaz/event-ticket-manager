@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Create Recital
</h1>

<form
    action="{{ route('recitals.store') }}"
    method="POST"
    class="bg-white p-6 rounded shadow space-y-4"
>
    @csrf

    <div>
        <label class="block mb-1">Name</label>
        <input
            type="text"
            name="name"
            class="border rounded w-full p-2"
        >
    </div>

    <div>
        <label class="block mb-1">Event Date</label>
        <input
            type="date"
            name="event_date"
            class="border rounded w-full p-2"
        >
    </div>

    <div>
        <label class="block mb-1">Location</label>
        <input
            type="text"
            name="location"
            class="border rounded w-full p-2"
        >
    </div>

    <div>
        <label class="block mb-1">Ticket Price</label>
        <input
            type="number"
            step="0.01"
            name="ticket_price"
            class="border rounded w-full p-2"
        >
    </div>

    <div>
        <label class="block mb-1">Additional Info</label>
        <textarea
            name="additional_info"
            class="border rounded w-full p-2"
        ></textarea>
    </div>

    <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded"
    >
        Save Recital
    </button>

</form>

@endsection