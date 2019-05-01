<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $total = Cart::total() + 6.75;
        $cartInfo = array();
        
        $name = $request->input('name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $street = $request->input('street');
        $postal_code = $request->input('postal_code');
        $house_number = $request->input('house_number');
        $phone_number = $request->input('phone_number');

        foreach (Cart::content() as $row) {
            array_push($cartInfo, $row->name);
        }

        $payment = Mollie::api()->payments()->create([
        'amount' => [
            'currency' => 'EUR',
            'value' => "$total", // You must send the correct number of decimals, thus we enforce the use of strings
        ],
       
        'description' => $cartInfo[0],
        // 'webhookUrl'   => route('webhooks.mollie'),
        'redirectUrl' => route('success'),
         "metadata"    => array(
            'user_id' => $user_id,
            'name' => $name,
            'last_name' => $last_name,
            'email' => $email,
            'street' => $street,
            'postal_code' => $postal_code,
            'house_number' => $house_number,
            'phone_number' => $phone_number,
        )
        ]);
       
        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
        
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
