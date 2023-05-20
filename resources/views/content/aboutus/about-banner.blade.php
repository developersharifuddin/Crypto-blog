@extends('layouts.admin_layout')
@section("title")
Admin | Banner
@endsection
 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> About Page Breadcrumb</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Breadcrumb</a></li>
                        <li class="breadcrumb-item active">Page Breadcrumb</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('about-banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-primary mt-3">

                            <div class="card-header py-3 border-0 shadow-none">
                                <h4 class="card-title fs-5">
                                    @if(isset($banner->id)) Update Breadcrumb @else Create Breadcrumb @endif
                                </h4>
                                @if(isset($banner->id))
                                <span class="project-actions float-end d-none">
                                    <a class="btn btn-danger btn-sm" href="{{route('banner.destroy', $banner->id)}}">
                                        <i class="fas fa-trash"> </i> Delete Field
                                    </a>
                                </span>
                                @endif
                            </div>


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="about_title"> About title </label>
                                            <input type="text" name="about_title" id="about_title" placeholder="Enter about_title..." class="form-control" @if(isset($banner->about_title)) value="{{$banner->about_title}}" @endif required />
                                            @error('about_title') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="menu">Menu name</label>
                                            <input type="text" name="menu" id="menu" placeholder="Enter menu..." class="form-control" @if(isset($banner->menu)) value="{{$banner->menu}}" @endif required />
                                            @error('menu') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="logo_name">Page name</label>
                                            <input type="text" name="logo_name" id="logo_name" placeholder="Enter logo_name..." class="form-control" @if(isset($banner->logo_name)) value="{{$banner->logo_name}}" @endif required />
                                            @error('logo_name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="card-footer border-0 shadow-none">
                                <button type="submit" class="btn btn-info-cs text-white btn-sm float-right"> <i class="fa fa-save"></i>&nbsp Update </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


</div>
<!-- /.content-wrapper -->

@endsection