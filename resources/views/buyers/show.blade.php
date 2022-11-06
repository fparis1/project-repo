@extends('layouts.app')
  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prikaz pojedinog korisnika</div>
            </div>
            <div class="card">
                <div class="card-body">
                <a href="{{ route('products.index') }}" class="poveznica2">Povratak</a>
                </div>

            </div>
            <div class="card">
                <div class="card-body">
                <div>
                <strong>Ime i Prezime</strong><br>
                {{ $buyer->name }}
                </div>
                <hr>
                <div>
                <strong>Email:</strong><br>
                {{ $buyer->email }}
                </div>
                <hr>
                <div>
                <strong>Broj telefona:</strong><br>
                {{ $buyer->phone }}
                </div>
                </div>

            </div>
        </div>    
    </div>
@endsection