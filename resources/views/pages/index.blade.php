@extends('layout.layout')

@section('title', 'Home')
    
@section('content')
    @include('inc.header')
<div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="slideshow-container">
        <div class="mySlides " >
            <img src="images/candy.jpg">
        </div>
        <div class="mySlides ">
            <img src="images/nature.jpg">
        </div>
        <div class="mySlides ">
            <img src="images/laptop1.jpg">
        </div><br>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <div class="dots">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>
</div>
<div class="container-fluid" id="container-fluid-index">
    <div class="container">
        <div class="cats">
            <h2 class="text-center font-weight-bold"> Kies een categorie</h2>
            <div class="row">
                <div class="col-sm-4">
                    <a href="#" class="">
                        <img src="images/laptop.jpg">
                        <div class="cats-index-txt">
                            <p class="font-weight-bold">Macbook pro 2017</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#" class="">
                        <img src="images/laptop1.jpg">
                        <div class="cats-index-txt">
                            <p class="font-weight-bold">Macbook pro 2017</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#" class="">
                        <img src="images/laptop2.jpg">
                        <div class="cats-index-txt">
                            <p class="font-weight-bold">Macbook pro 2017</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#" class="">
                        <img src="images/laptop.jpg">
                        <div class="cats-index-txt">
                            <p class="font-weight-bold">Macbook pro 2017</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#" class="">
                        <img src="images/laptop1.jpg">
                        <div class="cats-index-txt">
                            <p class="font-weight-bold">Macbook pro 2017</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="#" class="">
                        <img src="images/laptop2.jpg">
                        <div class="cats-index-txt">
                            <p class="font-weight-bold">Macbook pro 2017</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('inc.footer')
@endsection

@section('extra-js')
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>  
@endsection
