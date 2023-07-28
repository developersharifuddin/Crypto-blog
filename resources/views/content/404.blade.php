@extends('layouts.admin_layout')
@section("title")
Admin | 404
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 border-0">
                <div class="card shadow-none border-0 mt-3 w-100 bg-light" style="background:#F8F9FB">
                    <!-- /.card-header -->
                    <div class="card-body border py-3 m-auto bg-light">
                        <img src="{{asset('frontend/img/404a.jpg')}}" title="404 Ppage not found" />
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

</div>
@endsection
