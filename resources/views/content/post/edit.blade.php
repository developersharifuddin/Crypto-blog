@extends('layouts.admin_layout')
@section("title")
Admin | Update Post
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h6 class="pt-4"><span>Update Post</span>
                    <span class="alert alert-success d-none p-0 bg-white" id="msg_div">
                        <span id="res_message"></span>
                    </span>
                </h6>
            </div>
            <div class="col-md-12 border-0">
                <div class="card shadow-none border-0 mt-3" style="background: none !important">
                    <div class="card-header px-0 border-0 shadow-0 d-block d-lg-none" style="background: none !important">
                        <button type="button" class="btn btn-info-cs float-right" data-bs-toggle="modal" data-bs-target="#modal-md">
                            <i class="fa fa-plus"></i> Update Post
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body border-0 shadow-none bg-white">

                        <div class="card col-md-12 border-0 shadow-none">
                            <div class="card-body">
                                <form action="{{route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="title" class="form-label">Title </label>
                                            <input type="text" name="title" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title" data-parsley-trigger="keyup" placeholder="Enter type" data-parsley-required data-parsley-required-message="type is required" data-parsley-maxlength="200" data-parsley-maxlength-message="Maximum length of type name is 200">
                                            @error('title') <div class="alert alert-danger bg-transparent border-0 py-1 px-0">{{ $message }}</div> @enderror
                                        </div>


                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="sub_title" class="form-label">Sub title</label>
                                            <input type="text" name="sub_title" class="form-control" value="{{$post->sub_title}}" @error('sub_title') is-invalid @enderror" id="sub_title" placeholder="sub_title">
                                            @error('sub_title') <div class="alert alert-danger  bg-transparent border-0 py-1 px-0">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="description" class="form-label"> Description</label>
                                            <textarea id="summernote" rows="6" name="description" class="form-control  @error('description') is-invalid @enderror" id="description" placeholder="description"> {{$post->title}} <br><br><br><br><br><br><br><br></textarea>
                                            @error('description') <div class="alert alert-danger  bg-transparent border-0 py-1 px-0">{{ $message }}</div> @enderror
                                        </div>


                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="Images"> Images </label>
                                                <div class="row">
                                                    <div class="col-md-auto px-2">
                                                        <span id="image"> <img src="{{asset('uploads/images/'.$post->images)}}" alt="" height="60px"> </span>
                                                        <span class="form-label px-3" for="before_img">Before image</span>
                                                    </div>
                                                    <div class="col-md-auto mt-auto px-2 pt-2">
                                                        <input type="file" name="images" class="form-control  @error('images') is-invalid @enderror" id="images" placeholder="images">
                                                        @error('images') <div class="alert alert-danger  bg-transparent border-0 py-1 px-0">{{ $message }}</div> @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>




                                        {{-- <div class="mb-3 col-12 col-md-6">
                                                <label for="logo" class="form-label">logo</label>
                                                <input type="text" name="logo" class="form-control  @error('logo') is-invalid @enderror" id="logo"
                                                    placeholder="logo">
                                                    @error('logo') <div class="alert alert-danger  bg-transparent border-0 py-1 px-0">{{ $message }}
                                    </div> @enderror
                            </div> --}}


                            <div class="mb-3 mt-3 text-end ">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>


                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
</div>


@endsection
