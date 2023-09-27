<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add Media</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row" style="margin-bottom:5px;">
                <div class="col-md-12">
                    <button type="button" id="AddNewUploads" class="btn btn-success btn-sm pull-right">Add New</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <form action="{{url('/mediaManager/uploadmedia')}}" id="fm_dropzone_main" enctype="multipart/form-data" method="POST">
                        @csrf
                        <a id="closeDZ1"><i class="fa fa-times"></i></a>
                        <div class="dz-message"><i class="fa fa-cloud-upload"></i><br>Drop files here to upload</div>
                    </form>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-primary card-outline">
                        <!--<div class="box-header"></div>-->
                        <div class="card-body" >
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-2">
                                        <label>Search Image</label>
                                    </div>
                                    <div class="col-10">
                                        <input class="form-control" id="image_name" placeholder="Search Image . . ."/>
                                    </div>
                                </div>
                            </div>
                            <ul class="files_container">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer" style="border-top: none !important;">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<script>

    var bsurl = '{{Storage::url('images')}}';
    // var bsurl = 'images';
    var fm_dropzone_main = null;
    var cntFiles = null;
    $(function () {
        fm_dropzone_main = new Dropzone("#fm_dropzone_main", {
            maxFilesize: 2,
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
            var upload = $(this).attr("title");
            $("body").find('#image_preview').attr('src','{{Storage::url('images')."/"}}'+upload).show();
            $('body').find('#image').val('{{Storage::url('images')."/"}}'+upload);
            $('#modal-default-upload-image').modal('hide');
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
            $('.reset').removeClass('d-none');
        });
        $('.reset').on('click',function () {
            $('#image_preview').attr('src','');
            $('.set').show();
            $('.reset').addClass('d-none');
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
            image = '<img class="lazy"'+data+'src="'+bsurl+'/'+upload.name+'?s=130">';
        } else {
            image = '<img class="lazy"'+data+'src="'+bsurl+'/'+upload+'?s=130">';
        }
        // $('.image').value=upload;
        console.log(upload)
        return '<li><a class="fm_file_sel" data-toggle="tooltip" data-placement="top" title="'+upload+'"\>'+image+'</a></li>';
    }
</script>
