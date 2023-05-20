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
                    <h1>Contact Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Contact</a></li>
                        <li class="breadcrumb-item active">Edit Contact Banner</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{url('update-contact-banner/'.$EditContactBanner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card border border-primary">
                            <div class="card-header py-2">
                                <h4 class="card-title mt-1"> Edit Contact Banner </h4>
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-12 col-md-6">

                                        <div class="form-group">
                                            <label class="form-label" for="icon"> Contact title</label>
                                            <input type="text" id="contact_title" name="contact_title" placeholder="contact title..." class="form-control" value="{{$EditContactBanner->contact_title}}" />

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Logo name</label>
                                            <input type="text" id="logo_name" name="logo_name" placeholder="title..." class="form-control" value="{{$EditContactBanner->logo_name}}" />

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="subtitle">Menu </label>
                                            <input type="text" id="menu" name="menu" placeholder="menu..." class="form-control" value="{{$EditContactBanner->menu}}" />

                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="contact_image"> Contact Banner image</label>
                                            <div class="row">
                                                <div class="col-md-auto px-1">
                                                    @if(isset($EditContactBanner->contact_image))
                                                    <img src="{{asset($EditContactBanner->contact_image)}}" class="px-2" id="before_img" alt="" height="80px" width="80px">
                                                    <span class="form-label px-2" for="before_img">Before image</span>

                                                    @endif
                                                </div>
                                                <div class="col-md-auto mt-auto px-1">
                                                    <input type="file" name="contact_image" id="contact_image" class="form-control border-0 p-3 border-none" @if(!isset($EditContactBanner->contact_image)) required @endif />
                                                    @error('contact_image') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="card-footer text-muted">
                                <a href="{{ url()->previous() }}" class="btn btn-info-cs btn-sm float-left "><i class="fa fa-arrow-left"></i> &nbsp Back</a>
                                <button type="submit" class="btn btn-info-cs text-white btn-sm float-right"> <i class="fa fa-save"></i>&nbsp Update </button>
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