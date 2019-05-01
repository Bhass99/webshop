@extends('layout.layout')

@section('content')
@include('inc.header')
<div class="container">
    <h2>Contactformulier</h2>
    <p>
        Wij hebben graag goed contact met onze klanten. Heb je bijvoorbeeld een vraag over een product of over je bestelling? Je kunt je vraag eenvoudig aan ons stellen via dit formulier.
    </p>
    <div class="row">
        <div class="row-contact">
            <div class="col-8">
                <form action="" method="post" class="form-contact">
                    <div class="form-group">
                        <label >Aanhef</label><br>
                        <label for="male">
                            <input type="radio" class="" id="male"> de heer
                        </label>
                        <label for="female">
                            <input type="radio" class="" id="female"> mevrouw
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="fistName">Voornaam</label>
                        <input type="text" class="form-control w-75" id="firstName">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Achternaam</label>
                        <input type="text" class="form-control w-75" id="lastName">
                    </div>
                    <div class="form-group">
                        <label for="email">Emailadres</label>
                        <input type="email" class="form-control w-75" id="email">
                    </div>
                    <div class="form-group">
                        <label for="email-repeat">Herhaal e-mailadres</label>
                        <input type="email" class="form-control w-75" id="email-repeat">
                    </div>
                    <div class="form-group">
                        <label for="comment">Je vraag</label>
                        <textarea class="form-control w-75" id="comment" rows="5" cols="30">

                     </textarea>
                    </div>
                    <a href="#" class="btn btn-primary w-25 mb-3">Verzenden</a>
                </form>
            </div>
            <div class="col-4">
                <div class="right-contact">
                    <h3>Socialmedia </h3>
                    <div class="contact-facebook">
                        <a href="#" class="fa fa-facebook-square"></a>
                        <p>facebook </p>
                    </div>
                    <div class="contact-instagram">
                        <a href="#" class="fa fa-instagram"></a>
                        <p>instagram </p>
                    </div>
                    <div class="contact-others">
                        <div class="contact-email">
                            <a href="#" class="fa fa-envelope"></a>
                            <p>info@aktur.com </p>
                        </div>
                        <div class="contact-phone">
                            <a href="#" class="fa fa-phone"></a>
                            <p>0636789345 </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('inc.footer')

@endsection