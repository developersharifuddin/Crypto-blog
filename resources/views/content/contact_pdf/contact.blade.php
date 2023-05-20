@extends('layouts.admin_layout')
@section("title")
Admin | contact list
@endsection
@push("css")

<link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style>
    input {
        border-radius: 4px !important;
        border: 1px solid #1f73da !important;
        height: 25px !important;
    }

    input:focus {
        border: 0px !important;
        transition: border .1s !important
    }

    .card-header a {
        border-radius: 5px;
    }

    .btn-info {
        background: #5011c4 !important;
        color: #f6f6f6;
    }

    .btn-info:hover {
        background: blue !important;
        color: white;
    }

    a.btn-info-cs,
    .btn-danger {
        background: #5011c4 !important;
        color: #e6e6e6 !important;
        border: none !important;
    }

    a.btn-info-cs:hover {
        background: #2f0380 !important;
        color: #fff !important;
    }
</style>
@endpush
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Contact-us List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Contact</a></li>
                        <li class="breadcrumb-item active">contact list</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="card border-primary">
                        <div class="card-header">
                            <h3 class="card-title mt-1">
                                <a class="btn btn-info-cs text-white" href="{{url('/contact-list')}}" target="_blank" role="button">
                                    <i class="fa fa-file"></i> Geberate Pdf</a>
                            </h3>
                        </div>
                        <div class="card-body p-0">
                            <table id="example1" class="table table-bordered table-striped px-0">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>IP Address</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Service</th>
                                        <th>Description</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($contactUS as $key=>$value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->ip_address}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->service}}</td>
                                        <td>
                                            {!!mb_strimwidth(($value->description),0,20,'.....')!!}
                                        </td>
                                        <td>{{date('d-M-Y h:i A',strtotime($value->created_at))}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

</div>
<!-- /.content-wrapper -->
@endsection
