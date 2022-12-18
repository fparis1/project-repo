@extends('layouts.app')

@section('content')

<div class="container" id="stil2">
    @if ($message = Session::get('success'))
        <div class="card" id="stil1">
            <div class="card-body">
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif
<div class="card-body">
    <left>
        <h3 class="card-title">Svi korisnici</h3>
            <?php if (Auth::user()->name == NULL) {
                        return view('home');
                    } ?>
            <?php if(Auth::user()->type == 'agent'): ?>
                <a href="{{ route('customers.create') }}" class="btn btn-primary">Novi korisnik</a>
            <?php endif; ?>
    </left>
  </div>
</div>
@if (Auth::user()->type == 'agent')

<div class="container">
   
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2" ><p class="btn btn-light">@sortablelink('name', 'Ime i Prezime')</p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2" ><p class="btn btn-light">@sortablelink('email', 'email')</p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2" ><p class="btn btn-light">@sortablelink('phone', 'Broj telefona')</p></div>
            </div>
        </div>
    
</div>

@foreach ($customers as $customer)

<div class="container">
    <div class="card" id="stil1">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-3"><strong id="sizeOfFont">Ime i Prezime:</strong><br><br>{{ $customer->name }}</div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-3"><strong id="sizeOfFont">Email:</strong><br><br>{{ $customer->email }}</div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-3"><hr id="provjera"><strong id="sizeOfFont">Broj telefona:</strong><br><br>{{ $customer->phone }}</div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-3"><hr id="provjera3"><strong id="sizeOfFont">Radnje:</strong><br><br>
                    <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                        <a  href="{{ route('customers.show',$customer->id) }}" class="btn btn-info" id="razmak">Pokaži</a>
                        <a  href="{{ route('customers.edit',$customer->id) }}" class="btn btn-warning" id="razmak">Izmjeni</a>
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" id="razmak" type="submit" value="Izbriši">
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="container" id="stil2">
    <div class="card-body">
    {!! $customers->appends(Request::except('page'))->render() !!}
        <p>
            Displaying {{$customers->count()}} of {{ $customers->total() }} customer(s).
        </p>
    </div>
</div>

@endif

@endsection