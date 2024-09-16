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
	</style>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
			<div class="row justify-content-center mb-3">
				<div class="col-md-6 col-xl-6">		
					<a class="navbar-brand" href="https://hitechgemlab.com/">
						<img src="{{ asset('storage/image/HTGL_left_logo.png') }}" alt="" width="100" height="100">
						
					</a>
					<div class="htgl-left-logo-text">
						<a class="navbar-brand" href="https://hitechgemlab.com/"><span>Hi Tech Gem Lab</span></a>
					</div>
				</div>
				<div class="col-md-6 col-xl-6">		
					<ul class="menu-links">
						<li>
							<a class="navbar-brand" href="https://hitechgemlab.com/">Home</a>
						</li>
						<li>
							<a class="navbar-brand" href="https://hitechgemlab.com/">Contact us</a>
						</li>						
					</ul>
				</div>				
			</div>	
        </div>
    </nav>
	<div class="container">
		<div class="row justify-content-center mb-3">
			<div class="card me-2 col-md-3 col-xl-3">
				{{-- <h5 class="card-header">Featured</h5> --}}
				<div class="card-body ">
					{{-- <h5 class="card-title">Certificte Number </h5> --}}
					<form class="d-block" action='{{URL::to('/search')}}'  method="POST" role='search'>
						{{ csrf_field() }}
						<input class="form-control me-2" type="search" name="search" placeholder="Search Certificte number here ..." aria-label="Search"><br />
						<button class="btn btn-outline-success" type="submit">Search</button>
					</form>
				</div>
			</div>
			<div class="card col-md-9 col-xl-9">
				@if(isset($query))
				<h5 class="card-header">Your Certificate  <b> {{ $query }} <b> is certified.</h5>
				@endif
				<div class="card-body">
					<section style="background-color: #fff;">
						<div class="container py-5">
							@if(isset($details))
							@foreach($details as $ticket)
						  <div class="row justify-content-center mb-3">
							<div class="col-md-12 col-xl-10">
							  <div class="card-inner shadow-0 rounded-3">
								<div class="card-second-header">
									<div class="card-second-header-center">Tested for www.CrystalHeaven.in</div>
								</div>
								<div class="card-body">
								  <div class="row">

									<div class="col-md-6 col-lg-6 col-xl-6">
									  <h5>{{$ticket->product->name}}</h5>
									  <div class="d-flex flex-row">
										<div class="text-danger mb-1 me-2">
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										</div>
										<span></span>
									  </div>
									  <div class="mt-1 mb-0 text-muted large">
											<table>
											
												@if($ticket->product->indian_name)
												<tr>
													<th>Indian Name</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->indian_name }}</td>
												</tr>
												@endif							
											
												@if($ticket->product->species)
												<tr>
													<th>Species</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->species }}</td>
												</tr>
												@endif	
												
												@if($ticket->product->color)
												<tr>
													<th>Colour</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->color }}</td>
												</tr>
												@endif


												@if($ticket->product->shape)
												<tr>
													<th>Shape</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->shape }}</td>
												</tr>
												@endif

												@if($ticket->product->size)
												<tr>
													<th>Size</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->size }}</td>
												</tr>
												@endif

												@if($ticket->product->weight)
												<tr>
													<th>Weight</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->weight }}</td>
												</tr>
												@endif
												
												@if($ticket->product->ri)
												<tr>
													<th>R.I</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->ri }}</td>
												</tr>
												@endif
												
												@if($ticket->product->sg)
												<tr>
													<th>S.G</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->sg }}</td>
												</tr>
												@endif

												@if($ticket->product->hardness)
												<tr>
													<th>Hardness</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->hardness }}</td>
												</tr>
												@endif
												
												@if($ticket->product->making)
												<tr>
													<th>Making</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->making }}</td>
												</tr>
												@endif


												@if($ticket->product->xrays)
												<tr>
													<th>X-Rays</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->xrays }}</td>
												</tr>
												@endif

												@if($ticket->product->natural_face)
												<tr>
													<th>Natural Face</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->natural_face }}</td>
												</tr>
												@endif

												@if($ticket->product->treatment)
												<tr>
													<th>Treatment</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->treatment }}</td>
												</tr>
												@endif

												@if($ticket->product->inclusion)
												<tr>
													<th>Inclusion</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->inclusion }}</td>
												</tr>
												@endif
												
										

												@if($ticket->product->stone_name)
												<tr>
													<th>Stone Name</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->stone_name }}</td>
												</tr>
												@endif

												@if($ticket->product->comment)
												<tr>
													<th>Comment</th>
													<td class="double-dot"> : </td>
													<td>{{ $ticket->product->comment }}</td>
												</tr>
												@endif



											</table>
									  </div>
										<!--<div class="mb-2 text-muted small"></div>
									  <p class="text-truncate mb-4 mb-md-0">
										{{$ticket->product->comment}}
									  </p>-->
									</div>

									<div class="col-md-6 col-lg-6 col-xl-6 mb-4 mb-lg-0">
									  <div class="bg-image hover-zoom ripple rounded ripple-surface">

										  <img src="{{ asset('storage/'.$ticket->product->image) }}"
										  class="w-250" style="width:400px" />

										{{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp"
										  class="w-100" /> --}}
										<a href="#!">
										  <div class="hover-overlay">
											<div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
										  </div>
										</a>
									  </div>
									  
										<h6 class="text-success">Certificate Number</h6>
										<div class="d-flex flex-row align-items-center mb-1">
											<h4 class="mb-1 me-1">{{$ticket->certificate_no}} </h4>
											<span class="text-danger"><s></s></span>
										</div>
										
									</div>

									

								  </div>
								</div>
							  </div>
							</div>
						  </div>
						  @endforeach
						  @elseif(isset($message))
							<p>{{ $message }}</p>
							@else
								<p>Welcome to Hi Tech Lab, your premier destination for Crystal & Gemstones, Rudraksha and Sphatik testing. Located in Khambhat, we aim to stand one of the leading and most reliable laboratories in India. Our commitment to excellence is backed by ISO 9001:2008 certification, ensuring that every Gemstone, Rudraksha bead and Sphatik is tested with precision and authenticity.</p>
								<p>With over 5 years of dedicated experience with gemstone industry, Hi Tech Lab has built a reputation for providing top-notch testing services. Our state-of-the-art facility is equipped with the latest technology and by a qualified gemologists. We are dedicated to delivering accurate and dependable results, offering peace of mind with every certification.</p>
								<p>Hi Tech Lab offers comprehensive testing for all types of Rudraksha beads, Sphatik and Gemstones, including Coral, Sapphire, Emerald, Ruby, Moonstone, and Diamonds. Our rigorous testing process guarantees the authenticity and quality of each item, supported by detailed reports that you can verify through our website.</p>
								<p>In an industry where imitations and synthetic treatments are prevalent, Hi Tech Lab provides an independent, unbiased, and expert opinion you can trust. Whether you are a collector, jeweler, or gemstone enthusiast, you can rely on our professional services for all your testing needs. Choose Hi Tech Lab for unparalleled accuracy and assurance in Gemstone, Sphatik and Rudraksha testing.</p>
							@endif	
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>

	<div class="container footer-container">
		<div class="row justify-content-center mb-3">
			Copyright © 2024 Hi Tech Gem Lab. All Rights Reserved.
		</div>
	</div>		

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>