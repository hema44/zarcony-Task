@extends("layouts.app")

@section("content")

    <section>
        <div class="container">
            <div class="row">

                <div class="col-12 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Products</h2>
                        @foreach($Products as $product)
                            <div class="col-12 col-md-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset("assets/images/shop/".$product->image)}}" alt="" />
                                            <h2>{{$product->price}} $</h2>
                                            <p>{{$product->title}}</p>
                                            <a href="{{route("AddToCart",$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            <a href="{{route("productDetails",$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>view Details</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{$product->price}} $</h2>
                                                <p>{{$product->title}}</p>
                                                <a href="{{route("AddToCart",$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                <a href="{{route("productDetails",$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>view Details</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div><!--features_items-->
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            {{$Products->links('layouts.paginate')}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
