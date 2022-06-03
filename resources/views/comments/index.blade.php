@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Svi komentari</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <form method="get" action="./../products">
                                <input type="submit" value="Nazad">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    
                    <a href="{{ route('comments.edit',$comment->id) }}" class="poveznica2">Novi komentar</a>
                    
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    
        <table class="table table-bordered">
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
      
                    <input type="submit" value="Izbriši">
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