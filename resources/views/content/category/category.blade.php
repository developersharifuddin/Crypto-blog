 @extends('layouts.admin_layout')
 @section("title")
 Admin | category
 @endsection

 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <section class="content">
         <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h6 class="pt-4"><span>Category List </span>
                        <span class="alert alert-success d-none p-0 bg-white" id="msg_div">
                            <span id="res_message"></span>
                        </span>
                    </h6>
                </div>
                <div class="col-md-8 border-0">
                     <div class="card shadow-none border-0 mt-3" style="background: none !important">
                         <div class="card-header px-0 border-0 shadow-0 d-block d-lg-none" style="background: none !important">
                            <button type="button" class="btn btn-info-cs float-right" data-bs-toggle="modal" data-bs-target="#modal-md">
                                <i class="fa fa-plus"></i> Add category
                            </button>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body border bg-white">
                            <table id="example1" class="table table-bordered table-striped ytable w-100">
                                <tr>
                                    <thead>
                                        <th> S/L </th>
                                        <th>category Name</th>
                                        <th>action</th>
                                    </thead>
                                </tr>
                                <tbody class="body" id="tablebody">
                                </tbody>
                            </table>
                         </div>
                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
    <!-- /.col -->
    <div class="col-md-4 border-0">

        <div class="card shadow-none mt-3 border-0 bg-white">
           <div class="card-header border-bottom bg-white">
               <h6 class="card-title">Create Category </h6>
           </div>
           <form id="category" class="category-form" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            @method('POST')
            @csrf
                                 <div class="card-body">
                                       <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="name"> Category Name </label>
                                                <input type="text" name="name" id="name" placeholder="Enter category name..." class="form-control" required />
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @error('name') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                       </div>
                                   </div>

                                   <div class="card-footer px-4 border-0  bg-white">
                                    <button type="submit" class="btn btn-info-cs text-white btn-sm float-right mb-3" id="send"> <i class="fa fa-save"></i>&nbsp Create </button>
                                </div>

                   </form>
                   <!-- /.modal-content -->


            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->


{{--
                 <!-- /add modal -->
                 <div class="modal fade" id="modal-md" tabindex="-1" aria-labelledby="exampleModalLabel">
                     <div class=" modal-dialog modal-md">
                         <form id="category" class="category-form" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                             @method('POST')
                             @csrf
                             <div class="modal-content">
                                 <div class="modal-header bg-light px-4">
                                     <h4 class="modal-title h5" id="exampleModalLabel">Create category </h4>
                                     <button type="button" class="btn-close" id="closemodal" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <div class="card shadow-none border-0">
                                         <div class="card-body border-primary">
                                             <div class="row">
                                                 <div class="col-12 col-md-12">
                                                     <div class="form-group">
                                                         <label class="form-label" for="name"> Category Name </label>
                                                         <input type="text" name="name" id="name" placeholder="Enter category name..." class="form-control" required />
                                                         <span class="text-danger">{{ $errors->first('name') }}</span>
                                                         @error('name') <span class="error">{{ $message }}</span> @enderror
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="modal-footer border-0 shadow-none bg-light px-4">
                                     <button type="submit" class="btn btn-info-cs text-white btn-sm" id="send"> <i class="fa fa-save"></i>&nbsp Update </button>
                                 </div>
                             </div>
                         </form>
                         <!-- /.modal-content -->
                     </div>
                     <!-- /.modal-dialog -->
                 </div>
                 <!-- /.modal --> --}}

                 <!-- /edit modal -->
                 <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel">
                     <div class=" modal-dialog modal-md" id="update-modal">
                         <form id="category_update" class="category-form" enctype="multipart/form-data">
                             @csrf
                             <div class="modal-content">

                                 <div class="modal-header bg-light px-4">
                                     <h4 class="modal-title h5" id="exampleModalLabel">Edit category </h4>
                                     <button type="button" class="btn-close" id="closemodal" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <div class="card shadow-none border-0">
                                         <div class="card-body border-primary">
                                             <div class="row">
                                                 <input type="hidden" name="id" id="catagory_id" />
                                                 <div class="col-12 col-md-12">
                                                     <div class="form-group">
                                                         <label class="form-label" for="name"> Category Name </label>
                                                         <input type="text" name="name" id="ename" placeholder="Enter category name..." class="form-control" required />
                                                         <span class="text-danger">{{ $errors->first('name') }}</span>
                                                         @error('name') <span class="error">{{ $message }}</span> @enderror
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="modal-footer border-0 shadow-none bg-light">
                                     <button type="submit" class="btn btn-info-cs text-white btn-sm float-right" id="update"> <i class="fa fa-save"></i>&nbsp Update </button>
                                 </div>
                             </div>
                         </form>
                         <!-- /.modal-content -->
                     </div>
                     <!-- /.modal-dialog -->
                 </div>
                 <!-- /.modal -->
             </div>
             <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
     </section>
     <!-- /.content -->

 </div>
 <!-- /.content-wrapper -->



 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>


 <script type="text/javascript">
     $(document).ready(function() {

         //index
         $(function category() {
             var table = $('.ytable').DataTable({
                 processing: true,
                 serverSide: true,
                 ajax: "{{ route('admin.category') }}",
                 columns: [{
                         data: 'DT_RowIndex',
                         name: 'DT_RowIndex'
                     },
                     {
                         data: 'category_name',
                         name: 'category_name'
                     },
                     {
                         data: 'action',
                         name: 'action',
                         orderable: true,
                         searchable: true
                     },
                 ]
             });
         });

         //create
         $("form#category").submit(function(e) {
             e.preventDefault();
             var formData = new FormData(this);
             $('#send').html('Saveing..');
             $.ajax({
                 url: $(this).attr("action"),
                 type: 'POST',
                 data: formData,
                 success: function(arr) {
                     $('#send').html('create');
                     $('#msg_div').removeClass('d-none');
                     $("#tablebody").append('<tr class="odd"><td class="sorting_1">*</td><td>' + arr.category_name + '</td><td><a link="http://127.0.0.1:8000/category/update/' + arr.id + '" class="btn btn-info btn-sm edit text-light border-0" rel="tooltip" id="edit" title="Edit" data-id="1" data-bs-toggle="modal" data-bs-target="#edit_modal" data-bs-whatever="@mdo"> <i class = "fas fa-pencil-alt" > </i> </a><a link = "http://127.0.0.1:8000/category/destroy/' + arr.id + '" data-id = "' + arr.id + '" class = "btn btn-danger btn-sm shadow border-0 mx-1" id = "delete"> <i class = "fas fa-trash" > </i> </a></td></tr>');
                     document.getElementById("category").reset();
                     $('#modal-md').modal('toggle');
                     toastr.success('Category Add Success.');
                     $('#send').reset();
                 },
                 cache: false,
                 contentType: false,
                 processData: false
             });
         });


         //edit
         $('body').on('click', '.edit', function() {
             var selector = $(this);
             let updateUrl = $(this).attr("link");
             let id = $(this).data('id');
             $.get("/category/edit/" + id, function(data) {
                 $('#catagory_id').val(data.id);
                 $('#ename').val(data.category_name);
                 $("form#category_update").submit(function(e) {
                     e.preventDefault();
                     var formData = new FormData(this);
                     $('#update').html('updating...');
                     $.ajax({
                         url: updateUrl,
                         type: 'POST',
                         data: formData,
                         success: function(arr) {
                             $('#update').html('update');
                             document.getElementById("category_update").reset();
                             $('#edit_modal').modal('toggle');
                             $(selector).parent('td').parent('tr').children('td').eq(1).text(arr.category_name);
                             toastr.success('Category update Success.');
                         },
                         cache: false,
                         contentType: false,
                         processData: false
                     });
                 });
             });
         });




     });
 </script>
 @endsection
