@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="stil1">
                <div class="card-header">Izmjena korisnika</div>
            </div>
            <div class="card" id="stil1">
                <div class="card-body">
                <a href="{{ route('customers.index') }}" class="btn btn-primary">Povratak</a>
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
            <div class="card" id="stil1">
                <div class="card-body">
                <form action="{{ route('customers.update',$customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                <strong>Ime i Prezime</strong>
                    <input type="text" name="name" value="{{ $customer->name }}" placeholder="Ime i Prezime">
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

                    <input type="submit" value="Pošalji" class="btn btn-primary">

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection