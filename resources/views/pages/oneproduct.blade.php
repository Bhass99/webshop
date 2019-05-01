@extends('layout.layout')

@section('content')
@include('inc.header')

<div class="container">
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <br>
                <div class="alert alert-danger">
                    <li> {{ $error  }}</li>
                </div>
            @endforeach
        @endif
        <div class="wrapper row">
            <div class=" col-md-8">
                <div class="product-image">
                    <img src="{{productImage($product->image)}}"  class="active" id="currentImage" alt="product">
                </div>
                <div class="product-images">
                    <div class="product-thumbnails ">
                        <img src="{{productImage($product->image)}}"  class="active" id="currentImage" alt="product">
                    </div>
                    @if ($product->images)
                        @foreach (json_decode($product->images, true) as $image)
                            <div class="product-thumbnails ">
                                <img src="{{productImage($image)}}" width="50px"  alt="product">                 
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="details col-md-4">
            
                <h3 class="product-title">{{ $product->title}}</h3>
                <div class="rating">
                    <div class="stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <!-- <span class="review-no">41 reviews</span> -->
                </div>
            <p class="product-description">{!! $product->body!!}</p>
            <h4 class="price"> <span class="prices"></span> <img src="{{asset('gif/load.gif')}}" class="loader"> </h4>
                <!-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p> -->
                <h5 class="sizes">sizes: <br>
                    @if ($product->price_sm !== null)
                        <input type="radio" name="size" value="small"> 250g                            
                    @endif
                    @if ($product->price_md !== null)
                        <input type="radio" name="size" value="medium" checked> 400g
                    @endif
                    @if ($product->price_lg !== null)
                        <input type="radio" name="size" value="large"> 500g
                    @endif
                    @if ($product->price_xl !== null)
                        <input type="radio" name="size" value="extra"> 5000g
                    @endif
                </h5>
                <div class="input-group input-group-sm product-quantity">
                    
                <input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                    
                </div>
                <div class="action">
                <form action="{{route('cart.store', $product->slug)}}" method="POST" id="formData">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->title}}">
                    <input type="hidden" name="price" id="priceVal" value="">
                    <input type="hidden" name="qty" id="qtyVal" value=""> 
                    <input type="hidden" name="options" id="optionsVal" value=""> 
                    <button type="submit" class="add-to-cart btn btn-warning" ><i class="fas fa-plus"></i> &nbsp;add to cart</button>
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@include('inc.migthalsolike')
@include('inc.footer')
<script>
    jQuery(document).ready(function($) {
        // loader logic
        $('.loader').hide();
        $(document).ajaxStart(function(){
            $('.loader').show();
        })
        .ajaxStop(function () {
            $('.loader').hide();            
        })

        //price logic
        $('.prices').text('€ {{$product->price_md}}');
        $('#priceVal').val({{$product->price_md}})

        // size logic
        $('#optionsVal').val('medium');

         $('input[name=size]').on('change',function () {
            $('#optionsVal').val($('input[name=size]:checked').val());
            $.ajax({
                type: 'GET', 
                url: '/price',
                dataType: 'json',
                success:function (data) {
                    const sizeValue = $('input[name=size]:checked').val();
                    if (sizeValue == 'small') {
                        $('.prices').text('€ {{$product->price_sm}}');
                        $('#priceVal').val({{$product->price_sm}})
                    } 
                    else if (sizeValue == 'medium') {
                        $('.prices').text('€ {{$product->price_md}}');
                        $('#priceVal').val({{$product->price_md}})
                    } 
                    else if (sizeValue == 'large') {
                        $('.prices').text('€ {{$product->price_lg}}');
                        $('#priceVal').val({{$product->price_lg}})
                    } 
                    else if (sizeValue == 'extra') {
                        $('.prices').text('€ {{$product->price_xl}}');
                        $('#priceVal').val({{$product->price_xl}})
                    } 
                }
                
                ,error:function(data){ 
                    console.log(data);
                }
            });
        })
         
         // quantity logic

        $('#qtyVal').val(1); 

         $('#quantity').on('change',function () {
                $('#qtyVal').val($(this).val());    
        })

        // images slider logic
  
        $('.product-thumbnails').each(function(){
            $(this).on('click',function (e) {
                
                $('#currentImage').removeClass('active');
                $(this).addClass('selected-image').siblings().removeClass('selected-image')
                var image = $(this).find('img').attr('src')

                $('#currentImage').on('transitionend webkitTransitionEnd oTransitionEnd', function(){
                    $('#currentImage').attr('src', image);
                    $(this).addClass('active');
                })

            })
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $('#quantity').on('change', function(){
        //     formVal =  $(this).val();
        //     $('#formData').submit(function () {
        //         $.ajax({
        //         type: 'POST',
        //         url: '/cart',
        //         data: {'qty': formVal},
        //         success: function(data){ 
        //             console.log(data);
        //         }
        //         })
            
        //     })
        // })          
    });
</script>
@endsection
