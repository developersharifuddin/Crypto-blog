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
                    <h2 class="fs-4">About-us List</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">About-us</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('aboutList.update', $about_us_lists->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-primary">

                            <div class="card-header py-3 border-0 shadow-none">
                                <h4 class="card-title fs-5"> Create About-us </h4>
                            </div>

                            <div class="card-body border-primary">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="sequence">Sequence </label>
                                            <input type="number" name="sequence" id="sequence" value="{{$about_us_lists->sequence}}" placeholder="Enter Icon name..." class="form-control" required />
                                            @error('sequence') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="list">list Name</label>
                                            <input type="text" name="list" id="list" value="{{$about_us_lists->list}}" placeholder="Enter list..." class="form-control" required />
                                            @error('list') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer border-0 shadow-none">
                                <button type="submit" class="btn btn-info-cs text-white btn-sm mx-2 float-right"><i class="fa fa-save"></i> Update</button>
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