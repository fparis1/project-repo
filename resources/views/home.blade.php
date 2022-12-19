@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="stil1">
                <div class="card-header">Glavna stranica</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Pozdrav
                    <strong style="font-size:large;"><?php echo Auth::user()->name; ?></strong>
                </div>
            </div>
                    <div class="random" id="stil2">
                    <strong><center>Did you know?</center></strong>
                    <hr>
                    <br>
                        <center>{{ $random->text }}</center>
                    </div>
                
        </div>
    </div>
</div>
@endsection
