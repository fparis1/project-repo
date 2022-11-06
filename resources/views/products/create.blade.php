@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <h2>Novi upit</h2>
                  </div>
                  </div>
                  <div class="card">
                        <div class="card-body">
                        <a href="{{ route('products.index') }}" class="poveznica2">Povratak</a>
                        </div>
                  </div>
                  <div class="card">
                <div class="card-body">
                <div class="container">

                @if ($errors->any())
                  <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                              <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                              </ul>
                  </div>
                  @endif
                  
                <form method="POST" action="{{ route('products.store') }}">

                @csrf
                  <div>
                  <label>Ime korisnika:</label>
                  <select class="form-control" name="person">
                        @foreach ($customers as $customer)
                              <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                        @endforeach
                  </select>
                  <a href="./../buyers">Novi korisnik</a>
                  </div>
                  <br>
                  <div>
                        <label>Agent:</label>
                         <input type="text" name="user" placeholder="agent" value="<?php echo Auth::user()->name; ?>" readonly>

                  </div>
                  <div>
                        <label>Naziv ticketa</label>
                         <input type="text" name="name" placeholder="Naziv ticketa">

                  </div>
                  <div>
                        <label >Opis</label>
                         <textarea name="description" placeholder="Opis"></textarea>

                   </div>
                   <div>
                  <label>Tehničar na kojeg se zadužuje:</label>
                       <select class="form-control" name="tech">
                             @foreach ($users as $user)
                              @if ($user->type == "tech")
                             <option value="{{ $user->name }}">{{ $user->name }}</option>
                              @endif
                             @endforeach
                  </div>
                   Status:
                   <div>
                        <input type="radio" name="status" value="otvoren" checked="checked"> <label>Otvoren</label><br>
                        <input type="radio" name="status" value="zaduzen"> <label>Zadužen</label><br>
                        <input type="radio" name="status" value="zatvoren"> <label>Zatvoren</label>
                  </div>
                  <br>
                  <input type="hidden" name="comment" value="|">
                  <div>
                        <input type="submit" value="Pošalji">

                  </div>

                  </form>  

                  </div>   
                  
                  </div>
                </div>
               
            </div>
            
        </div>
    </div>
</div>

@endsection
