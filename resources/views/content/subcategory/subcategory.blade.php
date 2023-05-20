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
                    <h6 class="pt-4"><span>Sub Category List </span>
                        <span class="alert alert-success d-none p-0 bg-white" id="msg_div">
                            <span id="res_message"></span>
                        </span>
                    </h6>
                </div>
                <div class="col-md-8 border-0">
                     <div class="card shadow-none border-0 mt-3" style="background: none !important">
                         <div class="card-header px-0 border-0 shadow-0 d-block d-lg-none" style="background: none !important">
                            <button type="button" class="btn btn-info-cs float-right" data-bs-toggle="modal" data-bs-target="#insert-modal">
                                <i class="fa fa-plus"></i> Add Sub-category
                            </button>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body border bg-white">
                            <table id="example1" class="table table-bordered table-striped ytable w-100">
                                <tr>
                                    <thead>
                                        <th>S/L</th>
                                        <th>Category Name</th>
                                        <th>Sub-category Name</th>
                                        <th>Sub-Category Image</th>
                                        <th> Action </th>
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
               <h6 class="card-title"> Create Sub-Category </h6>
           </div>
           <form id="subcategory" class="contact-form" action="{{route('subcategory.store')}}" method="post" enctype="multipart/form-data">
            @method('POST')
            @csrf
                                 <div class="card-body">
                                       <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="category_id">category_Name: <span class="text-danger fw-bold">*</span></label>
                                                <select name="category_id" id="category_id" class="form-control form-select" required>
                                                    <option value="" selected>Select a category</option>
                                                    @foreach($categories as $key => $category)
                                                    <option value="{{$category->id}}">{{$key+1}}. {{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="sub_category_name">Sub-category Name </label>
                                                <input type="text" name="sub_category_name" id="sub_category_name" placeholder="Enter category name..." class="form-control" required />
                                                <span class="text-danger">{{ $errors->first('sub_category_name') }}</span>
                                                @error('sub_category_name') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="sub_category_image">Sub-category Image </label>
                                                <input type="file" name="sub_category_image" id="sub_category_image" class="form-control ignore" accept="image/*" required />
                                                @error('sub_category_image') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                       </div>
                                   </div>

                                   <div class="card-footer px-4 border-0  bg-white">
                                    <button type="submit" class="btn btn-info-cs text-white btn-sm float-right mx-2" id="send_form"> <i class="fa fa-save"></i>&nbsp Create </button>
                                    <button type="reset" class="btn btn-info-cs text-white btn-sm float-right"> <i class="fas fa-broom"></i>&nbsp Reset </button>
                                    </div>

                   </form>
                   <!-- /.modal-content -->


            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->




                 <!-- /edit modal -->
                 <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel">
                     <div class=" modal-dialog modal-md">
                         <form id="update_subcategory" enctype="multipart/form-data">
                             @csrf
                             <div class="modal-content">

                                 <div class="modal-header bg-light px-4">
                                     <h4 class="modal-title h5" id="exampleModalLabel">Edit sub category </h4>
                                     <button type="button" class="btn-close" id="closemodal" data-bs-dismiss="modal" aria-label="Close"> </button>

                                     </button>
                                 </div>
                                 <div class="modal-body">

                                     <div class="card shadow-none border-0">

                                         <div class="card-body border-primary">

                                             <div class="row">
                                                 <input type="hidden" name="id" id="subcatagory_id" />

                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="category_id">category_Name: <span class="text-danger fw-bold">*</span></label>
                                                         <select name="category_id" id="e_category_id" class="form-control form-select" required>
                                                             <!-- <option value="">Select a category</option> -->
                                                             @foreach($categories as $key => $category)
                                                             <option value="{{$category->id}}">{{$key+1}}. {{$category->category_name}}</option>
                                                             @endforeach
                                                         </select>
                                                         <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                         @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                                     </div>
                                                 </div>

                                                 <div class="col-12 col-md-6">
                                                     <div class="form-group">
                                                         <label class="form-label" for="e_sub_category_name">Sub-category Name </label>
                                                         <input type="text" name="sub_category_name" id="e_sub_category_name" placeholder="Enter category name..." class="form-control" required />
                                                         <span class="text-danger">{{ $errors->first('sub_category_name') }}</span>
                                                         @error('sub_category_name') <span class="error">{{ $message }}</span> @enderror
                                                     </div>
                                                 </div>


                                                 <div class="col-12 col-md-6">
                                                     <div class="form-group">
                                                         <label class="form-label" for="sub_category_image"> Sub-category Image </label>
                                                         <div class="row">
                                                             <div class="col-md-auto px-1">
                                                                 <span id="image"> </span>
                                                                 <span class="form-label px-2" for="before_img">Before image</span>
                                                             </div>
                                                             <div class="col-md-auto mt-auto px-1">
                                                                 <input type="file" name="sub_category_image" id="sub_category_image" class="form-control" />
                                                                 @error('sub_category_image') <span class="error">{{ $message }}</span> @enderror
                                                             </div>
                                                         </div>

                                                     </div>
                                                 </div>



                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="modal-footer border-0 shadow-none bg-light">
                                     <button type="submit" class="btn btn-info-cs text-white btn-sm float-right updateData" id="update"> <i class="fa fa-save"></i>&nbsp Update </button>

                                     <button type="reset" class="btn btn-info-cs text-white btn-sm float-right"> <i class="fas fa-broom"></i>&nbsp Reset </button>

                                 </div>

                             </div>
                         </form>
                         <!-- /.modal-content -->
                     </div>
                     <!-- /.modal-dialog -->
                 </div>
                 <!-- /.modal -->




                 <!-- /viewModal modal -->
                 <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel">
                     <div class=" modal-dialog modal-md">
                         <div class="modal-content">
                             <div class="modal-header bg-light px-4">
                                 <h4 class="modal-title h5" id="exampleModalLabel">View category </h4>
                                 <button type="button" class="btn-close" id="closemodal" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </button>
                             </div>
                             <div class="modal-body">

                                 <div class="card shadow-none border-0">

                                     <div class="card-body border-primary">

                                         <div class="row">

                                             <div class="col-md-6">
                                                 <div class="form-group">
                                                     <label for="category_id">category_Name: <span class="text-danger fw-bold">*</span></label>
                                                     <select name="category_id" id="v_category_id" class="form-control" disabled>

                                                     </select>
                                                     <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                     @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                                 </div>
                                             </div>

                                             <div class="col-12 col-md-6">
                                                 <div class="form-group">
                                                     <label class="form-label" for="v_sub_category_name">Sub-category Name </label>
                                                     <input type="text" name="sub_category_name" id="v_sub_category_name" placeholder="Enter category name..." class="form-control" required />
                                                     <span class="text-danger">{{ $errors->first('sub_category_name') }}</span>
                                                     @error('sub_category_name') <span class="error">{{ $message }}</span> @enderror
                                                 </div>
                                             </div>


                                             <div class="col-12 col-md-6">
                                                 <div class="form-group">
                                                     <label class="form-label" for="v_sub_category_slug">Sub-Category slug</label>
                                                     <input type="text" name="sub_category_slug" id="v_sub_category_slug" placeholder="category slug..." class="form-control border-0" disabled />

                                                 </div>
                                             </div>

                                             <div class="col-12 col-md-6">
                                                 <div class="form-group">
                                                     <label class="form-label" for="sub_category_image"> Sub-category Image </label>
                                                     <div class="row">
                                                         <div class="col-md-auto px-1">
                                                             <span id="view_image">Before image</span>

                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>


                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="modal-footer border-0 shadow-none bg-light">
                             </div>

                         </div>

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
         $(function subcategory() {
             var table = $('.ytable').DataTable({
                 processing: true,
                 serverSide: true,
                 ajax: "{{ route('admin.subcategory') }}",
                 columns: [{
                         data: 'DT_RowIndex',
                         name: 'DT_RowIndex'
                     },
                     {
                         data: 'category_name',
                         name: 'category_id'
                     },
                     {
                         data: 'sub_category_name',
                         name: 'sub_category_name'
                     },

                     {
                         data: 'sub_category_image',
                         name: 'sub_category_image',
                         "render": function(data, type, full, meta) {
                             return "<img src=\"/uploads/sub_category_image/" + data + "\" height=\"40px\"/>"
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

         //insert
         $("form#subcategory").submit(function(e) {
             e.preventDefault();
             var formData = new FormData(this);
             $('#send_form').html('Creating...');
             $.ajax({
                 url: $(this).attr("action"),
                 type: 'POST',
                 data: formData,
                 success: function(arr) {
                     $('#send_form').html('create');
                     $('#res_message').show();
                     $('#res_message').html(arr);
                     $('#msg_div').removeClass('d-none');
                     document.getElementById("subcategory").reset();
                     $("#tablebody").append('<tr class="odd"><td class="sorting_1">*</td><td>' + arr.category_id + '</td><td>' + arr.sub_category_name + '</td><td>' + arr.sub_category_image + '</td><td><a link="subcategory/update/' + arr.id + '" class="btn btn-info btn-sm edit text-light border-0" rel="tooltip" id="edit" title="Edit" data-id="1" data-bs-toggle="modal" data-bs-target="#edit_modal" data-bs-whatever="@mdo"> <i class = "fas fa-pencil-alt" > </i> </a><a link = "subcategory/destroy/' + arr.id + '" data-id = "' + arr.id + '" class = "btn btn-danger btn-sm shadow border-0 mx-1" id = "delete"> <i class = "fas fa-trash" > </i> </a></td></tr>');

                     $('#insert-modal').modal('toggle');
                     toastr.success('Sub-category Add Success.');
                     setTimeout(function() {
                         $('#res_message').hide();
                         $('#msg_div').hide();
                     }, 1000);
                 },
                 cache: false,
                 contentType: false,
                 processData: false
             });
         });

         //view
         $('body').on('click', '#view', function() {
             let id = $(this).data('id');

             $.get("/subcategory/view/" + id, function(data) {
                 //console.log(data);
                 $('#v_category_id').html('<option value=" "/>' + data.category_name);
                 $('#v_sub_category_name').val(data.sub_category_name);
                 $('#v_sub_category_slug').val(data.sub_category_slug);
                 $('#view_image').html('<img src="uploads/sub_category_image/' + data.sub_category_image + '"/>');
             });
         });

         //edit
         $('body').on('click', '.edit', function() {
             var selector = $(this);
             let updateUrl = $(this).attr("link");
             let id = $(this).data('id');
             //alert(id);
             $.get("/subcategory/edit/" + id, function(data) {
                 $('#subcatagory_id').val(data.id);
                 $('#category_id').val(data.category_id);
                 $('#e_sub_category_name').val(data.sub_category_name);
                 $('#e_sub_category_slug').val(data.sub_category_slug);
                 $('#image').html('<img src="uploads/sub_category_image/' + data.sub_category_image + '" height="70px"/>');
                 $("#e_category_id option[value='" + data.category_id + "']").attr("selected", "selected");
                 $("form#update_subcategory").submit(function(e) {
                     e.preventDefault();
                     var formData = new FormData(this);
                     $('#update').html('updating...');
                     $.ajax({
                         url: updateUrl,
                         type: "POST",
                         data: formData,
                         success: function(arr) {
                            //console.log(arr);
                             $('#update').html('update');
                             document.getElementById("update_subcategory").reset();
                             $('#edit_modal').modal('hide');
                             toastr.success('Category update Success.');
                             $(selector).parent('td').parent('tr').children('td').eq(2).text(arr.sub_category_name);
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
