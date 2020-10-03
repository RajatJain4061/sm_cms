<!DOCTYPE html>
<html>
<head>
	<title>@yield('title') - {{ config('app.name') }}</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container">
		@yield('content')
	</div>
</body>
</html>
<script type="text/javascript" src="{{ url('assets/js/bootstrap.min.js') }}"></script>