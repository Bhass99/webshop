<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="row d-none first">
                <div class="col">
                    <div class="ul-one first">
                        <ul>
                            <h4 class="text-white">service</h4>
                            <li class="text-white"><a>mijn aktur.nl</a></li>
                            <li class="text-white"><a>service&contact</a></li>
                            <li class="text-white"><a>retourneren</a></li>
                            <li class="text-white"><a>bezorgen</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="ul-two">
                        <ul>
                            <h4 class="text-white">Categorieen</h4>
                            @foreach (App\CategoryProduct::whereNull('parent_id')->get() as $cats)
                                <li class="text-white"><a>{{$cats->name}}</a></li> 
                            @endforeach        
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="ul-third">
                        <ul>
                            <h4 class="text-white">over Aktur</h4>
                            <li class="text-white"><a>meer over Aktur</a></li>
                            <li class="text-white"><a>category</a></li>
                            <li class="text-white"><a>category</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row d-none second">
                <div class="col beginInfo">
                    <h4 class="text-white footer-title"> wil je niks missen?</h4>
                    <p class="text-white footer-text" >
                        Schrijf je in voor onze nieuwsbrief en blijf up-to-date met de laatste  producten en de scherpste aanbiedingen.
                    </p>
                </div>
                <div class="col send-email-footer">
                    <input type="email" class="form-control " placeholder="jouw e-mailadres">
                    <button type="submit" class="btn btn-primary float-lg-right">Meld me aan</button>
                </div>
                <div class="col social-media-buttons">
                    <h4 class="text-white"> Wil je ons volgen?</h4>
                    <a href="#" class="fa fa-facebook-square"></a>
                    <a href="#" class="fa fa-instagram"></a>
                </div>
            </div>
        </div>

        <div class="row d-none third">
            <div class="footer-bottom-img-landscape">
                <img src="/images/logo-nobackground-color-white.png" class="logo-footer">
            </div>
            <div class="footer-bottom-landscape">
                <p class="text-white footer-links"> | <a>algemene voorwaarden</a> | <a> privacy</a> | <a>service & contact</a> | &nbsp; <span class="text-muted"> © 2018Aktur.BV </span></p>
            </div>
        </div>

        <div class="footer-info">
            <ul >
                <h4 class="text-white">categroy</h4>
                <li class="text-white"><a>category</a></li>
                <li class="text-white"><a>category</a></li>
                <li class="text-white"><a>category</a></li>
            </ul>
        </div>
        <div class="footer-portrait">
            <div>
                <h5 class="text-white footer-title"> wil je niks missen?</h5>
                <p class="text-white footer-text" >
                    Schrijf je in voor onze nieuwsbrief en blijf up-to-date met de laatste  producten en de scherpste aanbiedingen.
                </p>
            </div>
            <div class="send-email-footer">
                <input type="email" class="form-control" placeholder="jouw e-mailadres">
                <button type="submit" class="btn btn-primary w-100">Meld me aan</button>
            </div>
            <div class="social-media-buttons">
                <h5 class="text-white"> Wil je ons volgen?</h5>
                <a href="#" class="fa fa-facebook-square"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>
            <div class="footer-bottom">
                <img src="/images/logo-nobackground-color-white.png" class="logo-footer">
                <p class="text-white mt-3 footer-text2"> Gratis verzneden vanaf 20.-</p>
                <p class="text-white footer-links"> | <a>algemene voorwaarden</a> | <a> privacy</a> | <a>service & contact</a> | </p>
                <span class="text-muted"> © 2018{{config('app.name', 'Aktur')}}.BV </span>
            </div>
        </div>
    </div>
</footer>
