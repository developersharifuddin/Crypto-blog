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
                    <h1> Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Slider List</a></li>
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
                    <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-primary mt-3">

                            <div class="card-header py-3 border-0 shadow-none">
                                <h4 class="card-title fs-5">
                                    @if(isset($banner->id)) Update Slider @else Create Slider @endif
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
                                            <label class="form-label" for="title"> Title </label>
                                            <input type="text" name="title" id="title" placeholder="Enter title..." class="form-control" @if(isset($banner->title)) value="{{$banner->title}}" @endif required />
                                            @error('title') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Sub title</label>
                                            <input type="text" name="sub_title" id="sub_title" placeholder="Enter sub_title..." class="form-control" @if(isset($banner->sub_title)) value="{{$banner->sub_title}}" @endif required />
                                            @error('sub_title') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="btn_name">Btn name</label>
                                            <input type="text" name="btn_name" id="btn_name" placeholder="Enter btn_name..." class="form-control" @if(isset($banner->btn_name)) value="{{$banner->btn_name}}" @endif required />
                                            @error('btn_name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="btn_url">Btn url</label>
                                            <input type="text" name="btn_url" id="btn_url" placeholder="Enter btn_url..." class="form-control" @if(isset($banner->btn_url)) value="{{$banner->btn_url}}" @endif required />
                                            @error('btn_url') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="video_play_link">Video play link</label>
                                            <input type="text" name="video_play_link" id="video_play_link" placeholder="Enter video_play_link..." class="form-control" @if(isset($banner->video_play_link)) value="{{$banner->video_play_link}}" @endif required />
                                            @error('video_play_link') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="video_play_icon">Video play icon</label>
                                            <input type="text" name="video_play_icon" id="video_play_icon" placeholder="Enter video_play_icon..." class="form-control" @if(isset($banner->video_play_icon)) value="{{$banner->video_play_icon}}" @endif required />
                                            @error('video_play_link') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="banner_image">Banner image</label>
                                            <div class="row">
                                                <div class="col-md-auto px-1">
                                                    @if(isset($banner->banner_image))
                                                    <img src="{{asset('uploads/banner_image/'.$banner->banner_image)}}" class="px-2" id="before_img" alt="" height="70px" width="70px" style="border-radius: 5px;">
                                                    <span class="form-label px-2" for="before_img">Before image</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-auto mt-auto px-1">
                                                    <input type="file" name="banner_image" id="banner_image" class="form-control border-0 p-3 border-none" @if(!isset($banner->banner_image)) required @endif />
                                                    @error('banner_image') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer border-0 shadow-none">
                                <button type="submit" class="btn btn-info-cs text-white btn-sm float-right"> <i class="fa fa-save"></i>&nbsp Save </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>



        <section class="content d-none">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-primary my-3">
                            <div class="card-header border-0 shadow-none">
                                <h3 class="card-title">Slider List</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body px-0">

                                <table id="example1" class="table table-bordered table-striped table-responsive px-0">
                                    <thead>
                                        <tr class="text-center">
                                            <!-- <th style="width: 1%">  # </th> -->


                                            <th>SL</th>
                                            <th>Title</th>
                                            <th>Sub_title</th>
                                            <th>Btn_name</th>
                                            <th>Btn_url</th>
                                            <th>Video_play_link</th>
                                            <th>Banner_image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($banners as $key=>$banner)
                                        <tr class="text-center">
                                            <td> {{$key + 1}}</td>
                                            <td> {{$banner->title}} </td>
                                            <td> {{$banner->sub_title}} </td>
                                            <td>{{$banner->btn_name}}</td>
                                            <td>{{$banner->btn_url}}</td>
                                            <td>{{$banner->video_play_link}}</td>
                                            <td>{{$banner->banner_image}}</td>
                                            <td class="project-actions">
                                                <a class="btn btn-primary btn-sm edit" id="edit" href="{{route('banner.edit', $banner->id)}}">
                                                    <i class="fas fa-pencil-alt"> </i>
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="{{route('banner.destroy', $banner->id)}}">
                                                    <i class="fas fa-trash"> </i>
                                                </a>
                                            </td>
                                            </td>

                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('body').on('click', '#edit', function() {
            let id = $(this).data('id');
            //alert(id);
            $.get("banner/edit/" + id, function(data) {
                console.log(data);
                // for (i = 0; i <= data.length; i++) {
                //     $('#phone').val(data[i].phone);
                //     $('#email').val(data[i].email);
                //     //alert(data[i].email);

                // }
            });
        });
    });
</script>
@endsection