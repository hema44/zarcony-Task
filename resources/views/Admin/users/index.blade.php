@extends("Admin.layouts.app")

@section("css")
    <link href="{{asset("assets/plugins/datatable/css/dataTables.bootstrap5.min.css")}}" rel="stylesheet" />

@endsection

@section("content")
    <!--breadcrumb-->
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>

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
                    "url": "{{ url('admin/datatables/users') }}",
                    "type": "GET",
                },
                "order": [[0, "desc"]],
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                ]
            });
        }
    </script>
@endsection
