@component('mail::message')

# Your ticket has been changed

@component('mail::table')
| Agent   | Ime ticketa    | Opis ticketa      | Status         | Tehničar |
| :------------------- | :------------------- | :-------------------------- | :-------------------- | :-------------------- |
| {{ $product->user }} | {{ $product->name }} | {{ $product->description }} | {{ $product->status}} | {{ $product->tech}} |
   

@endcomponent
Pozdrav,<br>
{{ Auth::user()->name }}
@endcomponent
