@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Glavna stranica</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Pozdrav
                    <strong><?php echo Auth::user()->name; ?></strong>
                </div>
            </div>
                    <div class="random">
                    <strong><center>Did you know?</center></strong>
                    <hr>
                    <br>
                        {{ $random->text }}
                    </div>
                
        </div>
    </div>
</div>
@endsection
