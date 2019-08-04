
<!-- jQuery 2.2.3 -->
<script src="{{url('AdminLTE')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url::asset('js/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('AdminLTE')}}/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
<script src="{{url('AdminLTE')}}/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{url('AdminLTE')}}/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{url('AdminLTE')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{url('AdminLTE')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('AdminLTE')}}/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{url('AdminLTE')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{url('AdminLTE')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('AdminLTE')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{url('AdminLTE')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{url('AdminLTE')}}/plugins/fastclick/fastclick.js"></script>
<!-- DataTables -->
<script src="{{url('AdminLTE')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src=".{{url('AdminLTE')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->

<!-- AdminLTE App -->
<script src="{{url('AdminLTE')}}/dist/js/app.min.js"></script>

<!--validate-->
<script src="{{url::asset('js/plugins/parsley/parsley.min.js')}}"></script>
<script src="{{url::asset('js/plugins/parsley/locale/vi.js')}}"></script>
<link rel="stylesheet" href="{{url::asset('js/plugins/parsley/css/parsley.css')}}" />

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
    var route_prefix = "{{ url(config('lfm.prefix')) }}";
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
</script>
