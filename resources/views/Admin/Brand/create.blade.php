@extends("Admin.layouts.app")

@section("css")
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
                        <h5 class="mb-0 text-danger">New Brand</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="{{route("brands.store")}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputLastName1" class="form-label">Name</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                <input type="text" name="name" class="form-control border-start-0" id="inputLastName1" placeholder="First Name" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" name="image" type="file" id="formFile">
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

@endsection
