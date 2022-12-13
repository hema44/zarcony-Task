@extends("layouts.app")

@section("content")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{asset("assets/images/shop/".$Product->image)}}" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <h2>{{$Product->title}}</h2>
                                <span>
									<span>{{$Product->price}}$</span>
									<a href="{{route("AddToCart",$Product->id)}}" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</a>
								</span>
                                <p>{{$Product->Details}}</p>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->


                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($RecommendedProducts as $RecommendedProduct)
                                    <div class="item active">
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="{{asset("assets/images/shop/".$RecommendedProduct->image)}}" alt="" />
                                                        <h2>{{$RecommendedProduct->price}}$</h2>
                                                        <p>{{$RecommendedProduct->title}}</p>
                                                        <a href="{{route("AddToCart",$RecommendedProduct->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                        <a href="{{route("productDetails",$RecommendedProduct->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>view Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div><!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection
