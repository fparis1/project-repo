@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="stil1">

                <div class="card-body">
                    <h2>New comment</h2>
                  </div>
                  </div>
                  <div class="card" id="stil1">
                        <div class="card-body">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Return</a>
                        </div>
                  </div>
                  <div class="card" id="stil1">
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
                        <input type="text" name="person" value="<?php echo Auth::user()->name;?>" readonly>    
                  </div>
                  <div>
                        <label>Comment</label>
                         <textarea name="comment"></textarea>

                  </div>
                  <div>

                        <input type="submit" value="Submit" class="btn btn-primary">

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
