@extends('layouts.admin_layout')
@section("title")
Admin | companyinfo
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4> Companyinfo Menu </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">companyinfo Menu List</a></li>
                        <li class="breadcrumb-item active">companyinfo</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('companyinfo.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-0 mt-0">
                            <div class="card-header py-3 border-0 shadow-none">
                                <h4 class="card-title fs-5">
                                    @if(isset($companyinfo->id)) Update companyinfo @else Create companyinfo @endif
                                </h4>
                            </div>
                            <div class="card-body  border-0">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="company_name"> Company Name </label>
                                            <input type="text" name="company_name" id="company_name" placeholder="Enter company_name..." class="form-control" @if(isset($companyinfo->company_name)) value="{{$companyinfo->company_name}}" @endif/>
                                            @error('company_name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="Address">Address</label>
                                            <input type="text" name="Address" id="Address" placeholder="Enter Address..." class="form-control" @if(isset($companyinfo->Address)) value="{{$companyinfo->Address}}" @endif />
                                            @error('Address') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone1"> Phone Number 1</label>
                                            <input type="text" name="phone1" id="phone1" placeholder="Enter phone1 Number..." class="form-control" @if(isset($companyinfo->phone1)) value="{{$companyinfo->phone1}}" @endif/>
                                            @error('phone1') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone2"> Phone Number 2 </label>
                                            <input type="text" name="phone2" id="phone2" placeholder="Enter phone2 Number..." class="form-control" @if(isset($companyinfo->phone2)) value="{{$companyinfo->phone2}}" @endif/>
                                            @error('phone2') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email1">Email Address 1</label>
                                            <input type="email" name="email1" id="email1" placeholder="Enter email1..." class="form-control" @if(isset($companyinfo->email1)) value="{{$companyinfo->email1}}" @endif />
                                            @error('email1') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email2">Email Address 2</label>
                                            <input type="email" name="email2" id="email2" placeholder="Enter email2..." class="form-control" @if(isset($companyinfo->email2)) value="{{$companyinfo->email2}}" @endif />
                                            @error('email2') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>



                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Company description </label>
                                            <textarea type="text" name="description" id="description" placeholder="Enter description..." class="form-control">  @if(isset($companyinfo->description)) {{$companyinfo->description}} @endif </textarea>
                                            @error('description') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="newsletter_description">Newsletter Description</label>
                                            <textarea type="text" name="newsletter_description" id="newsletter_description" placeholder="Enter newsletter description..." class="form-control">@if(isset($companyinfo->newsletter_description)) {{$companyinfo->newsletter_description}} @endif  </textarea>
                                            @error('newsletter_description') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="menu_name">Start time</label>
                                            <input type="time" name="start_time" id="start_time" placeholder="Enter start time..." class="form-control" @if(isset($companyinfo->start_time)) value="{{$companyinfo->start_time}}" @endif />
                                            @error('start_time') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="end_time">End time </label>
                                            <input type="time" name="end_time" id="end_time" placeholder="Enter end time..." class="form-control" @if(isset($companyinfo->end_time)) value="{{$companyinfo->end_time}}" @endif />
                                            @error('end_time') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="copyright">Copyright</label>
                                            <input type="text" name="copyright" id="copyright" placeholder="Enter newsletter description..." class="form-control" @if(isset($companyinfo->copyright)) value="{{$companyinfo->copyright}}" @endif />
                                            @error('copyright') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>




                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="social_link_facebook">Social link for facebook</label>
                                            <input type="text" name="social_link_facebook" id="social_link_facebook" placeholder="Enter social_link_facebook..." class="form-control" @if(isset($companyinfo->social_link_facebook)) value="{{$companyinfo->social_link_facebook}}" @endif />
                                            @error('social_link_facebook') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="social_link_twitter">Social link for twitter</label>
                                            <input type="text" name="social_link_twitter" id="social_link_twitter" placeholder="Enter social_link_twitter..." class="form-control" @if(isset($companyinfo->social_link_twitter)) value="{{$companyinfo->social_link_twitter}}" @endif />
                                            @error('social_link_twitter') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="social_link_instragram">Social link for instragram</label>
                                            <input type="text" name="social_link_instragram" id="social_link_instragram" placeholder="Enter social_link_instragram..." class="form-control" @if(isset($companyinfo->social_link_instragram)) value="{{$companyinfo->social_link_instragram}}" @endif />
                                            @error('social_link_instragram') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="social_link_viber">Social link for viber</label>
                                            <input type="text" name="social_link_viber" id="social_link_viber" placeholder="Enter social_link_viber..." class="form-control" @if(isset($companyinfo->social_link_viber)) value="{{$companyinfo->social_link_viber}}" @endif />
                                            @error('social_link_viber') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>






                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="company_logo">Company Logo</label>
                                            <div class="row">
                                                <div class="col-md-auto px-1">
                                                    @if(isset($companyinfo->company_logo))
                                                    <img src="{{asset('uploads/companyLogo/'.$companyinfo->company_logo)}}" class="px-2" id="before_img" alt="" height="70px" width="70px" style="border-radius: 5px;">
                                                    <span class="form-label px-2" for="before_img">Before Logo</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-auto mt-auto px-1">
                                                    <input type="file" name="company_logo" id="company_logo" class="form-control border-0 p-1 border-0" />
                                                    @error('company_logo') <span class="error">{{ $message }}</span> @enderror
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="company_banner">Contact Form Bg Image</label>
                                            <div class="row">
                                                <div class="col-md-auto px-1">
                                                    @if(isset($companyinfo->company_banner))
                                                    <img src="{{asset('uploads/companyLogo/'.$companyinfo->company_banner)}}" class="px-2" id="before_img" alt="" height="70px" width="70px" style="border-radius: 5px;">
                                                    <span class="form-label px-2" for="before_img">Before Logo</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-auto mt-auto px-1">
                                                    <input type="file" name="company_banner" id="company_banner" class="form-control p-1 border-0" />
                                                    @error('company_banner') <span class="error">{{ $message }}</span> @enderror
                                                </div>

                                            </div>

                                        </div>
                                    </div>




                                </div>
                            </div>
                            <div class="card-footer border-0 shadow-none">
                                <button type="submit" class="btn btn-info-cs text-white btn-sm float-right"> <i class="fa fa-save"></i>&nbsp Update </button>
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
            $.get("companyinfo/edit/" + id, function(data) {
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
