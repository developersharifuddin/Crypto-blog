  @extends('layouts.admin_layout')
  @section("title")
  Admin | Product
  @endsection

  @section('content')

  <style>
    input {
        border:1px solid #777 !important;
    }
    .col-md-6 {
       margin-top: 13px !important;
    }

  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12" id="dataTableShowHide">
                      <div class="card border-0 shadow-none mt-3">
                          <div class="card-header px-0 border-0">

                              <h3 class="card-title border-0"><span>Product List </span>
                                  <span class="alert alert-success d-none p-0 bg-white" id="msg_div">
                                      <span id="res_message"></span>
                                  </span>
                              </h3>
                              <button type="button" id="addproduct" class="btn btn-info-cs float-right">
                                  <i class="fa fa-plus"></i> Add Product
                              </button>
                          </div>


                          <!-- /.card-header -->
                          <div class="card-body border-0">
                              <table id="example1" class="table table-bordered table-striped ytable table-sm w-100">
                                  <tr>
                                      <thead>

                                          <th> S/L</th>
                                          <th>Category</th>
                                          <th>Subcategory</th>
                                          <th>product</th>
                                          <th>Brand</th>
                                          <th>description</th>
                                          <th>sale price</th>
                                          <th>product code</th>
                                          <th>stock tatus</th>
                                          <th>Product Image</th>
                                          <th class="" style="width: 80px">action</th>
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

                  <div class="col-12" id="showAddproduct" style="display: none;">
                      <div class="card border-0 shadow-none bg-white pb-4 mb-4">
                          <form id="productForm" class="product-form" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                              @method('POST')
                              @csrf

                              @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                              @endif
                              <div class="card-header px-0 border-0">
                                  <h3 class="card-title w-100">
                                    <span>Create Product </span>
                                    <span class="float-right text-dark" id="backadd"><a href="#">Back</a> </span>

                                      <span class="alert alert-success d-none p-0 bg-white" id="msg_div">
                                          <span id="res_message"></span>
                                      </span>
                                  </h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                  <div class="row ">
                                      <div class="col-md-8">
                                          <div class="row px-4">
                                              <div class="col-md-6">
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


                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="category_id">Sub_category_Name: <span class="text-danger fw-bold">*</span></label>

                                                      <select name="sub_category_id" id="sub_category_id" class="form-control form-select" aria-label="Default select example" required>
                                                          <option value="">Select a sub_category</option>
                                                          @foreach($sub_categories as $key => $sub_category)
                                                          <option value="{{$sub_category->id}}">{{$key+1}}. {{$sub_category->sub_category_name}}</option>
                                                          @endforeach
                                                      </select>
                                                      <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                                                      @error('sub_category_id') <span class="error">{{ $message }}</span> @enderror
                                                  </div>
                                              </div>



                                              <div class="col-md-6">
                                                  <div class="form-group" aria-label="Default select example">
                                                      <label for="brand_name">brand_name: <span class="text-danger fw-bold">*</span></label>
                                                      <select name="brand_id" id="brand_name" class="form-control form-select" required>
                                                          <option value="" selected>Select a brand Name</option>
                                                          @foreach($brands as $key => $brand)
                                                          <option value="{{$brand->id}}">{{$key+1}}. {{$brand->brand_name}}</option>
                                                          @endforeach
                                                      </select>
                                                      <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                                      @error('brand_id') <span class="error">{{ $message }}</span> @enderror
                                                  </div>
                                              </div>


                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label class="form-label" for="product_name"> Product_name<span class="text-danger fw-bold">*</span></label>
                                                      <input type="text" name="product_name" id="product_name" placeholder="Enterproduct_name..." class="form-control" required />
                                                      <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                                      @error('product_name') <span class="error">{{ $message }}</span> @enderror
                                                  </div>
                                              </div>



                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label class="form-label" for="regular_price"> regular_price<span class="text-danger fw-bold">*</span></label>
                                                      <input type="text" name="regular_price" id="regular_price" placeholder="Enter regular_price..." class="form-control" required />
                                                      <span class="text-danger">{{ $errors->first('regular_price') }}</span>
                                                      @error('regular_price') <span class="error">{{ $message }}</span> @enderror
                                                  </div>
                                              </div>

                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label class="form-label" for="sale_price"> sale_price<span class="text-danger fw-bold">*</span></label>
                                                      <input type="text" name="sale_price" id="sale_price" placeholder="Enter sale_price..." class="form-control"  required/>
                                                      <span class="text-danger">{{ $errors->first('sale_price') }}</span>
                                                      @error('sale_price') <span class="error">{{ $message }}</span> @enderror
                                                  </div>
                                              </div>

                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label class="form-label" for="product_code"> product_code<span class="text-danger fw-bold">*</span></label>
                                                      <input type="text" name="product_code" id="product_code" placeholder="Enter product_code..." class="form-control" required />
                                                      <span class="text-danger">{{ $errors->first('product_code') }}</span>
                                                      @error('product_code') <span class="error">{{ $message }}</span> @enderror
                                                  </div>
                                              </div>

                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label class="form-label" for="quantity"> quantity<span class="text-danger fw-bold">*</span></label>
                                                      <input type="number" name="quantity" id="quantity" placeholder="Enter quantity..." class="form-control" required />
                                                      <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                      @error('quantity') <span class="error">{{ $message }}</span> @enderror
                                                  </div>
                                              </div>



                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label class="form-label" for="description"> description<span class="text-danger fw-bold">*</span></label>
                                                      <textarea name="description" id="description" placeholder="Enter description..." class="form-control" required></textarea>
                                                      <span class="text-danger">{{ $errors->first('description') }}</span>
                                                      @error('description') <span class="error">{{ $message }}</span> @enderror
                                                  </div>
                                              </div>
                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label class="form-label" for="short_description"> short_description<span class="text-danger fw-bold">*</span></label>
                                                      <textarea name="short_description" id="short_description" placeholder="Enter description..." class="form-control" required></textarea>
                                                      <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                                      @error('short_description') <span class="error">{{ $message }}</span> @enderror
                                                  </div>
                                              </div>


                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label class="fw-bold"><strong> stock_status<span class="text-danger fw-bold">*</span> </strong></label> <br>

                                                      <div class="form-check form-check-inline">
                                                          <input class="form-check-input" type="radio" name="stock_status" value="1" checked style="height: 18px !important; border-radius:50% !important; color:#444">
                                                          <label class="form-check-label" for="inlineRadio1">In Stock</label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                          <input class="form-check-input" type="radio" name="stock_status" value="0" style="height:18px !important;  border-radius:50% !important; color:#444">
                                                          <label class="form-check-label" for="inlineRadio2">Not Abilable</label>
                                                      </div>
                                                      @error('stock_status') <span class="error">{{ $message }}</span> @enderror
                                                  </div>
                                              </div>



                                          </div>


                                      </div>

                                      <style>
                                          tr,
                                          th,
                                          td {
                                              border: 0px !important;
                                          }

                                          .form-check-input {
                                              margin-left: 0px;
                                          }

                                          .size_name {
                                              height: 20px;
                                          }

                                          input[id=size_name] {
                                              border: 1px solid #e6e6e6 !important;
                                              height: 35px !important;
                                          }
                                          .bgcolorname{
                                             background: red !important;
                                              height: 35px !important;
                                          }
                                      </style>

                                      <div class="col-md-4">
                                          <div class="row px-4 bg-white">
                                              <table class="table" id="addtable">
                                                  <thead class="text-start">
                                                      <tr>
                                                          <th><input type="checkbox" class="form-check-input" id="parent_info_checkAll" name="parent_info_checkAll" style="margin-top:-20px" /></th>
                                                          <th class="text-start" colspan="1">Check All</th>
                                                          <th class="text-left border-0">
                                                              <span class="btn btn-danger btn-sm m-1" id="parent_info_row_remove"><i class="fa fa-trash"></i></span>
                                                          </th>
                                                      </tr>
                                                      <tr class="border-top">
                                                          <th colspan="2" class="ml-3 text-start"> Size </th>
                                                          <th class="ml-3 text-center"><span class="btn btn-sm text-white" id="add" onclick="add_parent_info_row();"><i class="fa fa-plus"></i></span></th>
                                                      </tr>
                                                  </thead>
                                                  <tbody id="parent_info">
                                                      <tr class="parent_info_child_tr col-12 col-md-12">
                                                          <td class="text-center py-2 px-3"><input type="checkbox" name="parent_info[]" class="form-check-input"></td>
                                                          <td id="itemDetails">

                                                              <div class="form-group">
                                                                 <select name="size_name[]" id="size_name" class="form-control form-select bg-transparent" required>
                                                                    <option value="" selected>Select a size</option>
                                                                    @foreach($sizes as $key => $size)
                                                                    <option value="{{$size->id}}">
                                                                        <span>{{$key+1}}.{{$size->size_name}} </span>
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger">{{ $errors->first('size') }}</span>
                                                                @error('size') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                          </td>
                                                          <td class="td-actions text-center"><a href="javascritp:;" rel="tooltip" title="Remove" class="btn btn-danger btn-sm deletesizeRow"  id="parent_info_row_remove" ><i class="fas fa-trash"></i></a> </a> </td>
                                                      </tr>
                                                  </tbody>
                                              </table>

                                              <table id="example" class="table border-none mt-3">
                                                  <thead class="">
                                                      <th colspan="2" class="ml-3"> Color </th>
                                                      <th class="text-center"> <span rel="tooltip" title="addcolorRow" id="add" class="btn btn-sm addcolorRow"><i class="fas fa-add"></i></a></span> </th>
                                                  </thead>
                                                  <tbody id="tblRowcolor">
                                                      <tr class="parent_info_child_tr">
                                                          <td class="text-center  py-2 px-3"><input type="checkbox" name="parent_info[]" class="form-check-input"></td>
                                                          <td id="itemDetails">
                                                                <div class="form-group">
                                                                     <select name="color_name[]" id="color" class="form-control form-select bg-transparent" required>
                                                                        <option value="" selected>Select a color</option>
                                                                        @foreach($colors as $key => $color)
                                                                        <option value="{{$color->id}}" class="bg-transparent" style="background-color:transparent !important">
                                                                            <span class="bgcolorname" style="background-color:red !important;">{{$key+1}}.{{$color->color_name}} </span>
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="text-danger">{{ $errors->first('color') }}</span>
                                                                    @error('color') <span class="error">{{ $message }}</span> @enderror
                                                                </div>
                                                          </td>
                                                          <td class="td-actions text-center"><a href="javascritp:;" rel="tooltip" title="Remove" class="btn btn-danger btn-sm deletecolorRow"  id="parent_info_row_remove" ><i class="fas fa-trash"></i></a> </a> </td>
                                                      </tr>
                                                  </tbody>
                                              </table>

                                              <table id="example" class="table border-none mt-3">
                                                  <thead class="">
                                                      <th colspan="2" class="ml-3"> Product Image </th>
                                                      <th class="text-center"> <span rel="tooltip" title="addimgRow" class="btn btn-sm addimgRow" id="add"><i class="fas fa-add"></i></a></span> </th>
                                                  </thead>
                                                  <tbody id="tblRowimg">
                                                      <tr class="parent_info_child_tr">
                                                          <td class="text-center  py-2 px-3"><input type="checkbox" name="parent_info[]" class="form-check-input"></td>
                                                          <td id="itemDetails">
                                                              <div class="form-group">
                                                                  <input type="file" name="product_image[]" id="product_image" class="form-control ignore" accept="image/*" required multiple />
                                                                  @error('product_image') <span class="error">{{ $message }}</span> @enderror
                                                              </div>
                                                          </td>
                                                          <td class="td-actions text-center"><a href="javascritp:;" rel="tooltip" title="Remove" class="btn btn-danger btn-sm deleteimgRow"  id="parent_info_row_remove" ><i class="fas fa-trash"></i></a> </a> </td>
                                                      </tr>
                                                  </tbody>
                                              </table>

                                              <div class="col-12 col-sm-6">

                                                <hr>
                                                <h4> Colors</h4>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-default text-center active">
                                                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                                                    Green
                                                    <br>
                                                    <i class="fas fa-circle fa-2x text-green"></i>
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                                                    Blue
                                                    <br>
                                                    <i class="fas fa-circle fa-2x text-blue"></i>
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                                                    Purple
                                                    <br>
                                                    <i class="fas fa-circle fa-2x text-purple"></i>
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                                                    Red
                                                    <br>
                                                    <i class="fas fa-circle fa-2x text-red"></i>
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                                                    Orange
                                                    <br>
                                                    <i class="fas fa-circle fa-2x text-orange"></i>
                                                </label>
                                                </div>

                                                <h4 class="mt-3">Size</h4>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                                    <span class="text-xl">S</span>
                                                    <br>
                                                    Small
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                                                    <span class="text-xl">M</span>
                                                    <br>
                                                    Medium
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                                                    <span class="text-xl">L</span>
                                                    <br>
                                                    Large
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                                                    <span class="text-xl">XL</span>
                                                    <br>
                                                    Xtra-Large
                                                </label>
                                                </div>


                                            </div>


                                          </div>
                                      </div>
                                  </div>

                              </div>

                              <div class="card-footer border-0 shadow-none bg-white">
                                   <button type="submit" class="btn btn-info-cs text-white btn-sm float-right" id="send_form"> <i class="fa fa-save"></i>&nbsp Save </button>
                                  <button type="reset" class="btn btn-info-cs text-white btn-sm float-right mx-2"> <i class="fas fa-broom"></i>&nbsp Reset </button>
                                </div>

                          </form>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
                  <!-- /.col -->


                  <!-- edit product -->
                  <div class="col-12" id="editproduct" style="display: none;">
                    <div class="card border-0 shadow-none bg-white pb-4 mb-4">
                        <form id="updateProductForm" class="product-form" action="{{route('product.update', 'id')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')


                            <div class="card-header px-0 border-0">
                                <h3 class="card-title w-100">
                                    <span>Update Product </span>
                                    <span class="float-right text-primary" id="backedit"><a href="#">Back</a> </span>

                                    <span class="alert alert-success d-none p-0 bg-white" id="msg_div">
                                        <span id="res_message"></span>
                                    </span>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row px-4">
                                            <input type="hidden" name="id" id="e_id" required />

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category_id">category_Name: <span class="text-danger fw-bold">*</span></label>
                                                    <select name="category_id" id="e_category_id" class="form-control form-select" required>
                                                        <option value="" selected>Select a category</option>
                                                        @foreach($categories as $key => $category)
                                                        <option value="{{$category->id}}">{{$key+1}}. {{$category->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                    @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category_id">Sub_category_Name: <span class="text-danger fw-bold">*</span></label>

                                                    <select name="sub_category_id" id="e_sub_category_id" class="form-control form-select" aria-label="Default select example" required>
                                                        <option value="" selected>Select a sub_category</option>
                                                        @foreach($sub_categories as $key => $sub_category)
                                                        <option value="{{$sub_category->id}}">{{$key+1}}. {{$sub_category->sub_category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                                                    @error('sub_category_id') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group" aria-label="Default select example">
                                                    <label for="brand_name">brand_name: <span class="text-danger fw-bold">*</span></label>
                                                    <select name="brand_id" id="e_brand_name" class="form-control form-select" required>
                                                        <option value="" selected>Select a brand Name</option>
                                                        @foreach($brands as $key => $brand)
                                                        <option value="{{$brand->id}}">{{$key+1}}. {{$brand->brand_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                                    @error('brand_id') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>


                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product_name"> Product_name</label>
                                                    <input type="text" name="product_name" id="e_product_name" placeholder="Enterproduct_name..." class="form-control" required />
                                                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                                    @error('product_name') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>



                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="regular_price"> regular_price</label>
                                                    <input type="text" name="regular_price" id="e_regular_price" placeholder="Enter regular_price..." class="form-control" required />
                                                    <span class="text-danger">{{ $errors->first('regular_price') }}</span>
                                                    @error('regular_price') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="sale_price"> sale_price</label>
                                                    <input type="text" name="sale_price" id="e_sale_price" placeholder="Enter sale_price..." class="form-control" required />
                                                    <span class="text-danger">{{ $errors->first('sale_price') }}</span>
                                                    @error('sale_price') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product_code"> product_code</label>
                                                    <input type="text" name="product_code" id="e_product_code" placeholder="Enter product_code..." class="form-control" required />
                                                    <span class="text-danger">{{ $errors->first('product_code') }}</span>
                                                    @error('product_code') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="quantity"> quantity</label>
                                                    <input type="number" name="quantity" id="e_quantity" placeholder="Enter quantity..." class="form-control" required />
                                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                    @error('quantity') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>



                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="description"> description</label>
                                                    <textarea name="description" id="e_description" placeholder="Enter description..." class="form-control" required></textarea>
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                    @error('description') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="short_description"> short_description</label>
                                                    <textarea name="short_description" id="e_short_description" placeholder="Enter description..." class="form-control" required></textarea>
                                                    <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                                    @error('short_description') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>


                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="fw-bold"><strong> stock_status </strong></label> <br>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stock_status" value="1" checked style="height: 18px !important; border-radius:50% !important; color:#444">
                                                        <label class="form-check-label" for="inlineRadio1">In Stock</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stock_status" value="0" style="height:18px !important;  border-radius:50% !important; color:#444">
                                                        <label class="form-check-label" for="inlineRadio2">Not Abilable</label>
                                                    </div>
                                                    @error('stock_status') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>



                                        </div>


                                    </div>

                                    <style>
                                        tr,
                                        th,
                                        td {
                                            border: 0px !important;
                                        }

                                        .form-check-input {
                                            margin-left: 0px;
                                        }

                                        .size_name {
                                            height: 20px;
                                        }

                                        input[id=size_name] {
                                            border: 1px solid #e6e6e6 !important;
                                            height: 35px !important;
                                        }
                                        .bgcolorname{
                                           background: red !important;
                                            height: 35px !important;
                                        }
                                    </style>

                                    <div class="col-md-4">
                                        <div class="row px-4 bg-white">
                                            <table class="table" id="addtable">
                                                <thead class="text-start">

                                                    <tr class="">
                                                        <th colspan="1" class="ml-3 text-start"> Size </th>
                                                        <th class="ml-3 text-center"><span class="btn btn-sm text-white" onclick="add_parent_info_row();" id="add"><i class="fa fa-plus"></i></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="parent_info">
                                                    <tr class="parent_info_child_tr col-12 col-md-12">
                                                         <td id="itemDetails">

                                                            <div class="form-group">
                                                               <select name="size_name" id="e_size_name" class="form-control form-select bg-transparent" required>
                                                                  <option value="" selected>Select a size</option>
                                                                  @foreach($sizes as $key => $size)
                                                                  <option value="{{$size->id}}">
                                                                      <span>{{$key+1}}.{{$size->size_name}} </span>
                                                                  </option>
                                                                  @endforeach
                                                              </select>
                                                              <span class="text-danger">{{ $errors->first('size') }}</span>
                                                              @error('size') <span class="error">{{ $message }}</span> @enderror
                                                          </div>
                                                        </td>
                                                        <td class="td-actions text-center"><a href="javascritp:;" rel="tooltip" title="Remove"  id="parent_info_row_remove" class="btn btn-danger btn-sm deletesizeRow"><i class="fas fa-trash"></i></a> </a> </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table id="example" class="table border-none mt-3">
                                                <thead class="">
                                                    <th colspan="1" class="ml-3"> Color </th>
                                                    <th class="text-center"> <span rel="tooltip" title="addcolorRow" class="btn btn-sm addcolorRow" id="add"><i class="fas fa-add"></i></a></span> </th>
                                                </thead>
                                                <tbody id="tblRowcolor">
                                                    <tr class="parent_info_child_tr">

                                                        <td id="itemDetails">
                                                              <div class="form-group">
                                                                   <select name="color_name" id="e_color_name" class="form-control form-select bg-transparent" required>
                                                                      <option value="" selected>Select a color</option>
                                                                      @foreach($colors as $key => $color)
                                                                      <option value="{{$color->id}}" class="bg-transparent" style="background-color:transparent !important">
                                                                          <span class="bgcolorname" style="background-color:red !important;">{{$key+1}}.{{$color->color_name}} </span>
                                                                      </option>
                                                                      @endforeach
                                                                  </select>
                                                                  <span class="text-danger">{{ $errors->first('color') }}</span>
                                                                  @error('color') <span class="error">{{ $message }}</span> @enderror
                                                              </div>
                                                        </td>
                                                        <td class="td-actions text-center"><a href="javascritp:;" rel="tooltip"  id="parent_info_row_remove" title="Remove" class="btn btn-danger btn-sm deletecolorRow"><i class="fas fa-trash"></i></a> </a> </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table id="example" class="table border-none mt-3">
                                                <thead class="">
                                                    <th colspan="1" class="ml-3"> Product Image </th>
                                                    <th class="text-center"> <span rel="tooltip" title="addimgRow" class="btn btn-sm addimgRow" id="add"><i class="fas fa-add"></i></a></span> </th>
                                                </thead>
                                                <tbody id="tblRowimg">
                                                    <tr class="parent_info_child_tr">

                                                        <td id="itemDetails">
                                                            <div class="form-group">
                                                                <input type="file" name="product_image[]" id="e_product_image" class="form-control ignore" accept="image/*" multiple />
                                                                @error('product_image') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </td>
                                                        <td class="td-actions text-center"><a href="javascritp:;" rel="tooltip" title="Remove"  id="parent_info_row_remove" class="btn btn-danger btn-sm deleteimgRow"><i class="fas fa-trash"></i></a> </a> </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer border-0 shadow-none bg-white">
                                 <button type="submit" class="btn btn-info-cs text-white btn-sm float-right" id="update_form"> <i class="fa fa-save"></i>&nbsp Save </button>
                                <button type="reset" class="btn btn-info-cs text-white btn-sm float-right mx-2"> <i class="fas fa-broom"></i>&nbsp Reset </button>
                              </div>

                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->




                  <!-- /viewModal modal -->
                  <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel">
                      <div class=" modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header bg-light px-4">
                                  <h4 class="modal-title h5" id="exampleModalLabel">View category </h4>
                                  <button type="button" class="btn-close" id="closemodal" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </button>
                              </div>
                              <div class="modal-body">

                                  <div class="card shadow-none border-0">

                                      <div class="card-body border-primary">







                                        <!-- Default box -->
                                        <div class="card card-solid">
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                                                <div class="col-12" id="main_image">
                                                  <img src="/uploads/product_image/" height="30px"  class="product-image" alt="Product Image">
                                                </div>
                                                <div class="col-12 product-image-thumbs">
                                                <div class="product-image-thumb active"><img src="dist/img/prod-1.jpg" alt="Product Image"></div>
                                                <div class="product-image-thumb" ><img src="dist/img/prod-2.jpg" alt="Product Image"></div>
                                                <div class="product-image-thumb" ><img src="dist/img/prod-3.jpg" alt="Product Image"></div>
                                                <div class="product-image-thumb" ><img src="dist/img/prod-4.jpg" alt="Product Image"></div>
                                                <div class="product-image-thumb" ><img src="dist/img/prod-5.jpg" alt="Product Image"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <h3 class="my-3">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                                                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>

                                                <hr>
                                                <h4>Available Colors</h4>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-default text-center active">
                                                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                                                    Green
                                                    <br>
                                                    <i class="fas fa-circle fa-2x text-green"></i>
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                                                    Blue
                                                    <br>
                                                    <i class="fas fa-circle fa-2x text-blue"></i>
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                                                    Purple
                                                    <br>
                                                    <i class="fas fa-circle fa-2x text-purple"></i>
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                                                    Red
                                                    <br>
                                                    <i class="fas fa-circle fa-2x text-red"></i>
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                                                    Orange
                                                    <br>
                                                    <i class="fas fa-circle fa-2x text-orange"></i>
                                                </label>
                                                </div>

                                                <h4 class="mt-3">Size <small>Please select one</small></h4>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                                    <span class="text-xl">S</span>
                                                    <br>
                                                    Small
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                                                    <span class="text-xl">M</span>
                                                    <br>
                                                    Medium
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                                                    <span class="text-xl">L</span>
                                                    <br>
                                                    Large
                                                </label>
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                                                    <span class="text-xl">XL</span>
                                                    <br>
                                                    Xtra-Large
                                                </label>
                                                </div>

                                                <div class="bg-gray py-2 px-3 mt-4">
                                                <h2 class="mb-0">
                                                    $80.00
                                                </h2>
                                                <h4 class="mt-0">
                                                    <small>Ex Tax: $80.00 </small>
                                                </h4>
                                                </div>

                                                <div class="mt-4">
                                                <div class="btn btn-primary btn-lg btn-flat">
                                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                                    Add to Cart
                                                </div>

                                                <div class="btn btn-default btn-lg btn-flat">
                                                    <i class="fas fa-heart fa-lg mr-2"></i>
                                                    Add to Wishlist
                                                </div>
                                                </div>

                                                <div class="mt-4 product-share">
                                                <a href="#" class="text-gray">
                                                    <i class="fab fa-facebook-square fa-2x"></i>
                                                </a>
                                                <a href="#" class="text-gray">
                                                    <i class="fab fa-twitter-square fa-2x"></i>
                                                </a>
                                                <a href="#" class="text-gray">
                                                    <i class="fas fa-envelope-square fa-2x"></i>
                                                </a>
                                                <a href="#" class="text-gray">
                                                    <i class="fas fa-rss-square fa-2x"></i>
                                                </a>
                                                </div>

                                            </div>
                                            </div>
                                            <div class="row mt-4">
                                            <nav class="w-100">
                                                <div class="nav nav-tabs" id="product-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content p-3" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
                                                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                                                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->






                                          <div class="row">

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="row px-4">
                                                        <input type="hidden" name="id" id="e_id" required />

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="category_id">category_Name: <span class="text-danger fw-bold">*</span></label>
                                                                <select name="category_id" id="v_category_id" class="form-control form-select" required>
                                                                    <option value="" selected>Select a category</option>
                                                                    @foreach($categories as $key => $category)
                                                                    <option value="{{$category->id}}">{{$key+1}}. {{$category->category_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                                @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="category_id">Sub_category_Name: <span class="text-danger fw-bold">*</span></label>

                                                                <select name="sub_category_id" id="v_sub_category_id" class="form-control form-select" aria-label="Default select example" required>
                                                                    <option value="" selected>Select a sub_category</option>
                                                                    @foreach($sub_categories as $key => $sub_category)
                                                                    <option value="{{$sub_category->id}}">{{$key+1}}. {{$sub_category->sub_category_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                                                                @error('sub_category_id') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>



                                                        <div class="col-md-6">
                                                            <div class="form-group" aria-label="Default select example">
                                                                <label for="brand_name">brand_name: <span class="text-danger fw-bold">*</span></label>
                                                                <select name="brand_id" id="v_brand_name" class="form-control form-select" required>
                                                                    <option value="" selected>Select a brand Name</option>
                                                                    @foreach($brands as $key => $brand)
                                                                    <option value="{{$brand->id}}">{{$key+1}}. {{$brand->brand_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                                                @error('brand_id') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="product_name"> Product_name</label>
                                                                <input type="text" name="product_name" id="v_product_name" placeholder="Enterproduct_name..." class="form-control" required />
                                                                <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                                                @error('product_name') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>



                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="regular_price"> regular_price</label>
                                                                <input type="text" name="regular_price" id="v_regular_price" placeholder="Enter regular_price..." class="form-control" required />
                                                                <span class="text-danger">{{ $errors->first('regular_price') }}</span>
                                                                @error('regular_price') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="sale_price"> sale_price</label>
                                                                <input type="text" name="sale_price" id="v_sale_price" placeholder="Enter sale_price..." class="form-control" required />
                                                                <span class="text-danger">{{ $errors->first('sale_price') }}</span>
                                                                @error('sale_price') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="product_code"> product_code</label>
                                                                <input type="text" name="product_code" id="v_product_code" placeholder="Enter product_code..." class="form-control" required />
                                                                <span class="text-danger">{{ $errors->first('product_code') }}</span>
                                                                @error('product_code') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="quantity"> quantity</label>
                                                                <input type="number" name="quantity" id="v_quantity" placeholder="Enter quantity..." class="form-control" required />
                                                                <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                                @error('quantity') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>



                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="description"> description</label>
                                                                <textarea name="description" id="v_description" placeholder="Enter description..." class="form-control" required></textarea>
                                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                                                @error('description') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="short_description"> short_description</label>
                                                                <textarea name="short_description" id="v_short_description" placeholder="Enter description..." class="form-control" required></textarea>
                                                                <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                                                @error('short_description') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="fw-bold"><strong> stock_status </strong></label> <br>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="stock_status" value="1" checked style="height: 18px !important; border-radius:50% !important; color:#444">
                                                                    <label class="form-check-label" for="inlineRadio1">In Stock</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="stock_status" value="0" style="height:18px !important;  border-radius:50% !important; color:#444">
                                                                    <label class="form-check-label" for="inlineRadio2">Not Abilable</label>
                                                                </div>
                                                                @error('stock_status') <span class="error">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>



                                                    </div>


                                                </div>

                                                <style>
                                                    tr,
                                                    th,
                                                    td {
                                                        border: 0px !important;
                                                    }

                                                    .form-check-input {
                                                        margin-left: 0px;
                                                    }

                                                    .size_name {
                                                        height: 20px;
                                                    }

                                                    input[id=size_name] {
                                                        border: 1px solid #e6e6e6 !important;
                                                        height: 35px !important;
                                                    }
                                                    .bgcolorname{
                                                       background: red !important;
                                                        height: 35px !important;
                                                    }
                                                </style>

                                                <div class="col-md-4">
                                                    <div class="row px-4 bg-white">
                                                        <table class="table" id="addtable">
                                                            <thead class="text-start">
                                                                <tr>
                                                                    <th><input type="checkbox" class="form-check-input" id="parent_info_checkAll" name="parent_info_checkAll" style="margin-top:-20px" /></th>
                                                                    <th class="text-start" colspan="1">Check All</th>
                                                                    <th class="text-left border-0">
                                                                        <span class="btn btn-danger btn-sm m-1" id="parent_info_row_remove"><i class="fa fa-trash"></i></span>
                                                                    </th>
                                                                </tr>
                                                                <tr class="border-top">
                                                                    <th colspan="2" class="ml-3 text-start"> Size </th>
                                                                    <th class="ml-3 text-center"><span class="btn btn-info btn-sm text-white" onclick="add_parent_info_row();"><i class="fa fa-plus"></i></span></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="parent_info">
                                                                <tr class="parent_info_child_tr col-12 col-md-12">
                                                                    <td class="text-center py-2 px-3"><input type="checkbox" name="parent_info[]" class="form-check-input"></td>
                                                                    <td id="itemDetails">

                                                                        <div class="form-group">
                                                                           <select name="size_name" id="v_size_name" class="form-control form-select bg-transparent" required>
                                                                              <option value="" selected>Select a size</option>
                                                                              @foreach($sizes as $key => $size)
                                                                              <option value="{{$size->id}}">
                                                                                  <span>{{$key+1}}.{{$size->size_name}} </span>
                                                                              </option>
                                                                              @endforeach
                                                                          </select>
                                                                          <span class="text-danger">{{ $errors->first('size') }}</span>
                                                                          @error('size') <span class="error">{{ $message }}</span> @enderror
                                                                      </div>
                                                                    </td>
                                                                    <td class="td-actions text-center"><a href="javascritp:;" rel="tooltip" title="Remove" class="btn btn-danger btn-sm deletesizeRow"><i class="fas fa-trash"></i></a> </a> </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table id="example" class="table border-none mt-3">
                                                            <thead class="">
                                                                <th colspan="2" class="ml-3"> Color </th>
                                                                <th class="text-center"> <span rel="tooltip" title="addcolorRow" class="btn btn-info btn-sm addcolorRow"><i class="fas fa-add text-white"></i></a></span> </th>
                                                            </thead>
                                                            <tbody id="tblRowcolor">
                                                                <tr class="parent_info_child_tr">
                                                                    <td class="text-center  py-2 px-3"><input type="checkbox" name="parent_info[]" class="form-check-input"></td>
                                                                    <td id="itemDetails">
                                                                          <div class="form-group">
                                                                               <select name="color_name" id="v_color_name" class="form-control form-select bg-transparent" required>
                                                                                  <option value="" selected>Select a color</option>
                                                                                  @foreach($colors as $key => $color)
                                                                                  <option value="{{$color->id}}" class="bg-transparent" style="background-color:transparent !important">
                                                                                      <span class="bgcolorname" style="background-color:red !important;">{{$key+1}}.{{$color->color_name}} </span>
                                                                                  </option>
                                                                                  @endforeach
                                                                              </select>
                                                                              <span class="text-danger">{{ $errors->first('color') }}</span>
                                                                              @error('color') <span class="error">{{ $message }}</span> @enderror
                                                                          </div>
                                                                    </td>
                                                                    <td class="td-actions text-center"><a href="javascritp:;" rel="tooltip" title="Remove" class="btn btn-danger btn-sm deletecolorRow"><i class="fas fa-trash"></i></a> </a> </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table id="example" class="table border-none mt-3">
                                                            <thead class="">
                                                                <th colspan="2" class="ml-3"> Product Image </th>
                                                                <th class="text-center"> <span rel="tooltip" title="addimgRow" class="btn btn-info btn-sm addimgRow"><i class="fas fa-add text-white"></i></a></span> </th>
                                                            </thead>
                                                            <tbody id="tblRowimg">
                                                                <tr class="parent_info_child_tr">
                                                                    <td class="text-center  py-2 px-3"><input type="checkbox" name="parent_info[]" class="form-check-input"></td>
                                                                    <td id="itemDetails">
                                                                        <div class="form-group">
                                                                            <input type="file" name="product_image[]" id="v_product_image" class="form-control ignore" accept="image/*" multiple />
                                                                            @error('product_image') <span class="error">{{ $message }}</span> @enderror
                                                                        </div>
                                                                    </td>
                                                                    <td class="td-actions text-center"><a href="javascritp:;" rel="tooltip" title="Remove" class="btn btn-danger btn-sm deleteimgRow"><i class="fas fa-trash"></i></a> </a> </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


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
              <style>
                  .form-check-input {
                      height: 20px !important;
                  }
              </style>




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

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script>
      function add_parent_info_row() {
          var table = document.getElementById("parent_info"); //get the table
          var rowcount = table.rows.length; //get no. of rows in the table

          var tblRow = '<tr class="parent_info_child_tr"><td class="text-center  py-2 px-3"><input type="checkbox" name="parent_info[]" class="form-check-input"></td>' +
              '<td  id="itemDetails">' +
                '<div class="form-group">'+
                    '<select name="size_name[]" id="size_name" class="form-control form-select bg-transparent" required>'+
                    '<option value="" selected>Select a size</option>'+
                    '@foreach($sizes as $key => $size)'+
                    '<option value="{{$size->id}}">'+
                        '<span>{{$key+1}}.{{$size->size_name}} </span>'+
                    '</option>'+
                    '@endforeach'+
                '</select>'+
                '<span class="text-danger">{{ $errors->first('size') }}</span>'+
                '@error('size') <span class="error">{{ $message }}</span> @enderror'+
                '</div>'+
              '</td>' +
              '<td class="td-actions text-center"><a href="javascritp:;" rel="tooltip" title="Remove" id="parent_info_row_remove" class="btn btn-danger btn-sm deletesizeRow" ><i class="fas fa-trash"></i></a> </a> </td> </tr>';


          var i = table.rows.length;
          $("input[name='active_status[]']").each(function() {
              var oldname = $(this).attr('name');
              $(this).attr('name', oldname + i);
              //   alert('Row number is : ' + i);
          });
          $("#parent_info").append(tblRow);
      }

      $("#parent_info_checkAll").change(function() {
          $("input[name='parent_info[]']").prop('checked', $(this).prop("checked"));
      });
      $("#parent_info_row_remove").on("click", function() {
          $('.parent_info_child_tr').has("input[name='parent_info[]']:checked").remove();
          $("#parent_info").prev().children().children().children().prop("checked", false);
      })
      $('body').on('click', '.deletesizeRow', function() {
          let id = $(this).parent().parent().remove();
      });





      $('body').on('click', '.addcolorRow', function() {
          var trcolor = '<tr class="parent_info_child_tr"><td class="text-center py-2 px-3"><input type="checkbox" name="parent_info[]" class="form-check-input"></td>' +
              '<td id="itemDetails">' +
                '<div class="form-group">'+
                    '<select name="color_name[]" id="color" class="form-control form-select bg-transparent" required>'+
                    '<option value="" selected>Select a color</option>'+
                    '@foreach($colors as $key => $color)'+
                    '<option value="{{$color->id}}" class="bg-transparent" style="background-color:transparent !important">'+
                        '<span class="bgcolorname" style="background-color:red !important;">{{$key+1}}.{{$color->color_name}} </span>'+
                    '</option>'+
                    '@endforeach'+
                '</select>'+
                '<span class="text-danger">{{ $errors->first('color') }}</span>'+
                '@error('color') <span class="error">{{ $message }}</span> @enderror'+
                '</div>'+
                '</td>'+
              '<td class="td-actions text-center"><a href="javascritp:;" rel="tooltip" title="Remove"  id="parent_info_row_remove" class="btn btn-danger btn-sm deletecolorRow" ><i class="fas fa-trash"></i></a> </a> </td> </tr>';

          $('#tblRowcolor').append(trcolor);
      });

      $('body').on('click', '.deletecolorRow', function() {
          let id = $(this).parent().parent().remove();

      });


      $('body').on('click', '.addimgRow', function() {
          var tr = '<tr class="parent_info_child_tr"><td class="text-center  py-2 px-3"><input type="checkbox" name="parent_info[]" class="form-check-input"></td>' +
              '<td id="itemDetails">' +
              '<div class="form-group">' +
              '<input type="file" name="product_image[]" id="product_image" class="form-control ignore" accept="image/*" required multiple />' +
              '</div>' +
              '</td>' +
              '<td class="td-actions text-center"><a href="javascritp:;" rel="tooltip" title="Remove" id="parent_info_row_remove"  class="btn btn-danger btn-sm deleteimgRow" ><i class="fas fa-trash"></i></a> </a> </td> </tr>';

          $('#tblRowimg').append(tr);
      });

      $('body').on('click', '.deleteimgRow', function() {
          let id = $(this).parent().parent().remove();

      });





      //   //card type box filter view all data
      //   $(document).on('change', '#filterCardType', function() {

      //       src = "{{ url('/add-card-type-filter')}}";
      //       var query = $(this).val();
      //       //alert(query);
      //       $.ajax({
      //           url: src,
      //           type: "GET",
      //           data: {
      //               'id': query
      //           },
      //           success: function(data) {
      //               if ($('#parent_info').html(data)) {

      //                   src = "{{ url('/add-sale-id-filter')}}";
      //                   var query = $('#filterCardType').val();
      //                   //alert(query);

      //                   $.ajax({
      //                       url: src,
      //                       type: "GET",
      //                       data: {
      //                           'id': query
      //                       },
      //                       success: function(data) {
      //                           if ($('[id="filterData"]').length > 0) {
      //                               console.log($('[id="filterData"]').html(data));
      //                           }
      //                           // $('#filterData').html(data);
      //                       }
      //                   });

      //               }
      //           },
      //           error: function() {
      //               alert('error');
      //           }
      //       });

      //       //end of ajax call

      //   });

      //   //Item id box filter view all data in item details box
      //   $(document).on('change', '#filterItemId', function() {

      //       src = "{{ url('/add-item-id-filter')}}";
      //       var query = $(this).val();
      //       //alert(query);
      //       $.ajax({
      //           url: src,
      //           type: "GET",
      //           data: {
      //               'id': query
      //           },
      //           success: function(data) {
      //               $('#itemDetails').html(data);
      //           },
      //           error: function() {
      //               alert('error');
      //           }
      //       });

      //       //end of ajax call

      //   });
  </script>



  <script>
      $(document).ready(function() {
            $('body').on('click', '#edit', function() {
                var selector = $(this);
                let updateUrl = $(this).attr("link");
                let id = $(this).data('id');
                //alert(updateUrl);
                $.get("/product/edit/" + id, function(data) {
                    // console.log(data);

                    $('#e_id').val(data.id);
                    $('#e_product_code').val(data.product_code);
                    $('#e_product_name').val(data.product_name);
                    $('#e_product_slug').val(data.product_slug);
                    $('#e_quantity').val(data.quantity);
                    $('#e_regular_price').val(data.regular_price);
                    $('#e_sale_price').val(data.sale_price);
                    $('#e_short_description').val(data.short_description);
                    $('#e_description').val(data.description);
                    $('#e_stock_status').val(data.stock_status);
                    $('#e_sub_category_id').val(data.sub_category_id);
                    $('#e_brand_name').val(data.brand_id);
                    $('#e_id').val(data.id);
                    $('#e_category_id').val(data.category_id);


                    $('#image').html('<img src="uploads/sub_category_image/' + data.sub_category_image + '"/>');

                    $("#e_category_id option[value='" + data.category_id + "']").attr("selected", "selected");
                    $("#e_sub_category_id option[value='" + data.sub_category_id + "']").attr("selected", "selected");
                    $("#e_brand_name option[value='" + data.brand_name + "']").attr("selected", "selected");
                    $("#e_size_name option[value='" + data.size_id + "']").attr("selected", "selected");
                    $("#e_color_name option[value='" + data.color_id + "']").attr("selected", "selected");

                    $("form#updateProductForm").submit(function(e) {
                      $('#update_form').html('updating...');
                        e.preventDefault();
                        var formData = new FormData(this);

                        $.ajax({
                            url: updateUrl,
                            type: "POST",
                            data: formData,
                            success: function(array) {
                               // console.log(array);
                                alert(sent);
                                $('#update_form').html('update');
                                document.getElementById("updateProductForm").reset();
                                $('#edit_modal').modal('toggle');
                                toastr.success('Category update Success.');

                            },
                 cache: false,
                 contentType: false,
                 processData: false
                        });
                    });


                });
            });






          $('body').on('click', '#view', function() {
                var selector = $(this);
                let updateUrl = $(this).attr("link");
                let id = $(this).data('id');

              $.get("/product/view/" + id, function(data) {
                $('#e_id').val(data.id);
                    $('#v_product_code').val(data.product_code);
                    $('#v_product_name').val(data.product_name);
                    $('#v_product_slug').val(data.product_slug);
                    $('#v_quantity').val(data.quantity);
                    $('#v_regular_price').val(data.regular_price);
                    $('#v_sale_price').val(data.sale_price);
                    $('#v_short_description').val(data.short_description);
                    $('#v_description').val(data.description);
                    $('#v_stock_status').val(data.stock_status);
                    $('#v_sub_category_id').val(data.sub_category_id);
                    $('#v_brand_name').val(data.brand_id);
                    $('#v_id').val(data.id);
                    $('#v_category_name').val(data.category_name);


                    $('#image').html('<img src="uploads/sub_category_image/' + data.sub_category_image + '"/>');
                    $('#main_image').html('<img src="uploads/product_image/' + data.product_image + '"/>');

                    $("#e_category_id option[value='" + data.category_id + "']").attr("selected", "selected");
                    $("#e_sub_category_id option[value='" + data.sub_category_id + "']").attr("selected", "selected");
                    $("#e_brand_name option[value='" + data.brand_name + "']").attr("selected", "selected");
                    $("#e_size_name option[value='" + data.size_id + "']").attr("selected", "selected");
                    $("#e_color_name option[value='" + data.color_id + "']").attr("selected", "selected");
                  $('#view_image').html('<img src="uploads/product_image/' + data.product_image + '"/>');
              });
          });


          $('body').on('click', '#addproduct', function() {
              $('#dataTableShowHide').hide();
              $('#showAddproduct').show();
          });
          $('body').on('click', '#backadd', function() {
              $('#dataTableShowHide').show();
              $('#showAddproduct').hide();
          });

          $('body').on('click', '#edit', function() {
              $('#dataTableShowHide').hide();
              $('#editproduct').show();
          });
          $('body').on('click', '#backedit', function() {
              $('#dataTableShowHide').show();
              $('#editproduct').hide();
          });

      });
  </script>


  <script type="text/javascript">
       $(function subcategory() {
          var table = $('.ytable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.product') }}",
              columns: [{
                      data: 'DT_RowIndex',
                      name: 'DT_RowIndex'
                  },
                  {
                      data: 'category_name',
                      name: 'category_name'
                  },
                  {
                      data: 'sub_category_name',
                      name: 'sub_category_name'
                  },
                  {
                      data: 'product_name',
                      name: 'product_name'
                  },
                  {
                      data: 'brand_name',
                      name: 'brand_name'
                  },
                  {
                      data: 'description',
                      name: 'description'
                  },
                  {
                      data: 'sale_price',
                      name: 'sale_price'
                  },
                  {
                      data: 'product_code',
                      name: 'product_code'
                  },
                  {
                      data: 'stock_status',
                      name: 'stock_status'
                  },
                  {
                      data: 'product_image',
                      name: 'product_image',
                      "render": function(data, type, full, meta) {
                          return "<img src=\"/uploads/product_image/" + data + "\" height=\"30px\"/>"
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



    $(document).ready(function() {
        $("form#productFormd").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr("action"),
                type: 'POST',
                data: formData,
                success: function(arr) {
                    console.log(formData);
                    // document.getElementById("productForm").reset();
                    // toastr.success('Sub-category Add Success.');
                    // $('#showAddproduct').hide();
                    // $('#dataTableShowHide').show();
                    // $('example1').ajax.reload(null, false);

                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
</script>

  @endsection
