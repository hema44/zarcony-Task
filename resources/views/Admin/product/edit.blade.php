@extends("Admin.layouts.app")

@section("css")
    <link href="{{asset("assets/plugins/select2/css/select2.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/plugins/select2/css/select2-bootstrap4.css")}}" rel="stylesheet" />
@endsection

@section("content")
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Components</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Buttons</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-7 mx-auto">

            <h6 class="mb-0 text-uppercase">Form with icons</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
                        </div>
                        <h5 class="mb-0 text-danger">Edit product</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="{{route("products.update",$product->id)}}" enctype="multipart/form-data">
                        {{method_field("put")}}
                        @csrf
                        <div class="col-md-6">
                            <label for="inputLastName" class="form-label">title</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                <input type="text" name="title" class="form-control border-start-0"
                                       value="{{$product->title}}" id="inputLastName" placeholder="First Name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 " id="brand_id" name="brand_id" required>
                                <option selected value="{{$product->brand->id}}">{{$product->brand->name}}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputLastName1" class="form-label">sku</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                <input type="text" name="sku" class="form-control border-start-0"
                                       value="{{$product->sku}}" id="inputLastName1" placeholder="First Name" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>

                        <div class="col-md-6">
                            <label for="inputLastName2" class="form-label">Details</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                <textarea type="text" name="Details" class="form-control border-start-0"
                                          id="inputLastName1" placeholder="First Name" >value="{{$product->Details}}"</textarea>
                            </div>
                        </div>


                        <div class="col-12">
                            <button type="submit" class="btn btn-danger px-5">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script src="{{asset("assets/plugins/select2/js/select2.min.js")}}"></script>
    {{--    <script>--}}
    {{--        $('.single-select').select2({--}}
    {{--            theme: 'bootstrap4',--}}
    {{--            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',--}}
    {{--            placeholder: $(this).data('placeholder'),--}}
    {{--            allowClear: Boolean($(this).data('allow-clear')),--}}
    {{--        });--}}
    {{--        $('.multiple-select').select2({--}}
    {{--            theme: 'bootstrap4',--}}
    {{--            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',--}}
    {{--            placeholder: $(this).data('placeholder'),--}}
    {{--            allowClear: Boolean($(this).data('allow-clear')),--}}
    {{--        });--}}
    {{--    </script>--}}
    <script>
        $('#brand_id').select2({
            ajax: {
                url: '{{route('get-brands')}}',
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1
                    }

                    // Query parameters will be ?search=[term]&page=[page]
                    return query;
                },
                processResults: function (data) {

                    return {
                        results: data[0]
                    };
                }
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

    </script>
@endsection
