@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="stil1">
                <div class="card-header">Ticket edit</div>
            </div>
            <div class="card" id="stil1">
                <div class="card-body">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Return</a>
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
                <strong>Customer name:</strong>
                @if (Auth::user()->type == 'agent')
                <select class="form-control" name="person">
                        @foreach ($customers as $customer)
                            @if ($customer->name == $product->person)
                              <option selected value="{{ $product->person }}">{{ $product->person }}</option>
                            @else
                            <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                            @endif
                        @endforeach
                  </select>
                @else
                <select class="form-control" name="person">
                              <option selected value="{{ $product->person }}">{{ $product->person }}</option>
                           
                  </select>
                @endif
                </div>
                <div>
                <strong>Ticket name:</strong>
                   @if (Auth::user()->type == 'agent')
                   <input type="text" name="name" value="{{ $product->name }}" placeholder="Naziv ticketa">
                   @else
                   <input type="text" name="name" value="{{ $product->name }}" placeholder="Naziv ticketa" readonly>
                   @endif
                </div>
                <div>
                <strong>Description:</strong>
                @if (Auth::user()->type == 'agent')
                <textarea name="description" placeholder="Detail">{{ $product->description }}</textarea>
                @else
                <textarea name="description" placeholder="Detail" readonly>{{ $product->description }}</textarea>
                @endif
                </div>
                <strong>Status:</strong>
                  <div>
                        <input type="radio" name="status" value="otvoren" {{$product->status == 'otvoren' ? 'checked' : ''}}><label>Open</label><br>
                        <input type="radio" name="status" value="zaduzen" {{$product->status == 'zaduzen' ? 'checked' : ''}}> <label>In charge</label><br>
                        <input type="radio" name="status" value="zatvoren" {{$product->status == 'zatvoren' ? 'checked' : ''}}> <label>Closed</label>
                  </div>
                  <div>
                      <br>
                    <div>
                    <strong>Technician:</strong>
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
                    <input type="submit" value="Submit" class="btn btn-primary">

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection