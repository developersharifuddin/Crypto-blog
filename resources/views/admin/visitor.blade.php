@extends('layouts.admin_layout')
@section("title")
 Admin Visitor
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Visitor Info</h1>
          </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">



                </li>

              </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <table id="example1" class="table table-bordered table-striped p-2">
                <thead>
                <tr>
                  <th>S/N</th>
                  <th>IP Address</th>
                  <th>Date & Time</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($visitors as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->ip_address}}</td>
                        <td>{{$value->visit_time}}</td>
                      </tr>
                  @endforeach
                </tbody>

              </table>


            </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
