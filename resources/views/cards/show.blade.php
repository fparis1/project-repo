@extends('layouts.app')
  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prikaz svih ticketa pojedninih korisnika</div>
            </div>
            <div class="card">
                <div class="card-body">
                <a href="{{ route('customers.index') }}" class="poveznica2">Povratak</a>
                </div>

            </div>
            <div class="card">
                <div class="card-body">
                    <div>
                    <strong>Korisnik:</strong><br>
                    {{ $card->first_name}} {{ $card->surname }}
                    </div>
                    <br><br>
                <table class="table table-bordered">
            <tr>
            <th>Redni br.</th>
            <th>Agent</th>
            <th>Naziv ticketa</th>
            <th>Opis</th>
            <th>Status</th>
        </tr>
        <?php $check = 0; ?>
        @foreach ($prods as $prod)
        <tr>
            @if ($card->id == $prod->person)
            <?php $check += 1; ?>
            <td>{{ ++$i }}</td>
            <td>{{ $prod->user }}</td>
            <td>{{ $prod->name }}</td>
            <td>{{ $prod->description }}</td>
            <td><div
                    class="
                @if($prod->status == 'otvoren')
                    {{ 'td-text-green' }}
                @elseif($prod->status == 'zaduzen')
                    {{ 'td-text-yellow' }}
                @elseif($prod->status == 'zatvoren')
                    {{ 'td-text-red' }}
                @endif"
            ><strong>{{ $prod->status }}</strong></div></td>
           
            @endif
        </tr>
        @endforeach
    </table>
    <?php if ($check == 0) {
        echo 'Trenutno nema ticketa.';
    } ?>
            </div>
            
        </div>    
    </div>
@endsection