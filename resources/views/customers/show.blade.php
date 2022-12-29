@extends('layouts.app')
  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card" id="stil1">
                <div class="card-header">View of an individual customer</div>
            </div>
            <div class="card" id="stil1">
                <div class="card-body">
                <a href="{{ route('customers.index') }}" class="btn btn-primary">Return</a>
                </div>

            </div>
            <div class="card" id="stil1">
                <div class="card-body">
                <div>
                <strong>Name and surname</strong><br>
                {{ $customer->name }}
                </div>
                <hr>
                <div>
                <strong>Email:</strong><br>
                {{ $customer->email }}
                </div>
                <hr>
                <div>
                <strong>Phone number:</strong><br>
                {{ $customer->phone }}
                </div>
                </div>

            </div>
        </div>    
    </div>
@endsection