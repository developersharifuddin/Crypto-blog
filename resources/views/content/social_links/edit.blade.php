@extends('layouts.admin_layout')
@section("title")
Admin | Social links
@endsection

@push("css")
<style>
    label {
        color: #777 !important
    }

    input {
        border-radius: 5px !important;
        border: 1px solid blue !important;
        height: 45px !important;
    }


    input:focus {
        border: 0px !important;
        transition: border .1s !important
    }


    button.btn-info-cs,
    a.btn-info-cs,
    .btn-danger {
        background: #5011c4 !important;
        color: #e6e6e6 !important;
        border: none !important;
    }


    button.btn-info-cs:hover {
        background: #2f0380 !important;
        color: #fff !important;
    }
</style>
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Social links List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Social links Edit</a></li>
                        <li class="breadcrumb-item active">Social links</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('social_links.update', $social_links->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-primary">
                            <div class="card-header py-3 border-0 shadow-none">
                                <h4 class="card-title fs-5"> Create Social links </h4>
                            </div>
                            <div class="card-body border-primary">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="name"> Social Name </label>
                                            <input type="text" name="name" id="name" value="{{$social_links->name}}" placeholder="Enter menu name..." class="form-control" required />
                                            @error('name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="url">URL</label>
                                            <input type="text" name="url" id="url" value="{{$social_links->url}}" placeholder="Enter url..." class="form-control" required />
                                            @error('url') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="sequense">sequense</label>
                                            <input type="number" name="sequense" id="sequense" value="{{$social_links->sequense}}" placeholder="Enter sequense..." class="form-control" required />
                                            @error('sequense') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="icon">icon Name</label>
                                            <input type="text" name="icon" id="icon" value="{{$social_links->icon}}" placeholder="Enter icon..." class="form-control" required />
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="card-footer border-0 shadow-none">
                                <button type="submit" class="btn btn-info-cs btn-sm float-right"> <i class="fa fa-save"></i>&nbsp Update </button>
                                <a href="{{ url()->previous() }}" class="btn btn-info-cs btn-sm float-left"> <i class="fa fa-arrow-left"></i>&nbsp Back </a>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('body').on('click', '#edit', function() {
            let id = $(this).data('id');
            //alert(id);
            $.get("header/edit/" + id, function(data) {
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