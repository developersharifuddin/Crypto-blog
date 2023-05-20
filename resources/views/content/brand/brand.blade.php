@extends('layouts.admin_layout')
@section("title")
Admin | brand
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

               <div class="col-12">
                   <h6 class="pt-4"><span>Brand List </span>
                       <span class="alert alert-success d-none p-0 bg-white" id="msg_div">
                           <span id="res_message"></span>
                       </span>
                   </h6>
               </div>
               <div class="col-md-8 border-0">
                    <div class="card shadow-none border-0 mt-3" style="background: none !important">
                        <div class="card-header px-0 border-0 shadow-0 d-block d-lg-none" style="background: none !important">
                           <button type="button" class="btn btn-info-cs float-right" data-bs-toggle="modal" data-bs-target="#insert-modal">
                               <i class="fa fa-plus"></i> Add Brand
                           </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body border bg-white">
                           <table id="example1" class="table table-bordered table-striped ytable w-100">
                               <tr>
                                   <thead>
                                       <th>S/L</th>
                                       <th>Brand Name</th>
                                       <th>Brand Image</th>
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
              <h6 class="card-title"> Create Brand </h6>
          </div>
          <form id="brand" class="brand-form" action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
           @method('POST')
           @csrf
                                <div class="card-body">
                                      <div class="row">

                                       <div class="col-12 col-md-12">
                                           <div class="form-group">
                                               <label class="form-label" for="brand_name">Brand Name </label>
                                               <input type="text" name="brand_name" id="brand_name" placeholder="Enter brand name..." class="form-control" required />
                                               <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                                               @error('brand_name') <span class="error">{{ $message }}</span> @enderror
                                           </div>
                                       </div>

                                       <div class="col-12 col-md-12">
                                           <div class="form-group">
                                               <label class="form-label" for="brand_image">Brand Image </label>
                                               <input type="file" name="brand_image" id="brand_image" class="form-control ignore" accept="image/*" required />
                                               @error('brand_image') <span class="error">{{ $message }}</span> @enderror
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
                        <form id="update_brand" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">

                                <div class="modal-header bg-light px-4">
                                    <h4 class="modal-title h5" id="exampleModalLabel">Edit Brand </h4>
                                    <button type="button" class="btn-close" id="closemodal" data-bs-dismiss="modal" aria-label="Close"> </button>

                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="card shadow-none border-0">

                                        <div class="card-body border-primary">

                                            <div class="row">
                                                <input type="hidden" name="id" id="brand_id" />

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="e_brand_name">Brand Name </label>
                                                        <input type="text" name="brand_name" id="e_brand_name" placeholder="Enter brand name..." class="form-control" required />
                                                        <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                                                        @error('brand_name') <span class="error">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>


                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="brand_image"> Brand Image </label>
                                                        <div class="row">
                                                            <div class="col-md-auto px-1">
                                                                <span id="image"> </span>
                                                                <span class="form-label px-2" for="before_img">Before image</span>
                                                            </div>
                                                            <div class="col-md-auto mt-auto px-1">
                                                                <input type="file" name="brand_image" id="brand_image" class="form-control" />
                                                                @error('brand_image') <span class="error">{{ $message }}</span> @enderror
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
        $(function brand() {
            var table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.brand') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'brand_name',
                        name: 'brand_name'
                    },

                    {
                        data: 'brand_image',
                        name: 'brand_image',
                        "render": function(data, type, full, meta) {
                            return "<img src=\"/uploads/brand_image/" + data + "\" height=\"40px\"/>"
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
        $("form#brand").submit(function(e) {
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
                    document.getElementById("brand").reset();
                    $("#tablebody").append('<tr class="odd"><td class="sorting_1">*</td><td>' + arr.brand_name + '</td><td>' + arr.brand_image + '</td><td><a link="http://127.0.0.1:8000/brand/update/' + arr.id + '" class="btn btn-info btn-sm edit text-light border-0" rel="tooltip" id="edit" title="Edit" data-id="1" data-bs-toggle="modal" data-bs-target="#edit_modal" data-bs-whatever="@mdo"> <i class = "fas fa-pencil-alt" > </i> </a><a link = "http://127.0.0.1:8000/brand/destroy/' + arr.id + '" data-id = "' + arr.id + '" class = "btn btn-danger btn-sm shadow border-0 mx-1" id = "delete"> <i class = "fas fa-trash" > </i> </a></td></tr>');

                    $('#insert-modal').modal('toggle');
                    toastr.success('Brand Add Success.');
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

        //edit
        $('body').on('click', '.edit', function() {
            var selector = $(this);
            let updateUrl = $(this).attr("link");
            let id = $(this).data('id');
            //alert(id);
            $.get("/brand/edit/" + id, function(data) {
                $('#brand_id').val(data.id);
                $('#e_brand_name').val(data.brand_name);
                $('#image').html('<img src="uploads/brand_image/' + data.brand_image + '" height="70px"/>');
                $("#e_brand_id option[value='" + data.brand_id + "']").attr("selected", "selected");
                $("form#update_brand").submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $('#update').html('updating...');
                    $.ajax({
                        url: updateUrl,
                        type: "POST",
                        data: $('#update_brand').serialize(),
                        success: function(arr) {
                            $('#update').html('update');
                            document.getElementById("update_brand").reset();
                            $('#edit_modal').modal('hide');
                            toastr.success('brand update Success.');
                            $(selector).parent('td').parent('tr').children('td').eq(1).text(arr.brand_name);
                        }
                    });
                });

            });
        });


    });
</script>

@endsection
