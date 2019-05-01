@extends('layout.layout')

@section('content')
@section('extra-css')
    <style>
        .col-sm-6{
            padding: 2%;
        }
    </style>
@endsection
@include('inc.header')
    <div class="container" >
        <div class="row">
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <br>
                    <div class="alert alert-danger">
                        <li> {{ $error  }}</li>
                    </div>
                @endforeach
            @endif
            
            <div class="col-sm-6">
                <div class="guest">
                  <h4>Bestellen als gast of registreer</h4> 
                  <p>
                      Voordelen van een account: Bewaar uw gegevens. Dat werkt sneller en makkelijker.
                  </p>
                  <div class="check-buttons">
                      <a href="{{route('users.create')}}" class="btn btn-primary">Registreer nu</a>
                      <a href="{{route('guestCheckout-info')}}" class="btn btn-primary">Doorgaan zonder account</a>
                 </div>

                </div>
            </div>
            <div class="col-sm-6">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="member">
                    <h4>Inloggen</h4>
                    <p>
                        Heeft u uw gegevens al eerder bewaard? U kunt hieronder inloggen met uw e-mailadres en wachtwoord.
                    </p>
                     <form method="POST" action="{{route('checkoutLogin')}}" class="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email-adres</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Wachtwoord</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <a href="" class="btn btn-link">Wachtwoord vergeten?</a>
                        <button type="submit" class="btn btn-primary login-submit">Log in </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('inc.footer')
@endsection