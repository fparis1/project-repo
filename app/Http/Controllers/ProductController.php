<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageCreated;

  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::sortable()->paginate(5);
        $customers = Customer::all();
        return view('products.index',compact('products', 'customers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $product = new Product();
        $users = User::all();
        return view('products.create', compact('product', 'customers', 'users'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'person' => 'required',
            'name' => 'required',
            'description' => 'required',
            'tech' => 'required',
        ]);
      
        Product::create($request->all());
       
        return redirect()->route('products.index')
                        ->with('success','Uspješno stvaranje novog ticketa.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $customers = Customer::all();
        return view('products.show',compact('product', 'customers'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $customers = Customer::all();
        $users = User::all();
        return view('products.edit',compact('product', 'customers', 'users'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'user' => 'required',
            'person' => 'required',
            'name' => 'required',
            'description' => 'required',
            'tech' => 'required',
            
        ]);
        $product->update($request->all());
       
        Mail::send(new MessageCreated($product));

        return redirect()->route('products.index')
                        ->with('success','Uspješno ažuriran ticket.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
       
        return redirect()->route('products.index')
                        ->with('success','Uspješno izbrisan ticket.');
    }
}