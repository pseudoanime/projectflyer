<!DOCTYPE html>
<html>
	<head>
		<title>Project Flyer</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="description" content="Demo project">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/app.css">
		<link rel="stylesheet" href="/css/libs.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
	</head>
	<body>
	   <nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="/">ProjectFlyer</a>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li class="active"><a href="#">Home</a></li>
	            <li><a href="#about">About</a></li>
	            <li><a href="#contact">Contact</a></li>
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
              <li><a href="/logout">Logout</a></li>
            </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

		<div class="container">
			@yield('content')
		</div>
	</body>
	<script type="text/javascript" src="/js/libs.js"></script>
	@yield('scripts.footer')
	@include('flash')
</html>