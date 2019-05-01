@extends('layout.layout')

@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

@include('inc.header')
    <div class="container-fluid" id="container-fluid-register">
        <div class="container" >
            <div class="register-main">
                <div class="card-register">
                    <p>Registreren</p>
                </div>
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <br>
                        <div class="alert alert-warning">
                            <li> {{ $error  }}</li>
                        </div>
                    @endforeach
                @endif
                <form method="POST" action="{{route('users.index')}}" class="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">voornaam</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-form-label">Achternaam</label>
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required >
                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-form-label">Aanhef</label>
                        <input type="radio" name="gender" value="male"> meneer &nbsp;
                        <input type="radio" name="gender" value="female"> mevrouw<br>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-form-label">Geboortedatum</label>
                        <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required >
                        @if ($errors->has('date'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="street" class="col-form-label">Straat</label>
                        <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street') }}" required >
                        @if ($errors->has('street'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('street') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="col-form-label">Telefoonnummer</label>
                        <input id="phone_number" type="tel" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" >
                        @if ($errors->has('phone_number'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="postal_code" class="col-form-label">Postcode</label>
                        <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ old('postal_code') }}" required >
                        @if ($errors->has('postal_code'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('postal_code') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="house_number" class="col-form-label">Huisnummer</label>
                        <input id="house_number" type="text" class="form-control{{ $errors->has('house_number') ? ' is-invalid' : '' }}" name="house_number" value="{{ old('house_number') }}" required >
                        @if ($errors->has('house_number'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('house_number') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email-adres</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required >
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password " class="col-form-label">Wachtwoord</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required><br><br><br>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <input name="role_id" type="hidden" value="2">
                    <div class="register-form-buttons">
                        <button type="submit"  class="btn btn-primary login-register">maak account </button>
                        <button href="{{route('home')}}" class="btn btn-cancel ">annuleren </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @include('inc.footer')
@endsection