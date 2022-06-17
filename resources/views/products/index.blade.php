@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Svi ticketi</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <?php if (Auth::user()->name == NULL) {
                return view('home');
            } ?>
            <?php if(Auth::user()->type == 'agent'): ?>
                    
                    <a href="{{ route('products.create') }}" class="poveznica2">Novi ticket</a>
                
            <?php endif; ?>
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
            <th>Ime korisnika</th>
            <th>@sortablelink('name', 'Naziv ticketa')</th>
            <th>@sortablelink('description', 'Opis')</th>
            <th>@sortablelink('status', 'Status')</th>
            <th>Radnje</th>
        </tr>
        <?php $check = 0; ?>
        @foreach ($products as $product)
        @if (Auth::user()->type == 'tech')
        @if ($product->tech == Auth::user()->name)
        <?php $check += 1; ?>
        <tr>
            <td>{{ ++$i }}</td>
            <td><?php 
                foreach($customers as $customer): ?>
                  <?php  if ($customer->id == $product->person): ?>
                     {{ $customer->first_name }} {{ $customer->surname }}<br>
                     <?php endif; ?>
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
                  <?php  if ($customer->id == $product->person): ?>
                     {{ $customer->first_name }} {{ $customer->surname }}<br>
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
                    
                    <a  href="{{ route('products.show',$product->id) }}" class="poveznica2" id="show">Pokaži</a>
                    @if (Auth::user()->type == 'tech')
                            @if ($product->status == 'zatvoren')
                            <span class="disable-links"><a  href="{{ route('products.edit',$product->id) }}" class="poveznica2" id="edit">Izmjeni</a></span>
                            @else
                            <a  href="{{ route('products.edit',$product->id) }}" class="poveznica2" id="edit">Izmjeni</a>
                            @endif
                    @else
                    <a  href="{{ route('products.edit',$product->id) }}" class="poveznica2" id="edit">Izmjeni</a>
                    @endif
                    <?php if(Auth::user()->type == 'agent'): ?>

                    @csrf
                    @method('DELETE')
      
                    <input type="submit" value="Izbriši">
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

    {!! $products->appends(\Request::except('page'))->render() !!} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection