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
                    <h2 class="fs-4">About-us lists</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">About-us lists</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('aboutList.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-primary">
                            <div class="card-header py-3 border-0 shadow-none">
                                <h4 class="card-title fs-5">Create About-us Lists </h4>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="sequence">Sequence </label>
                                            <input type="number" name="sequence" id="sequence" placeholder="Enter Icon name..." class="form-control" required />
                                            @error('sequence') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="list">list Name</label>
                                            <input type="text" name="list" id="list" placeholder="Enter list..." class="form-control" required />
                                            @error('list') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="card-footer border-0 shadow-none">
                                <button type="submit" class="btn btn-info-cs text-white btn-sm mx-2 float-right"><i class="fa fa-save"></i> Update</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

</div>





<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-primary my-3">
                <div class="card-header border-0 shadow-none">
                    <h3 class="card-title">About-us List</h3>

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
                                <th>Sequence</th>
                                <th>list</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($about_us_lists as $key=>$about_us_list)
                            <tr class="text-center">
                                <td> {{$key + 1}}</td>
                                <td> {{$about_us_list->sequence}} </td>
                                <td> {{$about_us_list->list}} </td>

                                <td class="project-actions">
                                    <a class="btn btn-primary btn-sm edit" id="edit" href="{{route('aboutList.edit', $about_us_list->id)}}">
                                        <i class="fas fa-pencil-alt"> </i>
                                    </a>

                                    <form id="delete-form-{{$about_us_list->id}}" action="{{route('aboutList.destroy', $about_us_list->id)}}" method="post" style="display:none">
                                        @csrf
                                        @method('GET')
                                    </form>
                                    <a class="btn btn-danger btn-sm">
                                        <button type="submit" rel="tooltip" title="Remove" onclick="if( confirm('are you sure to delete this?')){
                                            event.preventDefault(); document.getElementById('delete-form-{{$about_us_list->id}}').submit();
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