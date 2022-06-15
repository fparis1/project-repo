@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Izmjena ticketa</div>
            </div>
            <div class="card">
                <div class="card-body">
                <a href="{{ route('products.index') }}" class="poveznica2">Povratak</a>
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
                <form action="{{ route('products.update',$product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                <div>
                <strong>Agent</strong>
                @if (Auth::user()->type == 'agent')
                <select class="form-control" name="user">
                        @foreach ($users as $user)
                           @if ($user->type == 'agent')
                           @if ($user->name == $product->user)
                              <option selected value="{{ $user->name }}">{{ $user->name }}</option>
                            @else
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endif
                           @endif
                        @endforeach
                  </select> 
                @else
                <select class="form-control" name="user">
                        @foreach ($users as $user)
                        @if ($user->type == 'agent')
                            @if ($user->name == $product->user)
                              <option selected value="{{ $user->name }}">{{ $user->name }}</option>
                            @endif
                            @endif
                        @endforeach
                  </select>
                @endif
                </div>
                <strong>Ime korisnika:</strong>
                @if (Auth::user()->type == 'agent')
                <select class="form-control" name="person">
                        @foreach ($customers as $customer)
                            @if ($customer->id == $product->person)
                              <option selected value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->surname }}</option>
                            @else
                            <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->surname }}</option>
                            @endif
                        @endforeach
                  </select>
                @else
                <select class="form-control" name="person">
                        @foreach ($customers as $customer)
                            @if ($customer->id == $product->person)
                              <option selected value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->surname }}</option>
                            @endif
                        @endforeach
                  </select>
                @endif
                </div>
                <div>
                <strong>Ime ticketa:</strong>
                   @if (Auth::user()->type == 'agent')
                   <input type="text" name="name" value="{{ $product->name }}" placeholder="Naziv ticketa">
                   @else
                   <input type="text" name="name" value="{{ $product->name }}" placeholder="Naziv ticketa" readonly>
                   @endif
                </div>
                <div>
                <strong>Opis:</strong>
                @if (Auth::user()->type == 'agent')
                <textarea name="description" placeholder="Detail">{{ $product->description }}</textarea>
                @else
                <textarea name="description" placeholder="Detail" readonly>{{ $product->description }}</textarea>
                @endif
                </div>
                <strong>Status:</strong>
                  <div>
                        <input type="radio" name="status" value="otvoren" {{$product->status == 'otvoren' ? 'checked' : ''}}><label>Otvoren</label><br>
                        <input type="radio" name="status" value="zaduzen" {{$product->status == 'zaduzen' ? 'checked' : ''}}> <label>Zadužen</label><br>
                        <input type="radio" name="status" value="zatvoren" {{$product->status == 'zatvoren' ? 'checked' : ''}}> <label>Zatvoren</label>
                  </div>
                  <div>
                      <br>
                    <div>
                    <strong>Tehničar:</strong>
                    @if (Auth::user()->type == 'tech')
                    <select class="form-control" name="tech">
                        @foreach ($users as $user)
                        @if ($user->type == 'tech')
                        @if ($user->name == $product->tech)
                              <option selected value="{{ $user->name }}">{{ $user->name }}</option>
                         @endif
                        @endif
                        @endforeach
                  </select>
                  
                    @else
                    <select class="form-control" name="tech">
                        @foreach ($users as $user)
                        @if ($user->type == 'tech')
                            @if ($user->name == $product->tech)
                              <option selected value="{{ $user->name }}">{{ $user->name }}</option>
                            @else
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endif
                        @endif
                        @endforeach
                  </select>
                    @endif
                    </div>
                    <br>
                    <input type="submit" value="Pošalji">

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection