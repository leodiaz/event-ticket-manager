<h1>Edit Recital</h1>

<form action="{{ route('recitals.update', $recital) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Name</label>
        <input
            type="text"
            name="name"
            value="{{ $recital->name }}"
        >
    </div>

    <div>
        <label>Event Date</label>
        <input
            type="date"
            name="event_date"
            value="{{ $recital->event_date }}"
        >
    </div>

    <div>
        <label>Location</label>
        <input
            type="text"
            name="location"
            value="{{ $recital->location }}"
        >
    </div>

    <div>
        <label>Ticket Price</label>
        <input
            type="number"
            step="0.01"
            name="ticket_price"
            value="{{ $recital->ticket_price }}"
        >
    </div>

    <div>
        <label>Additional Info</label>
        <textarea name="additional_info">{{ $recital->additional_info }}</textarea>
    </div>

    <button type="submit">
        Update Recital
    </button>
</form>