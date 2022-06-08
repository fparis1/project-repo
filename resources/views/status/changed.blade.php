@component('mail::message')

# Status of your ticket has been changed

@component('mail::table')
| Agent   | Ime ticketa    | Opis ticketa      | Status         | Tech |
| :------------------- | :------------------- | :-------------------------- | :-------------------- | :-------------------- |
| {{ $product->user }} | {{ $product->name }} | {{ $product->description }} | {{ $product->status}} | {{ $product->tech}} |
   

@endcomponent
Pozdrav,<br>
{{ Auth::user()->name }}
@endcomponent
