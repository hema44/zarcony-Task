@extends("Admin.layouts.app")

@section("css")
    <link href="{{asset("assets/plugins/datatable/css/dataTables.bootstrap5.min.css")}}" rel="stylesheet" />

@endsection

@section("content")
    <!--breadcrumb-->
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">

                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>User</th>
                            <td>{{$order->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{$order->user->phone}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$order->address}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$order->order_status}}</td>
                        </tr>
                        </tbody>
                    </table>

                    <hr>

                    <h3>Order Details</h3>
                    <table class="table table-bordered">
                        <thead>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        </thead>
                        <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{$item->Products->title}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity * $item->price}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Total</td>
                            <td>{{$order->total}}</td>
                        </tr>
                        </tbody>
                    </table>


                    <hr>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="change-status" role="form" action="{{route('orders.update',$order->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">


                                <div class="form-group col-md-6">
                                    <label class="form-control-label">Orde Stauts: <span class="tx-danger">*</span></label>
                                    <select class="form-control " id="order_status" name="order_status">
                                        <option selected disabled> Change Status</option>
                                            <option value="{{\App\Enums\OrderStatus::cancelled}}">{{\App\Enums\OrderStatus::cancelled}}</option>
                                            <option value="{{\App\Enums\OrderStatus::paid}}">{{\App\Enums\OrderStatus::paid}}</option>

                                        <option></option>
                                    </select>

                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Update Status</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>

        </div>
    </div>
@endsection

@section("js")
    <script src="{{asset("assets/plugins/datatable/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("assets/plugins/datatable/js/dataTables.bootstrap5.min.js")}}"></script>
    <script>

        var dataTable = null;

        $(document).ready(function () {
            dataTable = dt();
        });

        function dt() {

            return $('#example2').DataTable({
                dom: 'lBfrtip',
                buttons: [],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "processing": true,
                // "scrollX": true,
                // 'autoWidth': false,
                "serverSide": true,
                "ajax": {
                    "url": "{{ url('admin/datatables/orders') }}",
                    "type": "GET",
                },
                "order": [[0, "desc"]],
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'user.name', name: 'user.name'},
                    {data: 'total', name: 'total'},
                    {data: 'order_status', name: 'order_status'},
                    {data: 'payment_method', name: 'payment_method'},
                    {data: 'operations', name: 'operations'},
                ]
            });
        }
    </script>
@endsection
