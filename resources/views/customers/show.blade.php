@extends('layouts.app')
  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card" id="stil1">
                <div class="card-header">Prikaz pojedinog korisnika</div>
            </div>
            <div class="card" id="stil1">
                <div class="card-body">
                <a href="{{ route('customers.index') }}" class="btn btn-primary">Povratak</a>
                </div>

            </div>
            <div class="card" id="stil1">
                <div class="card-body">
                <div>
                <strong>Ime i Prezime</strong><br>
                {{ $customer->name }}
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