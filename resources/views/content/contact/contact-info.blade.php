@extends('layouts.admin_layout')
@section("title")
Admin | Contact List
@endsection
 
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Contact Info </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Contact Info</a></li>
            <li class="breadcrumb-item active">Contact </li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">


    <div class="container-fluid">
      <div class="row">

        <div class="col-12 mt-3">
          <button>
            <a class="btn btn-info-cs" href="{{url('/create-contact')}}">
              <i class="fa fa-plus"></i> Create Contact Info
            </a>
          </button>
        
          <div class="card border-primary mt-3">

            <div class="card-body ">

              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>
                      phone
                    </th>
                    <th width="10%"> Action </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($contactInfo as $item)
                  <tr>
                    <td>{{$item->id}}
                    <td>{{$item->email}}</td>
                    <td>{{$item->address}}</td>
                    <td>
                      <img src="{{asset($item->info_image)}}" alt=" contact banner image" style="height:50px; width:80px;">
                    </td>
                    <td>
                      {{$item->phone}}
                    </td>
                    <td>

                      <a class="btn btn-primary btn btn-sm" href="{{ url('edit-contact-info/'.$item->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                      </a>

                    </td>

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