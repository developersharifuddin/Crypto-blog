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

                        <!-- /.card-header -->
                        <div class="card-body border bg-white">

                            <div class="mb-3 mb-md-5">
                                <p style="font-size: 25px;" class="text-dark mb-0 float-start"> <i class="text-info fa fa-list-squares"></i> Post List:
                                </p>
                                <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm  float-end"> <i class="fa fa-plus"></i> Add New</a>
                            </div>

                            <table class="table table-sm border-0 table-responsive-sm table-responsive-md-none" id="example1">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Image</th>
                                        <th>title</th>
                                        <th>sub_title</th>
                                        <th>Description</th>
                                        <th>Created_at</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $key=>$post)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{asset('uploads/images/'.$post->images)}}" alt="" style="height: 40px"></td>
                                        <td>{!! Str::limit($post->title, 30, ' ...') !!}</td>
                                        <td>{!! Str::limit($post->sub_title, 30, ' ...') !!}</td>
                                        <td>{!! Str::limit($post->description, 30, ' ...') !!}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td class="status">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input toggleStatus" data-id="{{ $post->id }}" data-url="{{ route('post.status', $post->id) }}"
                                                 type="checkbox" {{ $post->is_active ? 'checked' : '' }} style="width:35px !important;height:20px !important; border-radius:20px !important">
                                            </div>
                                        </td>
                                        <td class="text-center" style="min-width:85px !important">
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" href="{{ route('post.edit', $post->id) }}" title="edit post" class="btn btn-sm text-info bg-light shadow border-info"> <i class="fa fa-edit"></i></a>
                                            <form class="d-inline" action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Delete database post" type="submit" class="btn btn-sm border-danger text-danger shadow "><i class="fa fa-trash"></i></button>
                                            </form>
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
    @endsection

    {{-- @push('script') --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> --}}
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>


<!-- DataTables  & Plugins -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script> 
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
         const spinnerDom =`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`;


        $(document).on('click', '.toggleStatus', function() {
            let data_id = $(this).data('id');
            let url = $(this).data('url');
            // alert(url);
            var status = $(this).is(':checked') ? 1 : 0;
            var previousStatus = $(this).is(':checked') == false ? true : false;

            if (window.confirm('Are you sure to change active status ?') == false) {
                return false;
            }

            axios.post(url, {
                    id: data_id,
                    is_active: status,
                })
                .then((response) => {
                    toastr.success(response.data);
                })
                .catch((error) => {
                    toastr.error(error.response.data);
                    if (previousStatus) {
                        $(this).prop('checked', 'true');
                    } else {
                        $(this).attr('checked', 'false');
                    }
                })
        })
    </script>
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
    {{-- @endpush --}}
