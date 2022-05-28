@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Glavna stranica</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Pozdrav
                    <strong><?php echo Auth::user()->name; ?></strong>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="./products" method="get">
                    <button type="submit" class="btn">Svi ticketi</button>
                    </form>
                    @if (Auth::user()->type == 'agent')
                    <form action="./customers" method="get">
                    <button type="submit" class="btn">Svi korisnici</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
