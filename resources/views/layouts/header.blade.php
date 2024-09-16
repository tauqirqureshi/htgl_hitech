<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hi Tech Gem Lab</title>
	<style>
	.btn-outline-success{width:100%;}
	.menu-links li{float:left;list-style:none;}
    .active {
        font-weight: bold;
        color: #454545cd; /* You can choose a color for active route */
    }
	</style>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
			<div class="row justify-content-center mb-3">
				<div class="col-md-6 col-xl-6">
					<a class="navbar-brand" href="{{ route('home') }}">
						<img src="{{ asset('storage/image/HTGL_left_logo.png') }}" alt="" width="100" height="100">

					</a>
					<div class="htgl-left-logo-text">
						<a class="navbar-brand" href="{{ route('home') }}"><span>Hi Tech Gem Lab</span></a>
					</div>
				</div>
				<div class="col-md-6 col-xl-6">
                    <div class="container">
					<ul class="menu-links">
						<li>
							<a class="navbar-brand {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
						</li>
						<li>
							<a class="navbar-brand {{ Route::is('verification') ? 'active' : '' }}" href="{{ route('verification') }}">Certificate verification</a>
						</li>
                        <li>
							<a class="navbar-brand {{ Route::is('terms') ? 'active' : '' }}" href="{{ route('terms') }}">Terms and Conditions</a>
						</li>
                        <li>
							<a class="navbar-brand {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">about us</a>
						</li>
                        <li>
							<a class="navbar-brand {{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact us</a>
						</li>
					</ul>
                    </div>
				</div>
			</div>
        </div>
    </nav>


