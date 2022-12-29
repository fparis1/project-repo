@extends('layouts.app')
  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card" id="stil1">
                <div class="card-header">View of individual tickets</div>
            </div>
            <div class="card" id="stil1">
                <div class="card-body">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Return</a>
                </div>

            </div>
            <div class="card" id="stil1">
                <div class="card-body">
                <div>
                <strong>Agent:</strong><br>
                {{ $product->user }}
                </div>
                <hr>
                <div>
                <strong>Customer:</strong><br>
                {{ $product->person }}
                </div>
                <hr>
                
                <div>
                <strong>Ticket name:</strong><br>
                {{ $product->name }}
                </div>
                <hr>
                <div>
                <strong>Description:</strong><br>
                {{ $product->description }}
                </div>
                <hr>
                <div>
                <strong>Status:</strong><br>
                <?php if ($product->status == 'otvoren') {
                    echo 'Open';
                    }
                    else if ($product->status == 'zaduzen') {
                        echo 'Assigned';
                    }
                    else {
                        echo 'Closed';
                    } ?>
                </div>
                <hr>
                <div>
                <strong>Technician:</strong><br>
                {{ $product->tech }}
                </div>
                </div>

            </div>
        </div>    
    </div>
@endsection