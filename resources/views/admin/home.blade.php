@extends('layouts.admin_layout')
@section("title")
ZIT | Admin
@endsection


@section('content')

<style>
  .small-box,
  .icon {
    background: linear-gradient(355deg, #2a3f54 -4%, #162031, #162031, #162031 66%) !important;
    color: #eee !important
  }

  .small-box:hover,
  .icon:hover {
    background: linear-gradient(355deg, #003162 -4%, #031a40, #021435, #03193f 66%) !important;
    color: white !important
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{$contactListcount->count();}}</h3>


              <p>User Contact</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$users->count();}}<sup style="font-size: 20px"></sup></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('/profile')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3> {{$TotalVisitor}}</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('/contactData')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3> {{$posts}}</h3>

              <p>Posts</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('/post')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row mt-3">






        <div class="col-12 col-lg-6">


          <div class="card border-primary" style="overflow: hidden;">
            <div class="card-header py-1">
              <h3 class="card-title mt-1">User Contact </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool my-auto" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool d-none" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table  table-sm  table-responsive table-striped px-0">
                <thead>
                  <tr>

                    <th>IP Address</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Time</th>

                  </tr>
                </thead>

                <tbody>

                  @foreach($contactUS as $key=>$value)
                  <tr>

                    <td>{{$value->ip_address}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{date('d-M-Y h:i A',strtotime($value->created_at))}}</td>

                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="{{url('/contactData')}}" class="float-right btn btn-info-cs btn-sm">
                View All</a>
            </div>
          </div>
          <!-- /.card -->
          <!-- /.card -->

        </div>






        <div class="col-12 col-lg-6">


          <div class="card border-primary mt-3" style="overflow: hidden;">
            <div class="card-header py-1">
              <h3 class="card-title mt-1 my-auto">Company Information </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool my-auto" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool d-none" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table  table-sm  table-responsive table-striped px-0">
                <thead>

                </thead>
                <tbody>

                  @foreach($companyInformation as $value)
                  <tr>
                    <th>Company Logo</th>
                    <td> <img src="{{asset('uploads/companyLogo/'.$value->company_logo)}}" alt="company_logo" height="50px" width="50px"></td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td>{{$value->phone1}} , {{$value->phone2}}</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>{{$value->email1}} , {{$value->email2}}</td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td>{{$value->Address}}</td>
                  </tr>

                  <tr>
                    <th>Open Time</th>
                    <td> <i class="far fa-clock"></i><span> {{date('h:i A',strtotime($value->start_time))}} - {{date('h:i A',strtotime($value->end_time))}}</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="{{url('/company_information')}}" class="float-right btn btn-info-cs btn-sm">
                View All</a>
            </div>
          </div>
          <!-- /.card -->
          <!-- /.card -->

        </div>


        <!-- /.card -->

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- /.control-sidebar -->
@endsection
