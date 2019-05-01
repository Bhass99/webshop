<!-- <ul class="navbar-nav navbar-ul ">
    <li class="nav-item  nav-item-styling">
        <a class="nav-link" href="{{route('home') }}">Home <span class="sr-only">(current)</span></a>
    </li>
    @foreach(App\CategoryProduct::all() as $category)
        @if($category->parent_id == null)
            {{-- menu('', 'bootstrap') --}}
            <li class="nav-item  nav-item-styling">
                <a class="nav-link" href="{{ route('products.index') }}">{{ $category->name }}<span class="sr-only">(current)</span></a>
            </li>
        @endif
    @endforeach
    <li class="nav-item dropdown nav-item-styling">
        <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-itemh" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </li>
</ul> -->

<ul class="navbar-nav navbar-ul ">
    {{-- @foreach($items as $menu_item)
        <li class="nav-item  nav-item-styling"><a href="{{ $menu_item->url }}" class="nav-link">{{ $menu_item->title }}</a></li>
    @endforeach --}}
    <li class="nav-item  nav-item-styling"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
    <li class="nav-item  nav-item-styling"><a href="{{ route('about') }}" class="nav-link">About</a></li>
    @foreach (App\CategoryProduct::all() as $cat)
        @if ($cat->parent_id == null)
            <li class="nav-item  nav-item-styling"><a href={{route('showAll' , $cat->slug) }} class="nav-link">{{ $cat->name}}</a></li>
        @endif

    @endforeach
</ul>
