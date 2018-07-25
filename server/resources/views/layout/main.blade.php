<!DOCTYPE html>
<html>
<head>
	<title>GoEnglish Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	@include('inc.nav')
	<div class="container">	
		
		@yield('content')
	</div>
</body>
</html>