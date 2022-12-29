@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="stil1">

                <div class="card-body">
                    <h2>New ticket</h2>
                  </div>
                  </div>
                  <div class="card" id="stil1">
                        <div class="card-body">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Return</a>
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
                  
                <form method="POST" action="{{ route('products.store') }}">

                @csrf
                  <div>
                  <label>Customer name:</label>
                  <select class="form-control" name="person">
                        @foreach ($customers as $customer)
                              <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                        @endforeach
                  </select>
                  <a href="./../buyers" class="btn btn-secondary">New customer</a>
                  </div>
                  <br>
                  <div>
                        <label>Agent:</label>
                         <input type="text" name="user" placeholder="agent" value="<?php echo Auth::user()->name; ?>" readonly>

                  </div>
                  <div>
                        <label>Ticket name</label>
                         <input type="text" name="name" placeholder="Ticket name">

                  </div>
                  <div>
                        <label>Description</label>
                         <textarea name="description" placeholder="Description"></textarea>

                   </div>
                   <div>
                  <label>Tehnician in charge of ticket:</label>
                       <select class="form-control" name="tech">
                             @foreach ($users as $user)
                              @if ($user->type == "tech")
                             <option value="{{ $user->name }}">{{ $user->name }}</option>
                              @endif
                             @endforeach
                  </div>
                   Status:
                   <div>
                        <input type="radio" name="status" value="otvoren" checked="checked"> <label>Open</label><br>
                        <input type="radio" name="status" value="zaduzen"> <label>Assigned</label><br>
                        <input type="radio" name="status" value="zatvoren"> <label>Closed</label>
                  </div>
                  <br>
                  <input type="hidden" name="comment" value="|">
                  <div>
                        <input type="submit" value="Pošalji" class="btn btn-primary">

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
