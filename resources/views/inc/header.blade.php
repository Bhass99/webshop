<div class="container-fluid nav-info">
    <div class="container">
        <ul id="dropdown-custome">
            <li>
                <a href="#" >
                    <span class="glyphicon glyphicon-ok"></span> &nbsp; Gratis verzenden vanaf 20.-</p>
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}">
                    Contact
                </a>
            </li>
            <li>
                <div class="drop-container">
                    @guest
                        <a href="#" class="btn-dropdown">
                            Inloggen 
                            <i style="font-size:21px" class="fa">&#xf107;</i>
                        </a>
                    @else
                        <a  href="#" class="btn-dropdown">
                            {{ Auth::User()->name }}
                            <i style="font-size:21px" class="fa">&#xf107;</i>
                        </a>
                    @endguest
                    <div class="show-dropdown">
                        @guest
                            <p class="dropdown-item dropdown-txt ">
                                Heb je al een account? <br><br>
                                <a class="btn btn-primary w-100 mb-2" href="{{ route('users.index') }}">inloggen</a>
                            </p>
                            <p class="dropdown-item dropdown-txt ">
                                Nog geen account? <br><br>
                                <a class="btn btn-danger w-100 mb-2" href="{{route('users.create')}}">Account aanmaken</a>
                            </p>
                        @else
                            @if ( Auth::User()->role_id === 1)
                                <p class="dropdown-item dropdown-txt ">
                                    Admin panel <br><br>
                                    <a target="_blank" class="btn btn-primary w-100 mb-2" href="/admin"> {{__('Admin') }}</a>  
                                </p>
                            @endif
                            <p class="dropdown-item dropdown-txt ">
                                <a  class="btn btn-danger w-100 mb-2" href="{{ route('logout') }}">{{__('Logout') }}</a>
                            </p>
                        @endguest
                    </div> 
                </div>
            </li>
            <li>
                <div class="drop-container" >
                    <a href="#" class="btn-dropdown">
                        <i  onclick="openProfile()" class="material-icons profile-sidebar-icon ">&#xe7ff;</i>
                        Mijn Aktur
                        <i style="font-size:21px" class="fa ">&#xf107;</i>
                    </a>
                    <div class="show-dropdown">
                        <a class="dropdown-item" href="#">Link 1</a>
                        <a class="dropdown-item" href="#">Link 2</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="nav-image">
        <img src="{{asset('images/logo.png')}}" class="logo">
    </div>
   
    <div class="profile-shoppingcart ">
        <li style="font-size:43px;cursor:pointer" onclick="openProfile()" class="material-icons profile-sidebar-icon">&#xe7ff;</li>
        <li>
            <a href="{{route('cart.index')}}" id="cart" class="shopping-cart-icon"><i class="fa fa-shopping-cart "></i>
                @if (Cart::instance('default')->count() > 0)
                    <span class="badge ">{{Cart::instance('default')->count()}}</span>             
                @endif
            </a>
        </li>
    </div>

    <div class="catMenu">
        <span style="font-size:20px;cursor:pointer" onclick="openNav()" class="catMenu">&#9776; menu</span>
    </div>
    <div class="search ">
    
        <div class="aa-input-container" id="aa-input-container">
            <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Search" name="search" autocomplete="off" />
            <svg class="aa-input-icon" viewBox="654 -372 1664 1664">
                <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
            </svg>
        </div>
    </div>   
</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>
<div id="profile-sidebar" class="profile-sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeProfile()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>
<div class="navbar-parent ">
    <div class="background-div  w-100 "></div>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark  navbar-ipadpro">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault" style="padding-left: 0">
                {{ menu('main' , 'inc.partials.navbar-bigscreen') }}
            </div>
        </nav>
    </div>
</div>
