@extends('layouts.app')
  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prikaz pojedinog ticketa</div>
            </div>
            <div class="card">
                <div class="card-body">
                <a href="{{ route('customers.index') }}" class="poveznica2">Povratak</a>
                </div>

            </div>
            <div class="card">
                <div class="card-body">
                <div>
                <strong>Ime:</strong><br>
                {{ $customer->first_name }}
                </div>
                <hr>
                <div>
                <strong>Prezime</strong><br>
                {{ $customer->surname }}
                </div>
                <hr>
                <div>
                <strong>Email:</strong><br>
                {{ $customer->email }}
                </div>
                <hr>
                <div>
                <strong>Broj telefona:</strong><br>
                {{ $customer->phone }}
                </div>
                </div>

            </div>
        </div>    
    </div>
@endsection