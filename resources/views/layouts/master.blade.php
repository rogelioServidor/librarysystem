<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
</head>
<body>
<div class="container">
	@include('includes.header')
	@yield('content')
</div>
</body>
</html>