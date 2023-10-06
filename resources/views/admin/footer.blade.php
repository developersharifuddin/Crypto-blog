<!-- /.content-wrapper -->
<!-- /.control-sidebar -->
<!-- Main Footer -->
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-inline text-center justify-content-center">
        <img src="../uploads/images/software-development.png" height="60px"> <br>
        A product by Developer Code
    </div>
    <div class="sticky-bottom my-auto pt-4">
        <strong>Copyright &copy; 2023-
            {{-- {{ site.time | date: '%Y' }} --}}
            <a href="https://www.linkedin.com/in/md-sharif-uddin">Developers</a>.</strong> All rights reserved.
        <br> {{-- {{ site.version }} --}} version 1.2.0
    </div>
</footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->

<script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)

</script>

<!-- Summernote -->
<script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- <script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script> -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.min.js"></script>

<script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed"
            , theme: "monokai"
        });
    })

</script>


<script type="text/javascript">
    $(document).ready(function() {

        $('body').on('click', '#delete', function() {
            var selector = $(this);

            Swal.fire({
                title: 'Are you sure?'
                , text: "You won't be able to revert this!"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    let id = $(this).data('id');
                    //alert(url);
                    //e.preventDefault();
                    // var link = $(this).attr("href");
                    //window.location.href = link;
                    $.ajax({
                        url: $(this).attr("link")
                        , type: "GET"
                        , data: id
                        , success: function(arr) {
                            //alert(123);
                            //alert(id);
                            // $('#deleted').html(arr);
                            var row = $(selector).parent('td').parent('tr').hide();
                            $(row).fadeOut('slow');
                        }
                        , error: function(err) {
                            alert('error');
                        }

                    });


                    Swal.fire(
                        'confim!'
                        , 'This data has been deleted.'
                        , 'success'
                    )

                } else {
                    Swal.fire(
                        'cancel!'
                        , 'Your imaginary file is safe!'
                        , 'cancelled'
                    )
                }
            });
        });




    });

</script>



@if($errors->any())
@foreach($errors->all() as $error)
<script>
    toastr.error('{{$error}}')

</script>
@endforeach
@endif

{!! Toastr::message() !!}

@stack('js')


</body>

</html>
