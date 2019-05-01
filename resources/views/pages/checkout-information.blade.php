@extends('layout.layout')
@section('extra-css')
    <style>
        .col-sm-4:not(.nohover):hover{
            transform: scale(1.0);
            opacity: 1.0;
        }
    </style>
@endsection
@section('content')
@include('inc.header')
    <div class="container" id="checkout-info">
        <form action="{{route('payment.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="personal-info">
                        <h4>{{__('Personal information')}}</h4>
                        
                        <div class="form-group checkout-info">
                            <label for="name" class="col-form-label">{{__('First name')}}</label>
                            @if (auth()->user())
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ auth()->user()->name }}" readonly>                                
                            @else
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            @endif
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group checkout-info">
                            <label for="last_name" class="col-form-label">{{__('Last name')}}</label>
                            @if (auth()->user())
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ auth()->user()->last_name }}" readonly >                                
                            @else
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required >
                            @endif
                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group checkout-info">
                            <label for="gender" class="col-form-label">{{__('Dear')}}</label>
                            <div class="radioInputs">
                                @if (auth()->user())
                                    <input type="radio" name="gender" value="{{ auth()->user()->gender}}" readonly> Mr. &nbsp;
                                    <input type="radio" name="gender" value="{{ auth()->user()->gender}}" readonly> Ms<br>
                                @else
                                    <input type="radio" name="gender" value="male"> Mr. &nbsp;
                                    <input type="radio" name="gender" value="female"> Ms<br>
                                @endif
                            </div>
                         </div>
                        <div class="form-group checkout-info">
                            <label for="email" class="col-form-label">{{__('Email-address')}}</label>
                            @if (auth()->user())
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ auth()->user()->email }}" readonly >
                            @else
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required >
                            @endif
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>  
                        <div class="form-group checkout-info">
                            <label for="phone_number" class="col-form-label">{{__('Telephone number')}}</label>
                            @if (auth()->user())
                                <input id="phone_number" type="tel" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ auth()->user()->phone_number }}" readonly>                                
                            @else
                                <input id="phone_number" type="tel" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" >
                            @endif
                            @if ($errors->has('phone_number'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                            @endif
                        </div>                  
                    </div>
                    <div class="shipping-address">
                        <h4>{{__('Shipping addresse')}}</h4>
                        <div class="form-group checkout-info">
                            <label for="street" class="col-form-label">{{__('Street')}}</label>
                            @if (auth()->user())
                                <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ auth()->user()->street }}" required >                                
                            @else
                                <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street') }}" required >
                            @endif
                            @if ($errors->has('street'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('street') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="form-group checkout-info">
                            <label for="postal_code" class="col-form-label">{{__('Postal code')}}</label>
                            @if (auth()->user())
                                <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ auth()->user()->postal_code }}" required >                            
                            @else
                                <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ old('postal_code') }}" required >
                            @endif
                            @if ($errors->has('postal_code'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('postal_code') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group checkout-info">
                            <label for="house_number" class="col-form-label">{{__('House number')}}</label>
                            @if (auth()->user())
                                <input id="house_number" type="text" class="form-control{{ $errors->has('house_number') ? ' is-invalid' : '' }}" name="house_number" value="{{auth()->user()->house_number }}" required >                                                                
                            @else
                                <input id="house_number" type="text" class="form-control{{ $errors->has('house_number') ? ' is-invalid' : '' }}" name="house_number" value="{{ old('house_number') }}" required >
                            @endif
                            @if ($errors->has('house_number'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('house_number') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div> 
                    <button class="btn btn-dark float-right" type="submit">betalen</button>      
                </div>
                <div class="col-sm-4">
                    <div class="overview">
                        <div class="overview-products">
                            @if (Cart::count() > 0)
                                <h4>{{__('Overview')}}</h4>
                                <div class="overview-products-info">
                                    @foreach (Cart::content() as $item)
                                        <p>{{$item->name}} {{Cart::count()}}x</p>
                                        <p>{{$item->price}}</p><br><br>
                                    @endforeach
                                </div>
                                <div class="overview-products-subTotal">
                                    <p>{{__('Subtotal')}}</p>
                                    <p>{{Cart::subtotal()}}</p><br><br>
                                    <p>{{__('Shipping costs')}}</p>
                                    <p>6.75</p>
                                </div>
                                <div class="overview-products-total">
                                    <p>{{__('Total')}}</p>
                                    <p>{{Cart::total() + 6.75}}</p><br><br>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>      
    </div>
@include('inc.footer')    
@endsection