@extends('layouts.admin_layout')
@section("title")
Admin | Menu List
@endsection

 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Menu List</a></li>
                        <li class="breadcrumb-item active">Menu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <form action="{{route('header.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">

                        <div class="modal-header bg-light px-4">
                            <h4 class="modal-title h5"> Create a Menu </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="card  shadow-none border-0">

                                <div class="card-body border-primary">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="menu_name"> Menu name </label>
                                                <input type="text" name="menu_name" id="menu_name" placeholder="Enter menu name..." class="form-control" required />
                                                @error('menu_name') <span class="error">{{ $message }}</span> @enderror
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

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 shadow-none bg-light">
                            <button type="submit" class="btn btn-info-cs text-white btn-sm float-right"> <i class="fa fa-save"></i>&nbsp Save </button>
                        </div>

                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->





        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-12">
                    <button type="button" class="btn btn-info-cs" data-toggle="modal" data-target="#modal-lg">
                        <i class="fa fa-plus"></i> Create Menu
                    </button>

                    <div class="card border-primary my-3">
                        <div class="card-header border-0 shadow-none">
                            <h1 class="card-title">Menu List</h1>
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
                                        <th>Menu Name</th>
                                        <th>Url</th>
                                        <th>Sequense</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($headers as $key=>$header)
                                    <tr class="text-center">
                                        <td> {{$key + 1}}</td>
                                        <td> {{$header->menu_name}} </td>
                                        <td> {{$header->url}} </td>
                                        <td> {{$header->sequense}} </td>

                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm edit" id="edit" href="{{route('header.edit', $header->id)}}">
                                                <i class="fas fa-pencil-alt"> </i>
                                            </a>

                                            <form id="delete-form-{{$header->id}}" action="{{route('header.destroy', $header->id)}}" method="post" style="display:none">
                                                @csrf
                                                @method('GET')
                                            </form>
                                            <a class="btn btn-danger btn-sm">
                                                <button type="submit" rel="tooltip" title="Remove" onclick="if( confirm('are you sure to delete this?')){
                                            event.preventDefault(); document.getElementById('delete-form-{{$header->id}}').submit();
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