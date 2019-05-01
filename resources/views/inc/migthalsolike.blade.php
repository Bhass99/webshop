<div class="container-fluid" id="container-fluid-product" >
    <div class="container">
        <div class="extra-options">
            <h3 class="font-weight-bold might-also-like-header">Ook kun je kiezen voor </h3>
            <div class="row">
                <div class="extra-options-images">
                @foreach ($mightAlsoLike as $item)
                    <div class="col-3">
                        @if (isset($cat))
                            <a href="{{ route('product',['category' =>$cat->slug, 'product'=>$item->slug]) }}">
                        @endif
                            <img src="{{productImage($item->image)}}" alt="product">
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>