@extends('layouts.admin_layout')
@section("title")
Admin | Slider
@endsection

 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="fs-4">Slider List</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('banner.update', $banner->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-primary">
                            <div class="card-header py-3 border-0 shadow-none">
                                <h4 class="card-title fs-5"> Update Slider </h4>
                                <button type="submit" class="btn btn-info text-white btn-sm mx-2"><i class="fa fa-save"></i> update</button>
                            </div>
                            <div class="card-body border-primary">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title"> Title </label>
                                            <input type="text" name="title" id="title" value="{{$banner->title}}" placeholder=" Enter title..." class="form-control" />
                                            @error('title') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Sub title</label>
                                            <input type="text" name="sub_title" id="sub_title" value="{{$banner->sub_title}}" placeholder=" Enter sub_title..." class="form-control" />
                                            @error('sub_title') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="btn_name">Btn name</label>
                                            <input type="text" name="btn_name" id="btn_name" value="{{$banner->btn_name}}" placeholder=" Enter btn_name..." class="form-control" />
                                            @error('btn_name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="btn_url">Btn url</label>
                                            <input type="text" name="btn_url" id="btn_url" value="{{$banner->btn_url}}" placeholder=" Enter btn_url..." class="form-control" />
                                            @error('btn_url') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="video_play_link">Video play link</label>
                                            <input type="text" name="video_play_link" id="video_play_link" value="{{$banner->video_play_link}}" placeholder=" Enter video_play_link..." class="form-control" />
                                            @error('video_play_link') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="video_play_icon">Video play icon</label>
                                            <input type="text" name="video_play_icon" id="video_play_icon" value="{{$banner->video_play_icon}}" placeholder=" Enter video_play_icon..." class="form-control" />
                                            @error('video_play_link') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="banner_image">Slider image</label>

                                            <img src="{{asset('uploads/banner_image/'.$banner->banner_image)}}" id="before_img" alt="" height="70px" width="70px" style="border-radius: 5px;">
                                            <span class="form-label" for="before_img">before image</span>
                                            <input type="file" name="banner_image" id="banner_image" value="{{$banner->banner_image}}" class=" form-control border-0 p-3 border-0" />
                                            @error('banner_image') <span class="error">{{ $message }}</span> @enderror
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="card-footer border-0 shadow-none">

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection