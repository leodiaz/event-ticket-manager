@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Edit Recital
</h1>

<form
    action="{{ route('recitals.update', $recital) }}"
    method="POST"
    class="bg-white p-6 rounded shadow space-y-4"
>
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1">Name</label>

        <input
            type="text"
            name="name"
            value="{{ $recital->name }}"
            class="border rounded w-full p-2"
        >
    </div>

    <div>
        <label class="block mb-1">Event Date</label>

        <input
            type="date"
            name="event_date"
            value="{{ $recital->event_date }}"
            class="border rounded w-full p-2"
        >
    </div>

    <div>
        <label class="block mb-1">Location</label>

        <input
            type="text"
            name="location"
            value="{{ $recital->location }}"
            class="border rounded w-full p-2"
        >
    </div>

    <div>
        <label class="block mb-1">Ticket Price</label>

        <input
            type="number"
            step="0.01"
            name="ticket_price"
            value="{{ $recital->ticket_price }}"
            class="border rounded w-full p-2"
        >
    </div>

    <div>
        <label class="block mb-1">Additional Info</label>

        <textarea
            name="additional_info"
            class="border rounded w-full p-2"
        >{{ $recital->additional_info }}</textarea>
    </div>

    <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded"
    >
        Update Recital
    </button>

</form>

@endsection