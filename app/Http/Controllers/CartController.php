<?php

namespace App\Http\Controllers;

use App\Product;
use App\CategoryProduct;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
 
    public function index()
    {
        $mightAlsoLike = Product::mightAlsoLike()->get();
        return view('pages.shoppingcart', compact('mightAlsoLike'));
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request, $slug)
    {
        // $duplicates = Cart::search(function ($cartItem, $rowId) use ($product) {
        //     return $cartItem->id === $request->id;
        // });
        // if($request->ajax()){
        //     return var_dump(Response::json(Request::all()));
        // }
        $product = Product::where('slug', '=', $slug)->firstOrFail();
        Cart::add($request->id, $request->name, $request->qty, $request->price, ['size' => $request->options])
        ->associate('App\Product');

         $data = array(
             'success' =>  'Product is toegevoegd in je winkelwagen',
             'product' => $product      
        );
        return redirect()->back()->with($data);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        
    }

   
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,50'
        ]);
        if ($validator->fails()) {
            session()->flash('errors', collect(['Hoeveelheid moet tussen 1 en 50 zijn.']));
            return response()->json(['success' => false], 400);
        }
        Cart::update($id, $request->quantity);
        session()->flash('success', 'Hoeveelheid is aangepast!');
        return respone()->json(['success' => true]);
    }

   
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success', 'Product is verwijderd uit de winkelwagen.');
    }
}
