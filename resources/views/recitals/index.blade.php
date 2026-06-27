@extends('layouts.app')

@section('content')

<div class="mb-6">
    <h1 class="text-3xl font-bold">
        Recitals
    </h1>

    <p class="text-gray-600">
        Manage your events and ticket sales.
    </p>
</div>

<div class="mb-6">
    <a
        href="{{ route('recitals.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
    >
        Create Recital
    </a>
</div>

<div class="space-y-4">

    @foreach($recitals as $recital)

        <div class="bg-white p-5 rounded shadow">

            <div class="flex justify-between items-start">

                <div>
                    <a href="{{ route('recitals.show', $recital) }}"class="bg-green-600 text-white px-3 py-1 rounded">Ver</a>
                    <h2 class="text-xl font-semibold">
                        {{ $recital->name }}
                        
                    </h2>

                    <p class="text-gray-600">
                        📅 {{ $recital->event_date }}
                    </p>

                    <p class="text-gray-600">
                        📍 {{ $recital->location }}
                    </p>

                    <p class="font-medium mt-2">
                        ${{ $recital->ticket_price }}
                    </p>

                </div>

                <div class="flex gap-2">

                    <a
                        href="{{ route('recitals.edit', $recital) }}"
                        class="bg-yellow-500 text-white px-3 py-1 rounded"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('recitals.destroy', $recital) }}"
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