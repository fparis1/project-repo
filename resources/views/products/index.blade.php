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
            <h3 class="card-title">All tickets</h3>
                <?php if (Auth::user()->name == NULL) {
                            return view('home');
                        } ?>
                <?php if(Auth::user()->type == 'agent'): ?>
                    <a href="{{ route('products.create') }}" class="btn btn-secondary">New ticket</a>
                <?php endif; ?>
        </left>
    </div>
</div>
@if (Auth::user()->type == 'agent')
<div class="container">
   
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2" ><p class="btn btn-light">@sortablelink('person', 'Customer name')</p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2" ><p class="btn btn-light">@sortablelink('name', 'Ticket name')</p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2" ><p class="btn btn-light">@sortablelink('description', 'Description')</p></div>
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
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong id="sizeOfFont">Customer name:</strong><br><br>{{ $product->person }}</div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong id="sizeOfFont">Ticket name:</strong><br><br>{{ $product->name }}</div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera"><strong id="sizeOfFont">Ticket description:</strong><br><br>{{ $product->description }}</div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera3"><strong id="sizeOfFont">Status:</strong><br><br><p class="
                    @if($product->status == 'otvoren')
                        {{ 'td-text-green' }}
                    @elseif($product->status == 'zaduzen')
                        {{ 'td-text-yellow' }}
                    @elseif($product->status == 'zatvoren')
                        {{ 'td-text-red' }}
                    @endif"><?php if ($product->status == 'otvoren') {
                    echo 'Open';
                    }
                    else if ($product->status == 'zaduzen') {
                        echo 'Assigned';
                    }
                    else {
                        echo 'Closed';
                    } ?>
                    </p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera2"><strong id="sizeOfFont">Actions:</strong><br><br>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a  href="{{ route('products.show',$product->id) }}" class="btn btn-info" id="razmak">Show</a>
                        @if (Auth::user()->type == 'tech')
                            @if ($product->status == 'zatvoren')
                                <span class="disable-links"><a  href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Edit</a></span>
                            @else
                                <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Edit</a>
                            @endif
                        @else
                            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Edit</a>
                        @endif
                        <?php if(Auth::user()->type == 'agent'): ?>

                            @csrf
                            @method('DELETE')
      
                            <input class="btn btn-danger" id="razmak" type="submit" value="Delete">
                        <?php endif; ?>
                    </form>
                
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera2"><strong id="sizeOfFont">Comments:</strong><br><br>
                    <a href="{{ route('comments.show',$product->id) }}" class="btn btn-dark" id="razmak">Comments</a>
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