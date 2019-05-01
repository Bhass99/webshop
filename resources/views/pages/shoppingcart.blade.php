@extends('layout.layout')
@section('extra-css')
    <style>
        #container-fluid-product{
            background-color: #fff;

        }
        .might-also-like-header{
            visibility: hidden;
        }
        .might-also-like-header::after{
            content: 'Andere bekeken ook';
            position: absolute;
            left: 1.5em;
            color: black;
            visibility: visible;
        }
       
    </style>
@endsection
@section('content')
@include('inc.header')

<div class="container-fluid" id="container-fluid-checkout">
    <div class="container" id="container-checkout">
         @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <br>
                <div class="alert alert-danger">
                    <li> {{ $error  }}</li>
                </div>
            @endforeach
          @endif
          
          <div class="card-header" style="background-color: white">
                <p class="shopping-cart-header ">Winkelmandje</p>
         </div>
            @if (Cart::count() > 0)
                @foreach (Cart::content() as $item)
                    <div class="checkout-content">
                        <div class="checkout-content-first">
                            <img src="{{asset('storage/'.$item->model->image)}}" >
                        </div>
                        <div class="checkout-content-second">
                            <p class="font-weight-bold checkout-content-title">{{$item->name}}</p>
                            <p class="text-muted">Direct leverbaar</p>
                            <p class="checkout-size"> size <b>{{$item->options->size}}</b></p>
                             <div class="input-group input-group-sm product-quantity">
                                <input type="number" id="quantity" name="quantity" data-id="{{$item->rowId}}" class="form-control input-number quantity"
                                data-productQuantity="{{ $item->model->quantity }}" value="{{$item->qty}}" max="50" min="1">
                            </div>
                        </div>
                        <div class="checkout-content-third">
                            <p class="font-weight-bold">{{$item->price * $item->qty}}</p>
                            <form action="{{route('cart.destroy', $item->rowId )}}" method="POST" onsubmit="alert('Are you sure to delete this item from your shoppingcart');">
                                @csrf
                                {{ method_field('DELETE')}}
                                <button Ttype="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <h3>Geen producten in de winkelwagen!</h3>
            @endif
    </div>
    <div class="container" id="container-checkout-total">
        <div class="checkout-total">
            <div class="checkout-total-left">
                <p>Verzendkosten</p>
                <p class="font-weight-bold">Totaal({{Cart::instance('default')->count()}}) artiekelen</p>
            </div>
            <div class="checkout-total-right">
                <p>€ {{ Cart::instance('default')->count() > 0 ?  6.95 : 0}}</p>
                <p class="font-weight-bold">€ {{ Cart::instance('default')->count() > 0 ? Cart::total() + 6.95 : Cart::total()}}</p>
            </div>

        </div>
        <div class="checkout-buttons">
        @if (Cart::count() > 0)
            @if (Auth::check()) 
                <a href="{{route('checkout-info')}}" class="btn btn-lg checkout-btn-checkout">Afrekenen</a>            
            @else     
                <a href="{{route('checkout')}}" class="btn btn-lg checkout-btn-checkout">Afrekenen</a>
            @endif
        @endif
       
        </div>
    </div>
    @include('inc.footer')
</div>



@section('extra-js')
    <script>
        var quantitiy=0;
        $('.quantity-right-plus').click(function(e){
            e.preventDefault();
           // if($(this).find('#quantity')){
           // }
            var quantity = parseInt($('.quantity').val());
            $(this).parent().parent().find('input').val(quantity + 1);
        });

        $('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('.quantity').val());
            if(quantity>0){
                $(this).parent().parent().find('input').val(quantity - 1);
            }
        });

       (function(){
            const className = document.querySelectorAll('.quantity')
            Array.from(className).forEach(function(element) {
                     $(element).on('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
        
    </script>
@endsection

@endsection