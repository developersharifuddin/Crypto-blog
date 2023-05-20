@extends('layouts.admin_layout')
@section("title")
 Admin Service
@endsection


@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Service Info</h1>
          </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                   
                    <a class="btn btn-success" href="{{url('createService')}}" role="button">Create Service</a>
                   
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
              
              <!-- /.card-header -->
              <!-- form start -->
             @if(session()->has('message'))
              <div class="card bg-success">
                  <div class="card-header">
                      <h3 class="card-title">Success</h3>
                      <div class="card-tools">
                      {{session()->get('message')}}
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                      </div>
                  </div>
              </div>
              @endif
              <table id="example1" class="table table-bordered table-striped p-2">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                 
                      @foreach($data as $service)
                        <tr>
                            <td>{{$service->id}}</td>
                            <td>{{$service->icon}}</td>
                            <td>{{$service->title}}</td>
                           
                            <td>{{$service->sub_title}}</td>
                           
                            <td>
                            
                                <a class="btn btn-xs btn-primary" href="{{url('updateService',$service->id)}}" role="button"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this')"  href="{{url('deleteService',$service->id)}}" role="button"><i class="fas fa-trash"></i></a>
                                
                            </td>
                        </tr>
                      @endforeach
                </tbody>
            </table>
      
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
  <!-- /.control-sidebar -->
@endsection