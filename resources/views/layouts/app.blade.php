<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Application</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-white text-xl font-bold">CRM Application</a>
            <ul class="flex space-x-6">
                <li><a href="{{ route('contacts.index') }}" class="text-white hover:text-gray-200">Contacts</a></li>
                <li><a href="{{ route('interactions.index') }}" class="text-white hover:text-gray-200">Interactions</a>
                </li>
                <li><a href="{{ route('sales.index') }}" class="text-white hover:text-gray-200">Sales</a></li>
                <li><a href="{{ route('reports.index') }}" class="text-white hover:text-gray-200">Reports</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow container mx-auto py-8">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 p-4 text-center text-gray-300 mt-8">
        <div class="container mx-auto">
            <p>CRM Application &copy; {{ date('Y') }}. All rights reserved.</p>
            <p class="text-sm mt-1">Designed with ❤️ by Frans Sebastian</p>
        </div>
    </footer>
</body>

</html>
