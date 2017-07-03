@extends('backend.layouts.default')
@section('title', 'Thư viện media')
@section('content')

@push('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
@endpush




<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thư viện media
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="col-md-12">
        <form method="POST" enctype="multipart/form-data" class="dropzone" id="image-upload" action="{{URL::asset('rest/media/addnew')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input style="display: none" name="file" type="file"  multiple="" />
        </form>
    </div>
</section>
<script type="text/javascript">
Dropzone.options.upload = {
    maxFilesize: 10,
    acceptedFiles: ""
};
</script>

</angular>
@endsection