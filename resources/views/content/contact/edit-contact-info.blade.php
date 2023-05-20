@extends('layouts.admin_layout')
@section("title")
Admin | contact list
@endsection
 
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact Info</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Contact Info</a></li>
                        <li class="breadcrumb-item active">Update Contact Info</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ url('update-contact-info/'.$contactInoEdit->id) }}" method="POST">
                        @csrf
                        <div class="card border-primary">
                            <div class="card-header py-2 border-0 shadow-none">
                                <h4 class="card-title mt-1"> Update Contact Info </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="address"> Address </label>
                                            <input type="text" id="address" name="address" placeholder="address..." class="form-control" value="{{$contactInoEdit->address}}" />

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email"> Email</label>
                                            <input type="text" id="email" name="email" placeholder="email..." class="form-control" value="{{$contactInoEdit->email}}" />

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone"> Phone</label>
                                            <input type="text" id="phone" name="phone" placeholder="phone..." class="form-control" value="{{$contactInoEdit->phone}}" />

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="info_image"> Contact Info image</label>
                                            <div class="row">
                                                <div class="col-md-auto px-1">
                                                    @if(isset($contactInoEdit->info_image))
                                                    <img src="{{asset($contactInoEdit->info_image)}}" class="px-2" id="before_img" alt="" height="70px" width="70px">
                                                    <span class="form-label px-2" for="before_img">Before image</span>

                                                    @endif
                                                </div>
                                                <div class="col-md-auto mt-auto px-1">
                                                    <input type="file" name="info_image" id="info_image" class="form-control border-0 p-3 border-none" @if(!isset($contactInoEdit->info_image)) required @endif />
                                                    @error('info_image') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="card-footer border-0 shadow-none">
                                <a href="{{ url()->previous() }}" class="btn btn-info-cs btn-sm float-left"> <i class="fa fa-arrow-left"></i>&nbsp Back </a>
                                <button type="submit" class="btn btn-info-cs text-white btn-sm float-sm-right"> <i class="fa fa-save"></i>&nbsp Update </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section>
    <!-- /.content -->



    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection