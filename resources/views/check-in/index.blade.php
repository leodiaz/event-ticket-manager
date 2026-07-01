<form
    action="{{ route('check-in.search') }}"
    method="GET"
>

    <label class="block mb-2">
        Order Number
    </label>

    <input
        type="text"
        name="order_number"
        class="border rounded w-full p-2"
        placeholder="EA-000001"
        required
    >

    <button
        type="submit"
        class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
    >
        Check Ticket
    </button>

</form>