@extends('layouts.admin_layout')
@section("title")
Admin | Post
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Contact </h1>
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
          <style>
            div.dataTables_wrapper div.dataTables_filter label {
              margin-right: 10px !important;
            }

            div.dataTables_wrapper div.dataTables_paginate ul.pagination {
              margin-right: 10px !important;
            }

            div.dataTables_wrapper div.dataTables_info {
              margin-left: 10px !important;
            }
          </style>

          <div class="card border-primary">
            <div class="card-header border-0 shadow-none">
              <h3 class="card-title mt-1">
                <a class="btn btn-info-cs text-white" href="{{url('/contact-list')}}" target="_blank" role="button">
                  <i class="fa fa-file"></i> Generate Pdf</a>
              </h3>
            </div>
            <div class="card-body px-0">

              <table id="example1" class="table table-bordered table-striped text-center px-0">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>IP Address</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Time</th>
                  </tr>
                </thead>

                <tbody>

                  @foreach($contactUS as $key=> $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->ip_address}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->subject}}</td>
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
          </div>
          <!-- /.card -->
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>


  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
