@extends('layouts.app')

@section('styles')
    <!-- Responsive datatable examples -->
    <link href="public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- DataTables -->
    <link href="public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    {{-- datePicker css --}}
    <link rel="stylesheet" href="public/assets/libs/%40chenfengyuan/datepicker/datepicker.min.css">
    <link href="public/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">

    <style>
        table.dataTable tbody tr.selected {
            background-color: #c0c0c0;
        }

        .search-table {
            width: 100%;
            height: 30px;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 5px;
            outline: none;
        }

    </style>
@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Car Enquiry</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <p class="text-danger"><span class="fw-bold">Note</span> : Once you searched the
                                    date, inorder to get full data need to click on clear button.</p>

                                <form action="{{ route('enquiry.getdate') }}" method="post">
                                    <div class="row">
                                        @csrf
                                        <div class="col-md-8">
                                            <div class="mb-4">
                                                <label>Date Range</label>

                                                <div class="input-daterange input-group" id="datepicker6"
                                                    data-date-format="dd M, yyyy" data-date-autoclose="true"
                                                    data-provide="datepicker" data-date-container='#datepicker6'>
                                                    <input type="text" class="form-control" name="minDate"
                                                        placeholder="Start Date" autocomplete="off" />
                                                    <input type="text" class="form-control" name="maxDate"
                                                        placeholder="End Date" autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <div style="margin-top: 27px">
                                                <button type="submit"
                                                    class="btn btn-outline-success waves-effect waves-light w-lg">Search</button>
                                                <a href="{{ route('on-road-price.index') }}"
                                                    class="btn btn-outline-warning waves-effect waves-light w-lg">Clear</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Model</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enquiries as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->model }}</td>
                                                <td>{{ $item->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © BroaddCast.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Powered by BroaddCast
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection


@section('script')
    <!-- Required datatable js -->
    <script src="public/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="public/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="public/assets/libs/jszip/jszip.min.js"></script>
    <script src="public/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="public/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="public/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="public/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="public/assets/libs/%40chenfengyuan/datepicker/datepicker.min.js"></script>
    <script src="public/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Datatable init js -->
    <script src="public/assets/js/pages/datatables.init.js"></script>
@endsection
