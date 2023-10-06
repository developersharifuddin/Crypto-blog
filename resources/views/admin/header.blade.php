<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- DataTables -->
    {{-- <link href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}
    {{-- <link href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"> --}}
    {{-- <link href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"> --}}
    <!-- Theme style -->
    <link href="{{asset('backend/dist/css/adminlte.min.css')}}" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link href="{{asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet">
    <!-- Daterange picker -->
    <link href="{{asset('backend/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- summernote -->
    <link href="{{asset('backend/plugins/summernote/summernote-bs4.min.css')}}" rel="stylesheet">
    <!-- summernote -->
    <link href="{{asset('backend/plugins/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <!-- bootstrap5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    @php
    $company_information = DB::table('company_information')
    ->select('company_information.company_logo','company_information.company_name',)->first();
    @endphp

    @if(isset($company_information->company_logo))
    <link rel="shortcut icon" href="{{asset('uploads/companyLogo/'.$company_information->company_logo)}}" type="image/x-icon">
    @endif
    <!-- toastrr css -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="https://unpkg.com/sweetalert@1.0.1/dist/sweetalert.css" />


    <style>
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
        .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            /* background-color: #484848 !important; */
            background-image: radial-gradient(circle at 0 2%, #25395a, #484848 124%);
        }

        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active:hover,
        .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active:hover {
            margin-left: 0px !important;
        }

        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link:hover,
        .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link:hover {
            margin-left: 10px !important;
            transition: 0.4s !important;
        }

        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:hover {
            margin-left: 10px !important;
            transition: 0.4s !important;
        }

        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
            margin-left: 0px !important;
            transition: 0s !important;
        }

        .main-sidebar {
            background: #200258 !important;
            color: #f6f6f6 !important;
            background-image: radial-gradient(circle at 0 2%, #25395a, #162031 124%);
            background: linear-gradient(355deg, #2a3f54 -4%, #162031, #162031, #162031 66%) !important;
        }






        label {
            color: #555 !important
        }


        input {
            border-radius: 3px !important;
            border: 1px solid #162031 !important;
            height: 35px !important;
        }



        input:focus {
            border: 0px !important;
            transition: border .1s !important
        }

        textarea {
            border-radius: 5px !important;
            border: 1px solid #162031 !important;

        }

        textarea:focus {
            border: 0px !important;
            transition: border .1s !important
        }







        .btn-info-cs,
        .btn-danger {
            background: linear-gradient(355deg, #2a3f54 -4%, #162031, #162031, #162031 66%) !important;
            color: #e6e6e6 !important;
            border: none !important;
        }

        button.btn-info-cs,
        button.btn-danger {
            background: linear-gradient(355deg, #2a3f54 -4%, #162031, #162031, #162031 66%) !important;
            color: #e6e6e6 !important;
            border: none !important;
        }


        .btn-info-cs:hover {
            background: linear-gradient(355deg, #27313a -4%, #000000, #000000, #343434 66%) !important;
            color: #fff !important;
        }

        button.btn-info-cs:hover {
            background: linear-gradient(355deg, #27313a -4%, #000000, #000000, #343434 66%) !important;
            color: #fff !important;
        }

        .btn-primary,
        .edit {
            background: linear-gradient(355deg, #2a3f54 -4%, #162031, #162031, #162031 66%) !important;
            border: none;
        }

        .btn-primary .edit:hover {
            background: linear-gradient(355deg, #27313a -4%, #000000, #000000, #343434 66%) !important;
        }


        .border-primary {
            border: 1.5px solid #162031 !important;

        }

        .card-body {
            border: 0px !important
        }


        .page-item.active .page-link {
            background-color: #343434 !important;
            border-color: #343434 !important;
        }

        .page-item.active .page-link a:focus {
            border: none !important;
        }

        input {
            border-radius: 3px !important;
            border: 1px solid #777 !important;
            height: 40px !important;

        }

        div.dataTables_wrapper div.dataTables_filter label {
            margin-right: 0px !important;
        }

        div.dataTables_wrapper div.dataTables_filter label {
            margin-top: 8px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            margin-right: 0px !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            margin-left: 0px !important;
        }

        a {
            color: var(--bs-link-color);
            text-decoration: none !important;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            height: 30px !important;
        }

        div.dataTables_wrapper div.dataTables_length select {
            width: auto;
            display: inline-block;
            width: 50% !important;
        }


        th,
        td,
        button,
        p,
        a,
            {
            font-size: 15px !important
        }

        th,
        td,
        table {
            border: 0px !important;
        }

        tr {
            border-bottom: 1px solid #777 !important;
        }

        input[type=text],
        input[type=file],
        input[type=number] {
            border: 1px solid rgb(211, 211, 211) !important;
            height: 35px !important;
            color: #666 !important;
        }

        textarea {
            border: 1px solid rgb(211, 211, 211) !important;
            color: #666 !important;
        }



        #parent_info_row_remove {
            background: rgba(239, 72, 106, .3) !important;
            color: rgba(239, 72, 106, 1) !important;
            border-radius: 50%;
        }

        #delete {
            background: rgba(239, 72, 106, .3) !important;
            color: rgba(239, 72, 106, 1) !important;
            border-radius: 50%;
        }

        #deleteresource {
            background: rgba(239, 72, 106, .3) !important;
            color: rgba(239, 72, 106, 1) !important;
            border-radius: 50%;
        }

        i {
            font-size: 15px !important;
        }

        #view {
            background: rgba(10, 187, 117, 0.15) !important;
            color: rgba(10, 187, 117, 1) !important;
            border-radius: 50%;
        }

        #add {
            background: rgba(10, 187, 117, 0.15) !important;
            color: rgba(10, 187, 117, 1) !important;
            border-radius: 50%;
        }

        #edit {
            background: rgba(247, 123, 11, 0.15) !important;
            color: rgba(247, 123, 11, 1) !important;
            border-radius: 50%;
        }

    </style>

    @stack('css')

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
