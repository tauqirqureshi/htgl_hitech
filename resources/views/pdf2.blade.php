<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Visiting Card</title>
    <style>
	@media print {
  body {-webkit-print-color-adjust: exact!important;color-adjust: exact !important;margin-top:0px;  }
}
@page {
    margin-left: 0px;
    margin-right: 0px;
    margin-top: 0px;
    margin-bottom: 0px;
    margin: 0;
    -webkit-print-color-adjust: exact;
}



@page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
    width: 210mm;
    height: 297mm;
  }
  /* ... the rest of the rules ... */
}

.card-header{display:flex;background:#eac664}
.card-header-inner-left{width:15%;margin-top:15px;margin-left:20px;}
img.htl-left-logo{height:40px;width:40px;}

.card-header-inner-center{width:45%;margin-top:15px;text-align:center;}
.htc-main-line-text{font-size:20px;font-weight:bold;font-family:ui-rounded;}
.htc-second-line-text{font-size:10px;font-weight:normal;}
.htc-third-line-text{font-size:8px;font-weight:normal;}

.card-header-inner-right{width:15%;margin-top:15px;}
img.htl-right-logo{height:40px;width:40px;margin-left:30px;}
.htc-right-www-text{margin-top:-15px;font-size:10px;}

p.count-number{display:none;}


.card {width:356px;height:262px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
			padding:10px;
}

		
		.card-box-area{float:left;}
		.card.card-odd{float:left;}

.card-second-header-center {
    text-align: center;
    font-weight: bold;
}

        .certificate-no{font-size:10px;font-weight:bold;margin-top:0px;text-align:right;}		


        .footer .certificate-no {
            font-weight: bold;
            text-align: center;
        }
        .gem-name-outer{
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom:35px;
			background-color:#eac664;
        }		
		.gem-name-inner{margin-bottom:20px;}



		.details{padding-left:20px;display:inline-block;float:left;width:50%;}
        .details table {
            width: 100%;
            border-collapse: collapse;
            /* margin-bottom: 5px; */
        }
        .details th, .details td {
            padding: 1px;
			padding-left:5px;
        }
        .details th {
            text-align: left;
            /* background-color: #f0f0f0; */
            font-size: 10px;
            font-weight: normal;
        }
        .details td {
            /* text-align: left;
            background-color: #f0f0f0; */
            font-size: 10px;
        }


		
        .side-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 5px;
        }
        .side-content .qrcode img, .side-content .image img {
            width: 80px;
            height: 80px;
            border-radius: 5px;

        }
		
        .imagedev{
    display: inline-block;
    flex-direction: row;
    padding: 0px;
    margin: 0;
    flex-wrap: nowrap;
    justify-content: space-between;
}		
    </style>
</head>
<body>
<div class="page">
    @if(isset($message))
			<p>{{ $message }}</p>
	 @endif
    {{-- @foreach ($users as $ticket)
    <p>This is user {{ $user->id }}</p>
@endforeach --}}
     @if(isset($ticketsWithUrls))
	 <p class="count-number">{{$count=0;}}</p>
	<div class="card-box-area">
		@foreach ($ticketsWithUrls as $tickets)

			<div class="card {{(++$count%2 ? 'card-odd' : 'card-even')}}">
				<div class="card-header">
					<div class="card-header-inner-left">
						<img class="htl-left-logo" src="{{ asset('storage/image/HTGL_left_logo.png') }}" alt="HTC Left Logo">
					</div>

					<div class="card-header-inner-center">
						<div class="htc-main-line-text">HTGL</div>
						<div class="htc-second-line-text">Hi Tech Gem Lab</div>
						<div class="htc-third-line-text">Gemstone Identification Report</div>
					</div>
					
					<div class="card-header-inner-right">
						<img class="htl-right-logo" src="{{ asset('storage/image/HTL_right_logo_icon.png') }}" alt="HTC Right Logo">
						<div class="htc-right-www-text">www.hitechgemlab.com</div>
					</div>

				</div>
				<div class="card-second-header">
					<div class="card-second-header-center">Tested for www.CrystalHeaven.in</div>
				</div>

				<div class="card-main-content">
					<!--<div class="tested-for">Tested for <a href="https://www.CrystalHeaven.in">www.CrystalHeaven.in</a></div>-->
					<div class="imagedev">
						<div class="details">
							<table>
							
								@if($tickets->product->indian_name)
								<tr>
									<th>Indian Name</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->indian_name }}</td>
								</tr>
								@endif							
							
								@if($tickets->product->species)
								<tr>
									<th>Species</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->species }}</td>
								</tr>
								@endif	
								
								@if($tickets->product->color)
								<tr>
									<th>Colour</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->color }}</td>
								</tr>
								@endif


								@if($tickets->product->shape)
								<tr>
									<th>Shape</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->shape }}</td>
								</tr>
								@endif

								@if($tickets->product->size)
								<tr>
									<th>Size</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->size }}</td>
								</tr>
								@endif

								@if($tickets->product->weight)
								<tr>
									<th>Weight</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->weight }}</td>
								</tr>
								@endif
								
								@if($tickets->product->ri)
								<tr>
									<th>R.I</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->ri }}</td>
								</tr>
								@endif
								
								@if($tickets->product->sg)
								<tr>
									<th>S.G</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->sg }}</td>
								</tr>
								@endif

								@if($tickets->product->hardness)
								<tr>
									<th>Hardness</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->hardness }}</td>
								</tr>
								@endif
								
								@if($tickets->product->making)
								<tr>
									<th>Making</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->making }}</td>
								</tr>
								@endif


								@if($tickets->product->xrays)
								<tr>
									<th>X-Rays</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->xrays }}</td>
								</tr>
								@endif

								@if($tickets->product->natural_face)
								<tr>
									<th>Natural Face</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->natural_face }}</td>
								</tr>
								@endif

								@if($tickets->product->treatment)
								<tr>
									<th>Treatment</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->treatment }}</td>
								</tr>
								@endif

								@if($tickets->product->inclusion)
								<tr>
									<th>Inclusion</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->inclusion }}</td>
								</tr>
								@endif
								
						

								@if($tickets->product->stone_name)
								<tr>
									<th>Stone Name</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->stone_name }}</td>
								</tr>
								@endif

								@if($tickets->product->comment)
								<tr>
									<th>Comment</th>
									<td class="double-dot">:</td>
									<td>{{ $tickets->product->comment }}</td>
								</tr>
								@endif



							</table>
						</div>
						<div class="side-content">
							<div class="image">
								 <img src="{{ asset('storage/'.$tickets->product->image) }}" alt="5 Mukhi Rudraksha">
							</div>
							<div class="qrcode">
								<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(256)->generate( $tickets->url)) !!} ">
								 {{-- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/QR_code_Wikimedia_Commons_%28URL%29.png/600px-QR_code_Wikimedia_Commons_%28URL%29.png?20110116110901" alt="QR Code"> --}}
							</div>
						</div>
						<div class="certificate-no">
							Certificate No. : {{ $tickets->certificate_no }}
						</div>						
					</div>
				</div>
				<div class="gem-name-outer">
					<div class="gem-name-inner">{{ $tickets->product->name }}</div>
				</div>
			</div>
		@endforeach
	</div>
    @endif


</div>
</body>
</html>