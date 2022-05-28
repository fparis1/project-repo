<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;

use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $card)
    {
        $prods = Product::all();
        return view('cards.show',compact('card', 'prods'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
