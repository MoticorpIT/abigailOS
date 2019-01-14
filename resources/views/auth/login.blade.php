<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>abigailOS</title>

	<meta name="description" content="When you need to know something, ask Abigail.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow">

	{{-- Font Awesome --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/main.css">
</head>

<body class="login-page">
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="container-fluid top-nav-bar shadow">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg">
					<a class="navbar-brand" href="#">abigail<strong>OS</strong></a>
				</nav>
			</div>
		</div>
	</div> <!-- container top-nav-bar -->

	<div class="container-fluid main-content">
		<div class="row main-content-row">
			<div class="content col-12">
				<div class="content-area">
					<div class="db-boxes-row row">
						<div class="db-box">
								@include('layouts.errors')
								<form action="" method="post" class="form form-login">
									@csrf

									<div class="form-group">
										<label for="email" class="d-none">
											Email
										</label>
										<div class="input-group">
							        <input id="email" type="email" name="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" placeholder="Email" required autofocus>
											<div class="input-group-append">
							          <div class="input-group-text">
							          	<i class="fas fa-user"></i>
							          </div>
							        </div>
							      </div> <!-- input group -->
									</div> <!-- form group -->

									<div class="form-group">
										<label for="password" class="d-none">
											Password
										</label>
										<div class="input-group">
							        <input id="password" type="password" name="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" placeholder="Password" required>
											<div class="input-group-append">
							          <div class="input-group-text">
							          	<i class="fas fa-unlock-alt"></i>
							          </div>
							        </div>
							      </div> <!-- input group -->
									</div> <!-- form group -->

									<div class="form-group">
										<input type="submit" value="Log in" class="btn btn-info btn-block">
									</div> <!-- form group -->
								</form>
							</div> <!-- db box -->
							<blockquote class="tagline db-box">
								When you need to know something, just ask Abigail.
							</blockquote>
					</div> <!-- db box -->
				</div> <!-- content area -->
			</div>
		</div>
	</div> <!-- main content -->

</body>
</html>
