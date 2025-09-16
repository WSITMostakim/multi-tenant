<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 min-h-screen flex flex-col">
	<header class="bg-green-700 text-white p-4 shadow">
		<div class="container mx-auto flex justify-between items-center">
			<h1 class="text-2xl font-bold">Tenant Panel</h1>
			<nav>
				<a href="#" class="ml-4 hover:underline">Dashboard</a>
				<a href="#" class="ml-4 hover:underline">My Account</a>
				<a href="#" class="ml-4 hover:underline">Support</a>
			</nav>
		</div>
	</header>
	<main class="flex-1 container mx-auto p-6">
		@yield('content')
	</main>
	<footer class="bg-green-700 text-white text-center p-4 mt-auto">
		&copy; {{ date('Y') }} Tenant Panel
	</footer>
</body>
</html>
