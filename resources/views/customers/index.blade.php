@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Svi korisnici</div>

                
                    @if (session('status'))
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    

                </div>
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    
                    <a href="{{ route('customers.create') }}" class="poveznica2">Novi korisnik</a>
                    
                </div>
            </div>
                @if ($message = Session::get('success'))
                <div class="card">
                <div class="card-body">
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                </div>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    
                <table class="table table-bordered">
            <tr>
            <th>Redni br.</th>
            <th>@sortablelink('first_name', 'Ime i Prezime')</th>
            <th>@sortablelink('email', 'email')</th>
            <th>@sortablelink('phone', 'Broj telefona')</th>
            <th>Radnje</th>
        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $customer->first_name }} {{ $customer->surname }}
                <br><a href="{{ route('cards.show',$customer->id) }}">Ticketi korisnika</a>
            </td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>
                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
   
                    <a  href="{{ route('customers.show',$customer->id) }}" class="poveznica2" id="show">Pokaži</a>
    
                    <a  href="{{ route('customers.edit',$customer->id) }}" class="poveznica2" id="edit">Izmjeni</a>
   
                    @csrf
                    @method('DELETE')
      
                    <input type="submit" value="Izbriši">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $customers->appends(\Request::except('page'))->render() !!}  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection