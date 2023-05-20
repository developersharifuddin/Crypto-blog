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
                     <h1> program list </h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">program list</a></li>
                         <li class="breadcrumb-item active">program</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>
     <section class="content">


         <div class="modal fade" id="modal-lg">
             <div class="modal-dialog modal-lg">
                 <form action="{{route('program.store')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="modal-content">

                         <div class="modal-header bg-light px-4">
                             <h4 class="modal-title h5">Create a programs </h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&dates;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div class="card  shadow-none border-0">
                                 <div class="card-body border-primary">
                                     <div class="row">
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                 <label class="form-label" for="title">program Nname</label>
                                                 <input type="text" name="title" id="title" placeholder="Enter program name..." class="form-control" required />
                                                 @error('title') <span class="error">{{ $message }}</span> @enderror
                                             </div>
                                         </div>
                                         <div class="col-12 col-md-6">
                                             <div class="form-group">
                                                 <label class="form-label" for="date"> Program Date </label>
                                                 <input type="datetime-local" name="date" id="date" placeholder="Enter program date..." class="form-control" required />
                                                 @error('date') <span class="error">{{ $message }}</span> @enderror
                                             </div>
                                         </div>



                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="modal-footer border-0 shadow-none bg-light">
                             <button type="submit" class="btn btn-info-cs text-white btn-sm float-right"> <i class="fa fa-save"></i>&nbsp Create </button>
                         </div>

                     </div>
                 </form>
                 <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->


         <div class="container-fluid">
             <div class="row">
                 <div class="col-12 mt-3">

                     <button type="button" class="btn btn-info-cs" data-toggle="modal" data-target="#modal-lg">
                         <i class="fa fa-plus"></i> Add a Progrom
                     </button>

                     <div class="card border-primary my-3">
                         <div class="card-header border-0 shadow-none">
                             <h3 class="card-title">program List</h3>

                             <div class="card-tools">
                                 <button type="button" class="btn btn-tool my-auto d-none" data-card-widget="collapse" title="Collapse">
                                     <i class="fas fa-minus"></i>
                                 </button>
                                 <button type="button" class="btn btn-tool d-none" data-card-widget="remove" title="Remove">
                                     <i class="fas fa-dates"></i>
                                 </button>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body p-0">

                             <table class="table table-bordered table-striped  p-0">
                                 <thead>
                                     <tr class="text-center">
                                         <!-- <th style="width: 1%">  # </th> -->
                                         <th>SL</th> 
                                         <th>program Name</th>
                                         <th>program Date</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($programs as $key=>$program)
                                     <tr class="text-center">
                                         <td> {{$key + 1}}</td>
                                           <td> {{$program->title}} </td>
                                         <td> {{$program->date}} </td>

                                         <td class="project-actions">
                                             <a class="btn btn-sm edit" id="edit" href="{{route('program.edit', $program->id)}}">
                                                 <i class="fas fa-pencil-alt"> </i>
                                             </a>

                                             <form id="delete-form-{{$program->id}}" action="{{route('program.destroy', $program->id)}}" method="post" style="display:none">
                                                 @csrf
                                                 @method('GET')
                                             </form>
                                             <a class="btn btn-sm">
                                                 <button type="submit" class="bg-danger border-0" rel="tooltip" title="Remove" onclick="if( confirm('are you sure to delete this?')){
                                            event.preventDefault(); document.getElementById('delete-form-{{$program->id}}').submit();
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