<!DOCTYPE html>
<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <nav class="bg-white shadow">

        <div class="max-w-6xl mx-auto px-8 py-4 flex gap-6">

            <a
                href="{{ route('recitals.index') }}"
                class="font-semibold text-blue-600 hover:text-blue-800"
            >
                Recitals
            </a>

            <a
                href="{{ route('presale-orders.index') }}"
                class="font-semibold text-blue-600 hover:text-blue-800"
            >
                Presales
            </a>

            <a
                href="{{ route('door-sales.index') }}"
                class="font-semibold text-blue-600 hover:text-blue-800"
            >
                Door Sales
            </a>

            <a
                href="{{ route('check-in.index') }}"
                class="font-semibold text-green-600 hover:text-green-800"
            >
                Check-In
            </a>

        </div>

    </nav>

    <div class="max-w-6xl mx-auto p-8">

        @yield('content')

    </div>

</body>

</html>