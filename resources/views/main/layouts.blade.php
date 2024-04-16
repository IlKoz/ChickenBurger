<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<title>@yield('title')</title>
</head>
<body>
	@include('main.header')
	{{-- <div class="wrapper"> --}}
	@yield('content')
	@include('main.footer')
	{{-- </div> --}}
</body>
</html>