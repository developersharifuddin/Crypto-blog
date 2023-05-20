@extends('layouts.admin_layout')
@section("title")
Admin | About-us
@endsection
 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About-us List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">About</a></li>
                        <li class="breadcrumb-item active">about-us</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-primary mt-3">

                            <div class="card-header py-3 border-0 shadow-none">
                                <h4 class="card-title fs-5">
                                    @if(isset($aboutus->id)) About-us @else Create about-us @endif
                                </h4>
                                @if(isset($aboutus->id))
                                <span class="project-actions float-end d-none">
                                    <a class="btn btn-danger btn-sm" href="{{route('about.destroy', $aboutus->id)}}">
                                        <i class="fas fa-trash"> </i> Delete Field
                                    </a>
                                </span>
                                @endif
                            </div>

                            <div class="card-body border-primary">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title"> Title </label>
                                            <input type="text" name="title" id="title" placeholder="Enter title..." class="form-control" @if(isset($aboutus->title)) value="{{$aboutus->title}}" @endif required />
                                            @error('title') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Sub title</label>
                                            <input type="text" name="sub_title" id="sub_title" placeholder="Enter sub_title..." class="form-control" @if(isset($aboutus->sub_title)) value="{{$aboutus->sub_title}}" @endif required />
                                            @error('sub_title') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="btn_name">Btn name</label>
                                            <input type="text" name="btn_name" id="btn_name" placeholder="Enter btn_name..." class="form-control" @if(isset($aboutus->btn_name)) value="{{$aboutus->btn_name}}" @endif required />
                                            @error('btn_name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="btn_url">Btn url</label>
                                            <input type="text" name="btn_url" id="btn_url" placeholder="Enter btn_url..." class="form-control" @if(isset($aboutus->btn_url)) value="{{$aboutus->btn_url}}" @endif required />
                                            @error('btn_url') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Description</label>
                                            <input type="text" name="description" id="description" placeholder="Enter description..." class="form-control" @if(isset($aboutus->description)) value="{{$aboutus->description}}" @endif required />
                                            @error('description') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="image">About-us image</label>
                                            <div class="row">
                                                <div class="col-md-auto px-1">
                                                    @if(isset($aboutus->image))
                                                    <img src="{{asset('uploads/about_us/'.$aboutus->image)}}" class="px-2" id="before_img" alt="" height="70px" width="70px" style="border-radius: 5px;">
                                                    <span class="form-label px-2" for="before_img">Before image</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-auto mt-auto px-1">
                                                    <input type="file" name="image" id="image" class="form-control border-0 p-3 border-0" @if(!isset($aboutus->image)) required @endif />
                                                    @error('image') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

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