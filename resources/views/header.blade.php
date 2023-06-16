<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todo Laravel</title>
	@vite('resources/css/app.css')
</head>

<body class="container mx-auto pt-3 px-[2rem] lg:px-[5rem] bg-slate-200">
	@auth
	<nav class="flex justify-end border-b border-b border-indigo-700 p-2 text-blue-500">
		<a href="/logout">logout</a>
	</nav>
	@endauth
	<main class="mt-[4rem]">
		@yield('content')
	</main>
</body>