@extends('dashboard.layouts.app',['name' => 'Media Manager'])
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Media Manager</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Media Manager</a></li>
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
                                <button type="button" id="AddNewUploads" class="btn btn-success btn-sm pull-right">Add New</button>
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
<!--"-->
                                <form  action="{{url('/mediaManager/uploadmedia')}}" id="fm_dropzone_main"   enctype="multipart/form-data" method="POST">
                                    @csrf
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
<div class="modal fade" id="EditFileModal"   aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">File: </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p0">
                <div class="row m0">
                    <div class="col-xs-7 col-sm-8 col-md-8">
                        <div class="fileObject">

                        </div>
                    </div>
                    <div class="col-xs-5 col-sm-4 col-md-4">
                        <form class="file-info-form">
                            @csrf
                            <input type="hidden" name="file_id" value="0">
                            <div class="form-group">
                                <label for="filename">File Name</label>
                                <input class="form-control" placeholder="File Name" name="filename" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input class="form-control" placeholder="URL" name="url" type="text" readonly value="">
                            </div>
                            <div class="form-group">
                                <label for="caption">Label</label>
                                <input class="form-control" placeholder="Caption" name="caption" type="text" value="">
                            </div>

                        </form>
                    </div>
                </div><!--.row-->
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" id="downFileBtn" href="">Download</a>

                <a class="btn btn-danger" id="delFileBtn" href="">Delete</a>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <script>
        var bsurl = '{{Storage::url('images')}}';

        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
        // var bsurl='images';
        console.log(bsurl)
        var fm_dropzone_main = null;
        var cntFiles = null;
        $(function () {
            fm_dropzone_main = new Dropzone("#fm_dropzone_main", {
                maxFilesize: 20,
                acceptedFiles: "image/*,application/pdf",
                init: function() {
                    this.on("complete", function(file) {
                        this.removeFile(file);
                    });
                    this.on("success", function(file) {
                        console.log("addedfile");
                        console.log(file);
                        loadUploadedFiles();
                    });
                }
            });


            $("body").on("click", "ul.files_container .fm_file_sel", function() {
                var upload = $(this).attr("upload");
                upload = JSON.parse(upload);

                $("#EditFileModal .modal-title").html("File: "+upload);
                $(".file-info-form input[name=filename]").val(upload);
                $(".file-info-form input[name=url]").val(bsurl+'/'+upload);
                $("#EditFileModal #downFileBtn").attr("href", bsurl+'/'+upload+"?download");
                $("#EditFileModal #delFileBtn").attr("href","{{url('/mediaManager/destroyImage')."/"}}"+upload);
                $("#EditFileModal .fileObject").empty();
                var ext=upload.split('.')[1];
                if($.inArray(ext, ["jpg", "jpeg", "png", "gif", "bmp"]) > -1) {
                    $("#EditFileModal .fileObject").append('<img src="'+bsurl+''+'/'+upload+'">');
                    $("#EditFileModal .fileObject").css("padding", "15px 0px");
                } else {
                    switch (upload.extension) {
                        case "pdf":
                            // TODO: Object PDF
                            $("#EditFileModal .fileObject").append('<object width="100%" height="325" data="'+bsurl+''+'/'+upload.name+'"></object>');
                            $("#EditFileModal .fileObject").css("padding", "0px");
                            break;
                        default:
                            $("#EditFileModal .fileObject").append('<i class="fa fa-file-text-o"></i>');
                            $("#EditFileModal .fileObject").css("padding", "15px 0px");
                            break;
                    }
                }
                $("#EditFileModal").modal('show');

            });

            loadUploadedFiles();


            $('#image_name').on('input',function () {
                var search_text = $(this).val();
                var newFiles = cntFiles.filter(function (file) {
                    return file.name.includes(search_text);
                });
                showLoadedImages(newFiles);

            });

            $("#fm_dropzone_main").slideUp();
            $("#AddNewUploads").on("click", function() {
                $("#fm_dropzone_main").slideDown();
            });
            $("#closeDZ1").on("click", function() {
                $("#fm_dropzone_main").slideUp();
            });

            $("#modal-default-upload-image").on('hide.bs.modal', function(){
                $('.set').hide();
                $('.reset').removeClass('hidden');
            });
            $('.reset').on('click',function () {
                $('#image_preview').attr('src','');
                $('.set').show();
                $('.reset').addClass('hidden');
            });
        });

        function loadUploadedFiles() {
            // load folder files
            $.ajax({
                dataType: 'json',
                url: "{{ url('/mediaManager/image') }}",
                success: function ( json ) {
                    cntFiles = json.uploads;
                    showLoadedImages(cntFiles)
                }
            });
        }

        function showLoadedImages(files) {
            $("ul.files_container").empty();
            if(files.length) {
                for (var index = 0; index < 16; index++) {
                    var element = files[index];

                    var li = formatFile(element,"");
                    $("ul.files_container").append(li);
                }
                for(var index = 16; index < files.length; index++)
                {
                    var element = files[index];
                    var li = formatFile(element,"data-");
                    $("ul.files_container").append(li);
                }
            } else {
                $("ul.files_container").html("<div class='text-center text-danger' style='margin-top:40px;'>No Files</div>");
            }
            setLazyLoad();
        }
        function formatFile(upload,data) {
            var image = '';
            if($.inArray(upload.extension, ["jpg", "jpeg", "png", "gif", "bmp"]) > -1) {
                image = '<img class="lazy"'+data+'src="'+bsurl+'/'+upload+'?s=130">';
            } else {
                image = '<img class="lazy"'+data+'src="'+bsurl+'/'+upload+'?s=130">';
            }
            $(document).ready(function() {
                $('.badge-danger').on('click', function() {
                    $(this).closest('li').hide();
                    // var imagename=$(this).closest('li').find('img').attr('src');
                    // var parts=imagename.split('/')[1];
                    // var imageactualname=parts.split('?')[0]

                    // console.log(imageactualname);
                });
            });
            // return '<li><a class="fm_file_sel" data-toggle="tooltip" data-placement="top" title="'+upload.name+'"\>'+image+'</a></li>';
            // return '<li ><a class="fm_file_sel" style="position: relative;"  data-toggle="tooltip" data-placement="top"  upload=\''+JSON.stringify(upload)+'\'>'
            //     +image+'<span class="badge badge-pill badge-danger badge-up" style="top: 0px !important;right: 0px !important; position: absolute; cursor: pointer;">x</span></a></li>';
            return '<li ><a class="fm_file_sel"  data-toggle="tooltip" data-placement="top" title="'+upload+'" upload=\''+JSON.stringify(upload)+'\'>'+image+'</a></li>';

        }

    </script>

@endsection


