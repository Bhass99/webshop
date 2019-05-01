@extends('layout.layout')

@section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

@include('inc.header')
<div class="container-fluid" id="container-fluid-login">
    <div class="container" >
        <div class="login-main">
            <div class="card-login">
                <p class="header-txt">Inloggen</p>
            </div>
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <br>
                    <div class="alert alert-danger">
                        <li> {{ $error  }}</li>
                    </div>
                @endforeach
            @endif
            <form method="POST" action="{{route('login')}}" class="login-form">
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
                <a href="#" class="btn btn-link">Wachtwoord vergeten?</a>
                <button type="submit" class="btn btn-primary login-submit">Log in </button>
                <p>
                    Nog geen Aktur account? Hieronder kunt u een account aanmaken.
                </p>
                <a href="{{ route('users.create') }}" name="submit" class="btn btn-primary make-acc-btn">Registreren</a>
            </form>
        </div>
    </div>
</div>



@include('inc.footer')
@endsection