@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <h2>Novi komentar</h2>
                  </div>
                  </div>
                  <div class="card">
                        <div class="card-body">
                        <a href="./../2" class="poveznica2">Povratak</a>
                        </div>
                  </div>
                  <div class="card">
                <div class="card-body">
                <div class="container">

                @if ($errors->any())
                  <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                              <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                              </ul>
                  </div>
                  @endif
                  
                <form method="POST" action="{{ route('comments.store') }}">

                @csrf
                <div>
                        <input type="text" name="name" value="<?php echo $comment->name; ?>" readonly>

                   </div>
                  <div>
                        <label>Ime i prezime</label>
                        <input type="text" name="person" value="<?php echo Auth::user()->name;?>" readonly>    
                  </div>
                  <div>
                        <label>Komentar</label>
                         <textarea name="comment"></textarea>

                  </div>
                  <div>

                        <input type="submit" value="Pošalji">

                  </div>

                  </form>  

                  </div>   
                  
                  </div>
                </div>
               
            </div>
            
        </div>
    </div>
</div>

@endsection
