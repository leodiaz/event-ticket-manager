<h1>Recitals</h1>

<a href="{{ route('recitals.create') }}">
    Create Recital
</a>

@foreach($recitals as $recital)
    <div>
        <h3>{{ $recital->name }}</h3>

        <p>{{ $recital->event_date }}</p>

        <p>{{ $recital->location }}</p>

        <p>${{ $recital->ticket_price }}</p>
    </div>
@endforeach