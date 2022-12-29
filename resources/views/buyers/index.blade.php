@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="stil1">

                <div class="card-body">
                    <h2>New cutomers</h2>
                  </div>
                  </div>
                  <div class="card" id="stil1">
                        <div class="card-body">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Return</a>
                        </div>
                  </div>
                  <div class="card" id="stil1">
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
                        <label>Name and Surname</label>
                         <input type="text" name="name" placeholder="Name and Surname">

                  </div>
                  <div>
                        <label>Email</label>
                        <input type="text" name="email" placeholder="email">

                   </div>
                   <label>Phone number</label>
                   <div>
                        <input type="text" name="phone" placeholder="+385...">
                        
                  </div>
                  <br>
                  <div>

                        <input type="submit" value="Submit" class="btn btn-primary">

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
