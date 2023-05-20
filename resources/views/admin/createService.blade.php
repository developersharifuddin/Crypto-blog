@extends('layouts.admin_layout')
@section("title")
 Admin Create Service
@endsection


@section('content')
     
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Services </h1>
          </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                   
                    <a class="btn btn-success" href="{{url('ServiceIndex')}}" role="button">Back</a>
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
                <form action="{{url('createService')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                       
                        <div class="form-group">
                            <label for="icon">Service icon</label>
                            <input type="text" name="icon" class="form-control" id="icon" placeholder="Enter icon" required="">
                        </div>
                        <div class="form-group">
                            <label for="title">Service Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required="">
                        </div>
                        <div class="form-group">
                            <label for="sub_title">Service Sub Title</label>
                            <input type="text" name="sub_title" class="form-control" id="sub_title" placeholder="Enter sub title" required="">
                        </div>
                    </div>
                     <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                    </div>
                </form>
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
@endsection