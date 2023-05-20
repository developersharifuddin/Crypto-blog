@extends('layouts.admin_layout')
@section("title")
Admin | Social link
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
                    <h1> Social List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Social List</a></li>
                        <li class="breadcrumb-item active">Social</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('social_links.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-primary">
                            <div class="card-header py-3 border-0 shadow-none">
                                <h4 class="card-title fs-5"> Create Social link </h4>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool mt-auto" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool d-none" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body border-primary">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="name"> Social Name </label>
                                            <input type="text" name="name" id="name" placeholder="Enter menu name..." class="form-control" required />
                                            @error('name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="url">URL</label>
                                            <input type="text" name="url" id="url" placeholder="Enter url..." class="form-control" required />
                                            @error('url') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="sequense">sequense</label>
                                            <input type="number" name="sequense" id="sequense" placeholder="Enter sequense..." class="form-control" required />
                                            @error('sequense') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="icon">icon Name</label>
                                            <input type="text" name="icon" id="icon" placeholder="Enter icon..." class="form-control" required />
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer border-0 shadow-none">
                                <button type="submit" class="btn btn-info-cs text-white btn-sm float-right"> <i class="fa fa-save"></i>&nbsp Create </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>





        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card border-primary my-3">
                        <div class="card-header border-0 shadow-none">
                            <h3 class="card-title">Social Link</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool mt-auto d-none" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool d-none" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

                            <table class="table table-bordered table-striped table-responsive px-0">
                                <thead>
                                    <tr class="text-center">
                                        <!-- <th style="width: 1%">  # </th> -->


                                        <th>SL</th>
                                        <th>Social Name</th>
                                        <th>Url</th>
                                        <th>Sequense</th>
                                        <th>Icon Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($social_links as $key=>$social_links)
                                    <tr class="text-center">
                                        <td> {{$key + 1}}</td>
                                        <td> {{$social_links->name}} </td>
                                        <td> {{$social_links->url}} </td>
                                        <td> {{$social_links->sequense}} </td>
                                        <td> {{$social_links->icon}} </td>

                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm edit" id="edit" href="{{route('social_links.edit', $social_links->id)}}">
                                                <i class="fas fa-pencil-alt"> </i>
                                            </a>

                                            <form id="delete-form-{{$social_links->id}}" action="{{route('social_links.destroy', $social_links->id)}}" method="post" style="display:none">
                                                @csrf
                                                @method('GET')
                                            </form>
                                            <a class="btn btn-danger btn-sm">
                                                <button type="submit" rel="tooltip" title="Remove" onclick="if( confirm('are you sure to delete this?')){
                                            event.preventDefault(); document.getElementById('delete-form-{{$social_links->id}}').submit();
                                            }else{ event.preventDefault(); }"> <i class="fas fa-trash"> </i>
                                                </button>
                                            </a>
                                        </td>


                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
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
            $.get("social_links/edit/" + id, function(data) {
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