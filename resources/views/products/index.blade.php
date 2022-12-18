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
            <h3 class="card-title">Svi ticketi</h3>
                <?php if (Auth::user()->name == NULL) {
                            return view('home');
                        } ?>
                <?php if(Auth::user()->type == 'agent'): ?>
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Novi ticket</a>
                <?php endif; ?>
        </left>
    </div>
</div>
@if (Auth::user()->type == 'agent')
<div class="container">
   
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2" ><p class="btn btn-light">@sortablelink('person', 'Ime korisnika')</p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2" ><p class="btn btn-light">@sortablelink('name', 'Naziv ticketa')</p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2" ><p class="btn btn-light">@sortablelink('description', 'Opis')</p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2" ><p class="btn btn-light">@sortablelink('status', 'Status')</p></div>
            </div>
        </div>
    
</div>
@endif
@if (Auth::user()->type == 'agent')
@foreach ($products as $product)

<div class="container">
    <div class="card" id="stil1">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong id="sizeOfFont">Ime korisnika:</strong><br><br>{{ $product->person }}</div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong id="sizeOfFont">Naziv ticketa:</strong><br><br>{{ $product->name }}</div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera"><strong id="sizeOfFont">Opis ticketa:</strong><br><br>{{ $product->description }}</div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera3"><strong id="sizeOfFont">Status:</strong><br><br><p class="
                    @if($product->status == 'otvoren')
                        {{ 'td-text-green' }}
                    @elseif($product->status == 'zaduzen')
                        {{ 'td-text-yellow' }}
                    @elseif($product->status == 'zatvoren')
                        {{ 'td-text-red' }}
                    @endif"><?php if($product->status == 'zaduzen') {
                                        echo 'zadužen';
                                    }else {
                                        echo "$product->status";
                                    } ?>
                    </p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera2"><strong id="sizeOfFont">Radnje:</strong><br><br>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a  href="{{ route('products.show',$product->id) }}" class="btn btn-info" id="razmak">Pokaži</a>
                        @if (Auth::user()->type == 'tech')
                            @if ($product->status == 'zatvoren')
                                <span class="disable-links"><a  href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Izmjeni</a></span>
                            @else
                                <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Izmjeni</a>
                            @endif
                        @else
                            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Izmjeni</a>
                        @endif
                        <?php if(Auth::user()->type == 'agent'): ?>

                            @csrf
                            @method('DELETE')
      
                            <input class="btn btn-danger" id="razmak" type="submit" value="Izbriši">
                        <?php endif; ?>
                    </form>
                
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera2"><strong id="sizeOfFont">Komentari:</strong><br><br>
                    <a href="{{ route('comments.show',$product->id) }}" class="btn btn-dark" id="razmak">Komentari</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="container" id="stil2">
    <div class="card-body">
    {!! $products->appends(Request::except('page'))->render() !!}
        <p>
            Displaying {{$products->count()}} of {{ $products->total() }} product(s).
        </p>
    </div>
</div>

@else



@endif

@endsection