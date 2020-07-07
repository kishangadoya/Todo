<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<meta name=description content="">
	<meta name=viewport content="width=device-width, initial-scale=1">

	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/868e67284b.js" crossorigin="anonymous"></script>
	<style>
		@media(max-width: 575.98px)
		{
		    .mobile-w-auto{
		    	width: auto!important;
		    }
		
	</style>

 	 @livewireStyles
	<title>Todos</title>
</head>
<body>
	<div class="text-center flex justify-center pt-10">
		<div class="w-1/3 mobile-w-auto border border-gray-400 rounded py-4">
			@yield('content')
		</div>
	</div>

	    @livewireScripts

</body>
</html>


