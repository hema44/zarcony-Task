@extends("Admin.layouts.app")

@section("css")
    <link href="{{asset("assets/plugins/datatable/css/dataTables.bootstrap5.min.css")}}" rel="stylesheet" />

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
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>user</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Payment Methods</th>
                            <th>Show</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
