@extends('layouts.admin_layout')
@section("title")
Admin | Post
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="fs-4">Program List</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">program</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('program.update', $programs->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-primary">
                            <div class="card-header py-3 border-0 shadow-none">
                                <h4 class="card-title fs-5"> Create program </h4>
                            </div>
                            <div class="card-body border-primary">
                                <div class="row">
                                <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                 <label class="form-label" for="title">program Nname</label>
                                                 <input type="text" name="title" id="title" value="{{$programs->title}}" placeholder="Enter program name..." class="form-control" required />
                                                 @error('title') <span class="error">{{ $message }}</span> @enderror
                                             </div>
                                         </div>
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                 <label class="form-label" for="date"> Program Date </label>
                                                 <input type="datetime-local" name="date" id="date"  value="{{$programs->date}}" placeholder="Enter program name..." class="form-control" required />
                                              
                                                 @error('date') <span class="error">{{ $message }}</span> @enderror
                                             </div>
                                         </div>
                                    <!-- <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="services_url">program Item Url</label>
                                            <input type="text" name="services_url" id="services_url" placeholder="Enter services_url..." class="form-control" required />
                                            @error('services_url') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div> -->

 

                                </div>
                            </div>
                            <div class="card-footer border-0 shadow-none">
                                <button type="submit" class="btn btn-info-cs text-white btn-sm float-right"> <i class="fa fa-save"></i>&nbsp Update </button>
                                <a href="{{ url('/program')}}" class="btn btn-info-cs btn-sm float-left"> <i class="fa fa-arrow-left"></i>&nbsp Back </a>
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