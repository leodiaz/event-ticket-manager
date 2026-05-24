<h1>Create Recital</h1>

<form action="{{ route('recitals.store') }}" method="POST">
    @csrf

    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>Event Date</label>
        <input type="date" name="event_date">
    </div>

    <div>
        <label>Location</label>
        <input type="text" name="location">
    </div>

    <div>
        <label>Ticket Price</label>
        <input type="number" step="0.01" name="ticket_price">
    </div>

    <div>
        <label>Additional Info</label>
        <textarea name="additional_info"></textarea>
    </div>

    <button type="submit">
        Save Recital
    </button>
</form>