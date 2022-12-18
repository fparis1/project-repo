@extends('layouts.app')
  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card" id="stil1">
                <div class="card-header">Prikaz pojedinog ticketa</div>
            </div>
            <div class="card" id="stil1">
                <div class="card-body">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Povratak</a>
                </div>

            </div>
            <div class="card" id="stil1">
                <div class="card-body">
                <div>
                <strong>Agent:</strong><br>
                {{ $product->user }}
                </div>
                <hr>
                <div>
                <strong>Korisnik:</strong><br>
                {{ $product->person }}
                </div>
                <hr>
                
                <div>
                <strong>Naziv ticketa:</strong><br>
                {{ $product->name }}
                </div>
                <hr>
                <div>
                <strong>Opis:</strong><br>
                {{ $product->description }}
                </div>
                <hr>
                <div>
                <strong>Status:</strong><br>
                {{ $product->status }}
                </div>
                <hr>
                <div>
                <strong>Tehničar:</strong><br>
                {{ $product->tech }}
                </div>
                </div>

            </div>
        </div>    
    </div>
@endsection