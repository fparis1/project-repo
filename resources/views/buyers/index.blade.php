@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <h2>Novi korisnik</h2>
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
                  
                <form method="POST" action="{{ route('buyers.store') }}">

                @csrf
                  <div>
                        <label>Ime</label>
                        <input type="text" name="first_name" placeholder="Ime">    
                  </div>
                  <div>
                        <label>Prezime</label>
                         <input type="text" name="surname" placeholder="Prezime">

                  </div>
                  <div>
                        <label>Email</label>
                        <input type="text" name="email" placeholder="email">

                   </div>
                   <label>Broj telefona</label>
                   <div>
                        <input type="text" name="phone" placeholder="+385...">
                        
                  </div>
                  <br>
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
