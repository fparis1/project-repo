@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="stil1">
                <div class="card-header">Svi komentari</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <form method="get" action="{{ route('products.index')}} ">
                                <input type="submit" value="Nazad" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card" id="stil1">
                <div class="card-body">
                    
                    <a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-secondary">Novi komentar</a>
                    
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="card" id="stil1">
                <div class="card-body">
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                </div>
            </div>
            @endif
            <div class="card" id="stil1">
                <div class="card-body">
                    
        <table class="table table-bordered" id="stil1">
            <tr>
            <th>Redni br.</th>
            <th>Ime i Prezime</th>
            <th>Komentar</th>
            <th>Radnje</th>
        </tr>
        <?php $counter = 0; ?>
      @foreach($comments as $com)
      @if ($com->name == $comment->name)
      <?php $counter += 1; ?>
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $com->person }}</td>
            <td>{{ $com->comment }}</td>
            <td>
            <form action="{{ route('comments.destroy',$com->id) }}" method="POST">

                    @csrf
                    @method('DELETE')
      
                    <input type="submit" value="Izbriši" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endif
    @endforeach   
    </table>
    <?php if ($counter == 0) {
        echo 'Trenutno nema nikakvih komentara';
    } ?>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection