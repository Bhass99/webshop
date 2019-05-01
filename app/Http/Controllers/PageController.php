<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Mollie\Laravel\Facades\Mollie;
use Gloudemans\Shoppingcart\Facades\Cart;

class PageController extends Controller
{
    public function login(){
        return view('pages.login');
    }
    public function index(){
        return view('pages.index');
    }
    public function search(Request $request){

        // if($request->ajax()){
        //     $output = "";
        //     $productSlug = array();
        //     if($request->searchVal != ''){
        //         $items = Product::where('title','like','%' . $request->searchVal. '%')
        //         ->get();
        //     }

        //     if($items->count() > 0){
        //         foreach($items as $row){
        //             // $productSlug .= $row->slug;
        //             $output .= '<li class="list-group-item"><a class="searchLinks" href="search/'.$row->slug.'">' .$row->title. '</a></li>';
        //             array_push($productSlug,$row->slug);
        //         }
        //     }else{
        //         $output = '<li class="list-group-item"> No items found</li>';
        //     }

        //     $data = array(
        //     'data'  => $output,
        //     'slug'    => $productSlug,
        //     );

        //     echo json_encode($data);
        // }
    }
    public function contact(){
        return view('pages.contact');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function success()
    {
        // $payment = Mollie::api()->payments()->get($payment_id);
        // if ($payment->isPaid())
        // {
        //     Cart::remove($id);
        //     echo "Payment received.";
        // }
        Cart::destroy();
        return view('pages.success');
    }
}
