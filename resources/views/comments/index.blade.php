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
            <h3 class="card-title">All comments</h3>
                <?php if (Auth::user()->name == NULL) {
                            return view('home');
                        } ?>
                    <a href="{{ route('products.index')}}" class="btn btn-secondary">Return</a>
        </left>
    </div>
    <div class="card-body">
        <left>
            <a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-primary">New comment</a>
        </left>
    </div>
</div>
<?php $counter = 0; ?>
@foreach($comments as $com)
@if ($com->name == $comment->name)                   
      <?php $counter += 1; ?>
        <div class="container">
            <div class="card" id="stil1">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong id="sizeOfFont">Name and Surname:</strong><br><br>{{ $com->person }}<hr id="provjera"></div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong id="sizeOfFont">Comment:</strong><br><br>{{ $com->comment }}<hr id="provjera"></div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2"><strong id="sizeOfFont">Actions:</strong><br><br>
                            <form action="{{ route('comments.destroy',$com->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif
@endforeach 

<div class="container" id="stil2">
    <div class="card-body">
    <?php if ($counter == 0) { 
                echo 'Currently there are no comments';
               } ?> 
    </div>
    
</div>

@endsection