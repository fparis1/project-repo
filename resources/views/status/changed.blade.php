<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="../resources/css/create.css" rel="stylesheet">
    <link href="../../resources/css/create.css" rel="stylesheet">
    <link href="../../../resources/css/create.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
</head>
<body>
   
<div class="container">
    <div class="card" id="stil1">
        <div class="card-body">
            <div class="row justify-content-center">
                <br><center><div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong>Ime agenta:</strong><br>{{ $product->user }}</div></center><hr>
                <center><div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong>Naziv ticketa:</strong><br>{{ $product->name }}</div></center><hr>
                <center><div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong>Opis ticketa:</strong><br>{{ $product->description }}</div></center><hr>
                <center><div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong>Status:</strong><br>{{ $product->status }}</div></center><hr>
                <center><div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong>Ime tehničara:</strong><br>{{ $product->tech }}</div></center><hr>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body" style="margin-left: 10px;">
            <br>Pozdrav,<br>
            {{ Auth::user()->name }}
        </div>
    </div>
</div>
    
</body>
</html>
