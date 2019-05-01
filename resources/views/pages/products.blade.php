@extends('layout.layout')

@section('content')
@include('inc.header')
<div class="container-fluid" id="container-fluid-products">
    <div class="container">
        <div class="path-info">
            <div class="row ">
                <div class="col">
                    <a href="#" class="text-muted font-weight-bold path-info-txt">{{$category->name}}&nbsp;</a><i class="fas fa-arrow-right"></i>
                    {{-- <a href="#" class="text-muted font-weight-bold path-info-txt">&nbsp;Macbrook-pro &nbsp;</a><i  class="fas fa-arrow-right right-arrow-last"></i> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="products">
                <div class="col-sm-3">
                    <p class="cats-txt">Categorien</p>
                    @foreach ($allCats as $cats)
                        <button class="collapsible"><a class="cats-links">{{$cats->name}}</a></button>
                        <div class="content">
                            <p>on ullamco laboris </p>
                        </div>               
                    @endforeach
                </div>
                <div class="col-sm-9">
                    <div class="products-intro">
                        <h1> Macbook-pro</h1>
                        <p class="products-intro-description">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam f
                        </p>
                        <button class="subcategories-btn-mobile"><p class="text-muted"> Kies je subcategory</p><i class="fas fa-arrow-down text-muted subcategories-arrow-mobile"></i> </button>
                        <p class="float-left products-count">@if($countProducts > 0){{$countProducts}} resultaten @else Nog geen producten @endif </p>

                    </div>
                    <div class="subcategories-show-mobile">
                        <p class="cats-txt">Categorien</p>
                        @foreach ($allCats as $cats)
                            <button class="collapsible"><a class="cats-links">{{$cats->name}}</a></button>
                            <div class="content">
                                <p>on ullamco laboris </p>
                            </div>               
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach ($products as $item)
                            <div class="col-sm-4 ">
                                <a href="{{ route('product',['category' =>$category->slug, 'product'=>$item->slug]) }}">
                                    <img src="{{asset('storage/'.$item->image)}}">
                                </a>
                                <p class="text-center products-name "> {{ $item->title}}</p>
                                <p class="text-center text-muted products-price">${{ $item->price_sm}}</p>
                                <ul class="social">
                                    <li><a href="{{ route('product',['category' =>$category->slug, 'product'=>$item->slug]) }}" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                    {{-- <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li> --}}
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('inc.footer')

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;
    var $window = $(window);
    var $windowWidth = $window.width();
    var $portraitWidth = 768;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });

    }
    // changing classes responsive
    if ($windowWidth == $portraitWidth){
        $("div.col-sm-4").removeClass('col-sm-4').addClass('col-s-6');
    }
    if ($windowWidth < $portraitWidth ){
        $("div.col-s-6").removeClass('col-s-6').addClass('col-12');
    }

    $('.subcategories-btn-mobile').click(function () {
        $('.subcategories-show-mobile').toggle(500);
    });

    $('.collapsible').click(function() {
        var clicks = $(this).data('clicks');
        if (clicks) {
            $(this).css('transform', 'scale(' + 1 +')');

        } else {
            $(this).css('transform', 'scale(' + 1.1 +')');
        }
        $(this).data("clicks", !clicks);
    });
</script>
@endsection