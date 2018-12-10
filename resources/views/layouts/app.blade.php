<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<head>
	@include('layouts.head')
</head>

<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="container-fluid top-nav-bar shadow">
		@include('layouts.header')
	</div> <!-- container top-nav-bar -->

	<div class="container-fluid main-content">
		<div class="row main-content-row">
			<div class="sidebar">
				@include('layouts.sidebar')
			</div>
			<div class="content">
				@include('layouts.progressbar')
				@yield('content')
			</div>
		</div>
	</div> <!-- main content -->

	@include('layouts.modals')
	@include('layouts.scripts')

</body>
</html>
