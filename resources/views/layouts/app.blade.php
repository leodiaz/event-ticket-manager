<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="max-w-6xl mx-auto p-8">
        @yield('content')
    </div>

    

</body>
</html>