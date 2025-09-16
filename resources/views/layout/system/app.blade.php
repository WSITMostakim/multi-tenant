<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    @php
        $links = [
            ['url' => '#', 'label' => 'Dashboard'],
            ['url' => '#', 'label' => 'Plans'],
            ['url' => '#', 'label' => 'Tenants'],
            ['url' => '#', 'label' => 'Users'],
            ['url' => '#', 'label' => 'Settings'],
        ];
    @endphp
    <x-header :title="'System Panel'" :links="$links" :bg="'#f8fafc'" :color="'#2563eb'" />
    <main class="flex-1 container mx-auto p-6">
        @yield('content')
    </main>
    <footer class="bg-blue-700 text-white text-center p-4 mt-auto">
        &copy; {{ date('Y') }} System Panel
    </footer>
</body>
</html>
