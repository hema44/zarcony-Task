@extends("layouts.app")

@section("content")
    <section>
        <div class="container">
            <div class="row">

                <div class="col-12 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Brands</h2>
                        @foreach($brands as $brand)
                            <div class="col-12 col-md-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img height="100px" width="100px" src="{{asset("assets/images/shop/".$brand->image)}}" alt="" />
                                            <h2>{{$brand->name}}</h2>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>view products</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>view products</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 pb-1">
                            <nav aria-label="Page navigation">
                                {{$brands->links('layouts.paginate')}}
                            </nav>
                        </div>
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
@endsection
