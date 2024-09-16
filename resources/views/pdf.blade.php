<!DOCTYPE html>
<html>
<head>
    <title>Gemstone Identification Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #50a3a2;
            margin-bottom: 30px;
        }
        p {
            margin-bottom: 10px;
        }
        .image-container {
            text-align: center;
            margin-top: 30px;
        }
        .image-container img {
            width: 50%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $record->product->name }}</h1>
        <p><strong>Colour:</strong>{{ $record->product->color }}<div style="background-color: {{ $record->product->color }}; width: 10px; height: 10px;">
        </div> </p>
        <p><strong>Weight:</strong> {{ $record->product->weight }}</p>
        <p><strong>Shape:</strong> {{ $record->product->shape }}</p>
        <p><strong>R. I:</strong> {{ $record->product->ri }} </p>
        <p><strong>S. G:</strong> {{ $record->product->sg }}</p>
        <p><strong>Hardness:</strong> {{ $record->product->hardless }}</p>
        <p><strong>Micro Obs.:</strong>{{ $record->product->micro_obs }}</p>
        <p><strong>Comment:</strong> {{ $record->product->comment }} </p>
        <p><strong>Certificate No.:</strong> {{ $record->certificate_no }}</p>
        <div class="image-container">
            {{-- {{$record->QR }} --}}
            {{-- {!! QrCode::size(250)->generate('www.google.com'); !!} --}}
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(256)->generate($record->redirectUrl)) !!} ">
            
            {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(256)->generate('https://google.com')) !!} "> --}}
            {{-- {{ QrCode::generate('Make me into a QrCode!'); }} --}}
            {{-- {{ $record->QR }} --}}
            {{-- {{ $record->QRImage }} --}}
        </div>
        <div class="image-container">
            <img src="{{ asset('storage/'.$record->product->image) }}" alt="Gemstone Image">
        </div>
    </div>
</body>
</html>
