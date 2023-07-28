@extends('layouts.admin_layout')
@section("title")
Admin | Post
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h6 class="pt-4"><span> Create a New Post and Published </span>
                    <span class="alert alert-success d-none p-0 bg-white" id="msg_div">
                        <span id="res_message"></span>
                    </span>
                </h6>
            </div>
            <div class="col-md-12 border-0">
                <div class="card shadow-none border-0 mt-3" style="background: none !important">
                    <div class="card-header px-0 border-0 shadow-0 d-block d-lg-none" style="background: none !important">
                        <button type="button" class="btn btn-info-cs float-right fs-6" data-bs-toggle="modal" data-bs-target="#modal-md">
                            <i class="fa fa-plus"></i> Create and Published
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body border bg-white">

                        @stack('script')
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                        <script src="http://parsleyjs.org/dist/parsley.js"></script>
                        <style>
                            .box {
                                width: 100%;
                                max-width: 600px;
                                background-color: #f9f9f9;
                                border: 1px solid #ccc;
                                border-radius: 5px;
                                padding: 16px;
                                margin: 0 auto;
                            }

                            input.parsley-success,
                            select.parsley-success,
                            textarea.parsley-success {
                                color: #468847;
                                background-color: #DFF0D8;
                                border: 1px solid #D6E9C6;
                            }

                            input.parsley-error,
                            select.parsley-error,
                            textarea.parsley-error {
                                color: #B94A48;
                                background-color: #F2DEDE;
                                border: 1px solid #EED3D7;
                            }

                            .parsley-errors-list {
                                margin: 2px 0 3px;
                                padding: 0;
                                list-style-type: none;
                                font-size: 0.9em;
                                line-height: 0.9em;
                                opacity: 0;

                                transition: all .3s ease-in;
                                -o-transition: all .3s ease-in;
                                -moz-transition: all .3s ease-in;
                                -webkit-transition: all .3s ease-in;
                            }

                            .parsley-errors-list.filled {
                                opacity: 1;
                            }

                            .parsley-type,
                            .parsley-required,
                            .parsley-equalto,
                            .parsley-pattern,
                            .parsley-length {
                                color: #ff0000;
                            }

                            .form-group {
                                height: 80px
                            }

                        </style>
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" id="validate_form">
                            @csrf

                            <div class="row">
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="title" class="form-label">Title </label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" data-parsley-trigger="keyup" placeholder="Enter Title here.." data-parsley-required data-parsley-required-message="type is required" data-parsley-maxlength="200" data-parsley-maxlength-message="Maximum length of type name is 200">
                                    @error('title') <div class="alert alert-danger bg-transparent border-0 py-1 px-0">{{ $message }}</div> @enderror
                                </div>


                                <div class="mb-3 col-12 col-md-6">
                                    <label for="sub_title" class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control  @error('sub_title') is-invalid @enderror" id="sub_title" placeholder="Sub title here..">
                                    @error('sub_title') <div class="alert alert-danger  bg-transparent border-0 py-1 px-0">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="summernote" rows="15" name="description" class="form-control h-50 @error('description') is-invalid @enderror" id="description" placeholder="description" style="height:300px !important">
                                                    Place  Your Descriptions <strong>here...</strong> <br><br><br><br><br><br><br><br>
                                                </textarea>
                                    @error('description') <div class="alert alert-danger  bg-transparent border-0 py-1 px-0">{{ $message }}</div> @enderror
                                </div>


                                <div class="mb-3 col-12 col-md-6">
                                    <label for="images" class="form-label">Images</label>
                                    <input type="file" name="images" class="form-control  @error('images') is-invalid @enderror" id="images" placeholder="images">
                                    @error('images') <div class="alert alert-danger  bg-transparent border-0 py-1 px-0">{{ $message }}</div> @enderror
                                </div>

                            </div>
                            <div class="mb-3 text-end">
                                <input type="submit" name="submit" id="submit" value="Create and Published" class="btn btn-success" />
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    element.style {
        height: 300px !important;
    }

</style>


@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script>
    $(document).ready(function() {


        $('#validate_form').parsley();
        $('#validate_form').on('submit', function(event) {
            event.preventDefault();

            if ($('#validate_form').parsley().isValid()) {
                $.ajax({
                    url: '{{route("post.store")}}'
                    , method: "POST"
                    , data: $(this).serialize()
                    , dataType: "json"
                    , beforeSend: function() {
                        $('#submit').attr('disabled', 'disabled');
                        $('#submit').val('Submitting...');
                    }
                    , success: function(data) {
                        $('#validate_form')[0].reset();
                        $('#validate_form').parsley().reset();
                        $('#submit').attr('disabled', false);
                        $('#submit').val('Submit');
                        alert(data.success);
                    }
                    , error: function(data) {
                        console.log(error.response.data);
                    }
                });
            }
        });

    });

</script>


@endpush
@endsection
