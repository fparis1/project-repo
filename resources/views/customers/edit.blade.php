@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Izmjena korisnika</div>
            </div>
            <div class="card">
                <div class="card-body">
                <a href="{{ route('customers.index') }}" class="poveznica2">Povratak</a>
                </div>
            </div>
            @if ($errors->any())
        <div>
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
            @endif
            <div class="card">
                <div class="card-body">
                <form action="{{ route('customers.update',$customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                <strong>Ime</strong>
                    <input type="text" name="first_name" value="{{ $customer->first_name }}" placeholder="Ime">
                </div>
                <div>
                <strong>Prezime</strong>
                    <input type="text" name="surname" value="{{ $customer->surname }}" placeholder="Prezime">
                </div>
                <div>
                <strong>Email</strong>
                <input type="text" name="email" value="{{ $customer->email }}" placeholder="Email">
                </div>
                <div>
                <strong>Broj telefona</strong>
                <input type="text" name="phone" value="{{ $customer->phone }}" placeholder="+385...">
                </div>
                  <div>

                    <input type="submit" value="Pošalji">

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection