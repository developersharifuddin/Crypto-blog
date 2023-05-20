@extends('layouts.admin_layout')
@section("title")
Admin | Post
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
               <div class="col-md-12 border-0">
                    <div class="card shadow-none border-0 mt-3" style="background: none !important">
                        <div class="card-header px-0 border-0 shadow-0 d-block d-lg-none" style="background: none !important">
                           <button type="button" class="btn btn-info-cs float-right" data-bs-toggle="modal" data-bs-target="#modal-md">
                               <i class="fa fa-plus"></i> Add Trash
                           </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body border bg-white p-1">

                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <p style="font-size: 25px;" class="text-dark mb-0"> <i class="text-info fa fa-list-squares"></i> Trash List:
                                </p>
                            </div>

                            <table class="table table-sm table-responsive-sm table-responsive-md-none w-100">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Image</th>
                                        <th>title</th>
                                        <th>sub_title</th>
                                        <th>Description</th>
                                        <th>Created_at</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $key=>$post)
                                    <tr >
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{asset('uploads/images/'.$post->images)}}" alt="" style="height: 40px"></td>
                                        <td>{!! Str::limit($post->title, 15, ' ...') !!}</td>
                                        <td>{!! Str::limit($post->sub_title, 20, ' ...') !!}</td>
                                        <td>{!! Str::limit($post->description, 20, ' ...') !!}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td class="text-center">
                                            <button data-bs-toggle="tooltip" data-bs-placement="top" type="button"
                                            data-url="{{ route('trashed.restore', $post->id) }}" data-id="{{ $post->id }}"
                                             class="btn btn-sm bg-light shadow restore_btn text-success border-success" title="Restore">
                                             <i class="fa-solid fa-rotate" aria-hidden="true"></i></button>
                                            <button class="d-inline d-none delete btn btn-sm border-danger text-danger shadow " id="delete-form-{{$post->id}}" data-url="{{ route('trashed.delete', $post->id) }}" data-id="{{ $post->id }}" method="POST" data-bs-toggle="tooltip" data-bs-placement="top" title="Parmanently Delete from database ?"><i class="fa fa-trash"></i></button>
                                         </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="8" class="text-center">NO record founds</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

    {{-- @push('script')   --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

        $(document).on('click', '.restore_btn', function() {
            if (window.confirm('Are you sure that you want to restore it?') == false) {
                return false;
            }
            let key = $(this).data('id');
            let url = $(this).data('url');
            //alert(url);
            bounchButton = (this);
            var button = this;
            window.onbeforeunload = function() {
                return "Dude, are you sure you want to leave? Think of the kittens!";
            }

            axios.post(url, {
                    id: key
                })
                .then((response) => {
                    deBounchButton = (button);
                    $('.preloader').css('display', 'none');
                    $(this).parents('tr').remove();
                    window.onbeforeunload = false;
                    toastr.success(response.data)
                })
                .catch((error) => {
                    deBounchButton(button);
                    window.onbeforeunload = false;
                    toastr.error(error.response.data)
                })
        })

        $(document).on('click', '.delete', function() {
            if (window.confirm('Are you sure that you want to Parmanently Delete it?') == false) {
                return false;
            }
            let data = $(this).data('id');
            let url = $(this).data('url');

            axios.post(url, {
                    id: data
                })
                .then((response) => {
                    $(this).parents('tr').remove();
                    toastr.success(response.data);
                })
                .catch((error) => {
                    toastr.error(error.response.data);
                })
        })
    </script>
     {{-- @endpush  --}}


    @endsection

