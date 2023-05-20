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

                     <div class="card  shadow-none border-0 mt-3">
                         <div class="card-header px-3">
                             <h3 class="card-title"><span>Product Images List </span>
                                 <span class="alert alert-success d-none p-0 bg-white" id="msg_div">
                                     <span id="res_message"></span>
                                 </span>
                             </h3>

                         </div>


                         <!-- /.card-header -->
                         <div class="card-body">
                             <table id="example1" class="table table-bordered table-striped ytable">
                                 <tr>
                                     <thead>
                                         <th> S/L </th>
                                         <th>Product Name</th>
                                         <th>Product Image</th>
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

                 <!-- /edit modal -->
                 <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel">
                     <div class=" modal-dialog modal-lg">
                         <form id="category_update" class="contact-form" enctype="multipart/form-data">
                             @csrf
                             <div class="modal-content">

                                 <div class="modal-header bg-light px-4">
                                     <h4 class="modal-title h5" id="exampleModalLabel">Edit sub category </h4>
                                     <button type="button" class="btn-close" id="closemodal" data-bs-dismiss="modal" aria-label="Close"></button>

                                     </button>
                                 </div>
                                 <div class="modal-body">

                                     <div class="card shadow-none border-0">

                                         <div class="card-body border-primary">

                                             <div class="row">
                                                 <input type="hidden" name="id" id="subcatagory_id" />

                                                 <div class="col-12 col-md-6">
                                                     <div class="form-group">
                                                         <label class="form-label" for="e_product_name">Product Name </label>
                                                         <input type="text" name="product_name" id="e_product_name" placeholder="Enter category name..." class="form-control" required />
                                                         <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                                         @error('product_name') <span class="error">{{ $message }}</span> @enderror
                                                     </div>
                                                 </div>


                                                 <div class="col-12 col-md-6">
                                                     <div class="form-group">
                                                         <label class="form-label" for="product_image"> Product Image </label>
                                                         <div class="row">
                                                             <div class="col-md-auto px-1">
                                                                 <span id="image"> </span>
                                                                 <span class="form-label px-2" for="before_img">Before image</span>
                                                             </div>
                                                             <div class="col-md-auto mt-auto px-1">
                                                                 <input type="file" name="product_image" id="product_image" class="form-control" />
                                                                 @error('product_image') <span class="error">{{ $message }}</span> @enderror
                                                             </div>
                                                         </div>

                                                     </div>
                                                 </div>



                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="modal-footer border-0 shadow-none bg-light">
                                     <button type="submit" class="btn btn-info-cs text-white btn-sm float-right" id="sent_category_update"> <i class="fa fa-save"></i>&nbsp Create </button>
                                     <button type="reset" class="btn btn-info-cs text-white btn-sm float-right"> <i class="fas fa-broom"></i>&nbsp Reset </button>

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

 <script>
     $(document).ready(function() {
         $('body').on('click', '#edit', function() {
             var selector = $(this);
             let updateUrl = $(this).attr("link");
             let id = $(this).data('id');
             //alert(id);
             $.get("/product_image/edit/" + id, function(data) {
                 // console.log(data);

                 $('#subcatagory_id').val(data.id);
                 $('#category_id').val(data.category_id);
                 $('#e_product_name').val(data.product_name);
                 $('#e_sub_category_slug').val(data.sub_category_slug);
                 $('#image').html('<img src="uploads/product_image/' + data.product_image + '" height="50px"/>');

                 $("#e_category_id option[value='" + data.category_id + "']").attr("selected", "selected");

                 $('body').on('click', '#sent_category_update', function() {
                     $.ajax({
                         url: updateUrl,
                         type: "POST",
                         data: $('#category_update').serialize(),
                         success: function(array) {
                             //alert(updateUrl);
                             $('#sent_category_update').html('update');
                             document.getElementById("category_update").reset();
                             $('#edit_modal').modal('toggle');
                             toastr.success('Category update Success.');
                             $('#sent_category_update').reset();
                             //var row = $(selector).parent('td').parent('tr').show();
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



 <script type="text/javascript">
     $(function subcategory() {
         var table = $('.ytable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('admin.product_image') }}",
             columns: [{
                     data: 'DT_RowIndex',
                     name: 'DT_RowIndex'
                 },

                 {
                     data: 'product_name',
                     name: 'product_name'
                 },

                 {
                     data: 'product_image',
                     name: 'product_image',
                     "render": function(data, type, full, meta) {
                         return "<img src=\"/uploads/product_image/" + data + "\" height=\"40px\"/>"
                     }
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
 </script>

 @endsection
