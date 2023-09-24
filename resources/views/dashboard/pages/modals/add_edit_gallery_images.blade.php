@extends('dashboard.layouts.app',['name' => 'Gallery'])
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Gallery</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Gallery</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="AddNewUploads" class="btn btn-success"><span class="fa fa-plus-circle"></span> Add New</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{url('gallery/images/upload_files')}}" id="fm_dropzone_main" enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="hidden" name="gallery_id" value="{{$gallery->id}}">
                                <a id="closeDZ1"><i class="fa fa-times"></i></a>
                                <div class="dz-message"><i class="fa fa-cloud-upload"></i><br>Drop files here to upload</div>
                            </form>

                            <div class="box box-success" style="overflow:auto; height:500px;"  >
                                <!--<div class="box-header"></div>-->
                                <div class="box-body" >
                                    <ul class="files_container">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script>
        var fm_dropzone_main = null;
        var cntFiles = null;
        $(function () {
            fm_dropzone_main = new Dropzone("#fm_dropzone_main", {
                maxFilesize: 2,
                acceptedFiles: "image/*",
                init: function() {
                    this.on("complete", function(file) {
                        this.removeFile(file);
                    });
                    this.on("success", function(file) {
                        //console.log("addedfile");
                        //console.log(file);
                        loadUploadedFiles();
                    });

                }
            });

            $("#fm_dropzone_main").hide();
            $("#AddNewUploads").on("click", function() {
                $("#fm_dropzone_main").slideDown();
            });
            $("#closeDZ1").on("click", function() {
                $("#fm_dropzone_main").slideUp();
            });
            loadUploadedFiles();
            $("body").on("click", "ul.files_container .fm_file_sel span", function() {
                var upload = $(this).closest('a').attr("upload");
                upload = JSON.parse(upload);
                var url = "/gallery/images/delete/"+upload.id;
                $.ajax({
                    dataType: 'json',
                    url: url,
                    method: 'get',
                    success: function ( response ) {
                        loadUploadedFiles();
                        toastr.success(response.message)
                    }
                });

            });

        });
        function loadUploadedFiles() {
            // load folder files
            url = "{{ url('/gallery/images/uploaded_files')."/".$gallery->id }}";
            $.ajax({
                dataType: 'json',
                url: url,
                success: function ( json ) {
                    cntFiles = json.uploads;
                    $("ul.files_container").empty();
                    if(cntFiles.length) {
                        for (var index = 0; index < 16; index++) {
                            var element = cntFiles[index];
                            console.log(element)
                            var li = formatFile(element,"");
                            $("ul.files_container").append(li);
                        }
                        for(var index = 16; index < cntFiles.length; index++)
                        {
                            var element = cntFiles[index];
                            console.log(element)
                            var li = formatFile(element,"data-");
                            $("ul.files_container").append(li);
                        }
                    } else {
                        $("ul.files_container").html("<div class='text-center text-danger' style='margin-top:40px;'>No Files</div>");
                    }
                    //setLazyLoad();
                }
            });
        }
        function formatFile(upload,data) {
            var image = '';
            var path = '{{url('/')}}'+upload.image;

            image = '<img  '+data+'src="'+path+'?s=130">';

            return '<li ><a class="fm_file_sel" style="position: relative;"  data-toggle="tooltip" data-placement="top"  upload=\''+JSON.stringify(upload)+'\'>'
                +image+'<span class="badge badge-pill badge-danger badge-up" style="top: 0px !important;right: 0px !important; position: absolute;">x</span></a></li>';
        }

    </script>


@endsection


