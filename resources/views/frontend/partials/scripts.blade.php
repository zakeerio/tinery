
{{-- Plugins --}}
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script> --}}

<script src="{{asset('js/bootstrap-notify.js')}}"></script>
<script src="{{asset('js/bootstrap-notify.min.js')}}"></script>



{{-- scripts --}}
<script src="{{asset('js/admin/js/adminlte.js')}}"></script>
<script src="{{asset('js/admin/custom.js')}}"></script>
<input type="hidden" name="_token" id="csrftoken" value="{{ csrf_token() }}">
@if(Session::has('success'))
    <script>
        $.notify({
        title: '<strong>SUCCESS!</strong>',
        message: '<?= Session::get('success')?>'
        },{
        type: 'success'
        });
    </script>
@endif
@if(Session::has('error'))
    <script>
        $.notify({
        title: '<strong>Error!</strong>',
        message: '<?= Session::get('error')?>'
        },{
        type: 'danger'
        });
    </script>
@endif
<script>
    $(document).ready(function(){
        $(document).on('click','a[data-role=addtowishlist]',function(){
            var id = $(this).data('id');
            var csrftoken = $('#csrftoken').val();
            
            $.ajax({
                url:'{{ url("/favourites")}}',
                method:'post',
                data:{_token:csrftoken,id:id},
                success:function(data)
                {
                    var res = $.parseJSON(data);
                    if(res.success)
                    {
                        $.notify({
                        title: '<strong>SUCCESS!</strong>',
                        message: res.success
                        },{
                        type: 'success'
                        });
                    }
                    if(res.error)
                    {
                        $.notify({
                        title: '<strong>SUCCESS!</strong>',
                        message: res.error
                        },{
                        type: 'danger'
                        });
                    }

                    // window.setTimeout(window.location.href = "{{URL::to('/')}}",5000);

                }
            });
        });
    });
</script>