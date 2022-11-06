@extends('layouts.app')

@section('content')
<!--
        <?php $check = 0; ?>
        @foreach ($products as $product)
        @if (Auth::user()->type == 'tech')
        @if (Auth::user()->name == $product->tech)
        <?php $check += 1; ?>
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->person }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td><div
                    class="
                @if($product->status == 'otvoren')
                    {{ 'td-text-green' }}
                @elseif($product->status == 'zaduzen')
                    {{ 'td-text-yellow' }}
                @elseif($product->status == 'zatvoren')
                    {{ 'td-text-red' }}
                @endif"
            ><strong>{{ $product->status }}</strong></div></td>
            <td>&nbsp<br>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    
                    <a  href="{{ route('products.show',$product->id) }}" class="poveznica2" id="show">Pokaži</a>
                   
                            @if ($product->status == 'zatvoren')
                            <span class="disable-links"><a  href="{{ route('products.edit',$product->id) }}" class="poveznica2" id="edit">Izmjeni</a></span>
                            @else
                            <a  href="{{ route('products.edit',$product->id) }}" class="poveznica2" id="edit">Izmjeni</a>
                            @endif
                    
                    
                </form>
                <br>&nbsp
            </td>
            <td><a href="{{ route('comments.show',$product->id) }}">Komentari</a></td>
            
        </tr>
        @endif
        @else
        <tr>
            <td>{{ ++$i }}</td>
            <td><?php 
                foreach($customers as $customer): ?>
                  <?php  if ($customer->name == $product->person): ?>
                    {{ $product->person }}<br>
                        <?php if(Auth::user()->type == 'agent'): ?>
                        <a  href="{{ route('buyers.show',$customer->id) }}">Detalji</a>
                        <?php endif ;?>
                        <?php endif ;?>
                   

                <?php endforeach; ?>
                
               
                
                    </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td><div
                    class="
                @if($product->status == 'otvoren')
                    {{ 'td-text-green' }}
                @elseif($product->status == 'zaduzen')
                    {{ 'td-text-yellow' }}
                @elseif($product->status == 'zatvoren')
                    {{ 'td-text-red' }}
                @endif"
            ><strong>{{ $product->status }}</strong></div></td>
            <td>&nbsp<br>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    
                    <a  href="{{ route('products.show',$product->id) }}" class="btn btn-info mr-1" id="razmak">Pokaži</a>
                    @if (Auth::user()->type == 'tech')
                            @if ($product->status == 'zatvoren')
                            <span class="disable-links"><a  href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Izmjeni</a></span>
                            @else
                            <a  href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Izmjeni</a>
                            @endif
                    @else
                    <a  href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Izmjeni</a>
                    @endif
                    <?php if(Auth::user()->type == 'agent'): ?>

                    @csrf
                    @method('DELETE')
      
                    <input class="btn btn-danger" id="razmak" type="submit" value="Izbriši">
                    <?php endif; ?>
                </form>
                <br>&nbsp
            </td>
            <td><a href="{{ route('comments.show',$product->id) }}">Komentari</a></td>
            
        </tr>
        @endif
        @endforeach
    </table>
    <?php if (Auth::user()->type == 'tech') {
        if ($check == 0) {
            echo "Trenutno nema zaduženih ticketa";
        }
    }
    ?>

                </div>
            </div>
        </div>
    </div>
</div> 

-----------------------------------------------------------------------------------
-->

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
                <div class="col-6 col-sm-4 col-md-3 col-lg-3" ><p class="btn btn-link">@sortablelink('person', 'Ime korisnika')</p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-3" ><p class="btn btn-link">@sortablelink('name', 'Naziv ticketa')</p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-3" ><p class="btn btn-link">@sortablelink('description', 'Opis')</p></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-3" ><p class="btn btn-link">@sortablelink('status', 'Status')</p></div>
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
            <div class="col-6 col-sm-4 col-md-3 col-lg-2" ><strong>Ime korisnika:</strong><br>{{ $product->person }}</div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong>Naziv ticketa:</strong><br>{{ $product->name }}</div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera"><strong>Opis ticketa:</strong><br>{{ $product->description }}</div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera3"><strong>Status:</strong><br><p class="
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
            <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera2"><strong>Radnje:</strong><br>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a  href="{{ route('products.show',$product->id) }}" class="btn btn-info" id="razmak">Pokaži</a>
                    @if (Auth::user()->type == 'tech')
                            @if ($product->status == 'zatvoren')
                            <span class="disable-links"><a  href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Izmjeni</a></span>
                            @else
                            <a  href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Izmjeni</a>
                            @endif
                    @else
                    <a  href="{{ route('products.edit',$product->id) }}" class="btn btn-warning" id="razmak">Izmjeni</a>
                    @endif
                    <?php if(Auth::user()->type == 'agent'): ?>

                    @csrf
                    @method('DELETE')
      
                    <input class="btn btn-danger" id="razmak" type="submit" value="Izbriši">
                    <?php endif; ?>
                </form>
                
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2"><hr id="provjera2"><strong>Komentari:</strong><br>
                <a href="{{ route('comments.show',$product->id) }}" class="btn btn-secondary" id="razmak">Komentari</a>
        </div>
    </div>
</div>
</div>
</div>
<br>
@endforeach
@else

@endif
@if (Auth::user()->type == 'agent')
    {!! $products->appends(\Request::except('page'))->render() !!}
    @endif

@endsection