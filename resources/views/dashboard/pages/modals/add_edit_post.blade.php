@extends('dashboard.layouts.app',['name' => 'Add Post'])

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add/Edit Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Add/Edit Post</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('/post/save')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title"> Title</label>
                                    <input type="text" value="{{ $post->title }}" name="title" id="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="subtitle">Subtitle</label>
                                    <input type="text" value="{{ $post->subtitle }}" name="subtitle" id="subtitle" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="editor" >
                                        {{ $post->description }}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="quote">Quote</label>
                                    <textarea name="quote" id="quote"class="form-control editor " >
                                        {{ $post->quote }}

                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt"class="form-control editor" >
                                        {{ $post->excerpt }}

                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Status</h3>
                                    </div>
                                    <div class="card-body">
                                        <p ><b>Draft:</b>
                                            <input type="checkbox" name="draft" id="draft" value="1" @if($post->draft=='1') checked @endif>
                                        </p>
                                        <button type="submit" class="btn btn-sm btn-primary btn-block">Publish</button>
                                    </div>
                                </div>



                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Featured Image</h3>
                                    </div>
                                    <div class="card-body">
                                        <input id="image" name="image" type="hidden" >
                                        <a href="#"
                                           data-toggle="modal"
                                           data-target="#modal-default-upload-image"
                                           data-bs-dismiss="modal"
                                           class="btn set"
                                           type="button">Click here to select Image</a>
                                        <a href="#" class="btn text-red reset hidden d-none"  type="button">Reset Image</a>
                                        <div id="cont-img"><img id="image_preview"  @if(!empty($post)) src="{{$post->image}}" width="200"  @else src="" style="display:none;" width="200" @endif  /></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
<!--<div class="modal-dialog modal-dialog modal-lg">--}}-->
<!--{{--    <div class="modal-content">--}}-->
<!--{{--        <div class="modal-header">--}}-->
<!--{{--            <h4 class="modal-title" > {{$task == 'save' ? 'Add Post' : 'Edit Post'}} </h4>--}}-->
<!--{{--            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}-->
<!--{{--                <span aria-hidden="true">&times;</span>--}}-->
<!--{{--            </button>--}}-->
<!--{{--        </div>--}}-->
<!---->
<!--{{--        <form class="form-horizontal" action="{{url( $task == 'save' ? '/post/save' : '/post/update')}}" method="post">--}}-->
<!--{{--            <div class="modal-body">--}}-->
<!---->
<!--{{--                @csrf--}}-->
<!--{{--                {{$task == 'save' ? '' : method_field('put')}}--}}-->
<!--{{--                <input type="hidden" name="id" id="id">--}}-->
<!--{{--                <div class="container">--}}-->
<!--{{--                    <div class="row">--}}-->
<!--{{--                        <div class="col-6">--}}-->
<!--{{--                            <div class="form-group row">--}}-->
<!--{{--                                <label for="title">Title</label>--}}-->
<!--{{--                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" autocomplete="off">--}}-->
<!--{{--                            </div>--}}-->
<!--{{--                        </div>--}}-->
<!--{{--                        <div class="col-6">--}}-->
<!--{{--                            <div class="form-group row">--}}-->
<!--{{--                                <label for="subtitle">Sub Title</label>--}}-->
<!--{{--                                <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Enter title" autocomplete="off">--}}-->
<!--{{--                            </div>--}}-->
<!--{{--                        </div>--}}-->
<!--{{--                    </div>--}}-->
<!--{{--                </div>--}}-->
<!---->
<!---->
<!--{{--                <div class="col-12">--}}-->
<!--{{--                    <div class="form-group row">--}}-->
<!--{{--                        <label for="description">Description</label><br>--}}-->
<!--{{--                        <textarea name="description" id="description"class="form-control editor" >--}}-->
<!---->
<!--{{--                        </textarea>--}}-->
<!--{{--                    </div>--}}-->
<!--{{--                </div>--}}-->
<!--{{--                <div class="col-12">--}}-->
<!--{{--                    <div class="form-group row">--}}-->
<!--{{--                        <label for="quote">Quote</label>--}}-->
<!--{{--                        <textarea name="quote" id="quote"class="form-control editor" >--}}-->
<!---->
<!--{{--                        </textarea>--}}-->
<!--{{--                    </div>--}}-->
<!--{{--                </div>--}}-->
<!--{{--                <div class="col-12">--}}-->
<!--{{--                    <div class="form-group row">--}}-->
<!--{{--                        <label for="excerpt">Excerpt</label>--}}-->
<!--{{--                        <textarea name="excerpt" id="excerpt"class="form-control editor" >--}}-->
<!---->
<!--{{--                        </textarea>--}}-->
<!--{{--                    </div>--}}-->
<!--{{--                </div>--}}-->
<!--{{--                <div class="col-12">--}}-->
<!--{{--                    <div class="form-group row">--}}-->
<!--{{--                        <div class="card-body">--}}-->
<!--{{--                            <input id="image" name="image" type="hidden" >--}}-->
<!--{{--                            <a href="#"--}}-->
<!--{{--                               data-toggle="modal"--}}-->
<!--{{--                               data-target="#modal-default-upload-image"--}}-->
<!--{{--                               data-bs-dismiss="modal"--}}-->
<!--{{--                               class="btn set"--}}-->
<!--{{--                               type="button">Click here to select Image</a>--}}-->
<!--{{--                            <a href="#" class="btn text-red reset hidden" type="button">Reset Image</a>--}}-->
<!--{{--                            <div id="cont-img"><img id="image_preview"  src="" width="200"  /></div>--}}-->
<!--{{--                        </div>--}}-->
<!--{{--                    </div>--}}-->
<!--{{--                </div>--}}-->
<!--{{--                <div class="col-12">--}}-->
<!--{{--                    <div class="form-group row">--}}-->
<!--{{--                        <p ><b>Draft:</b>--}}-->
<!--{{--                            <input type="checkbox" name="draft" id="draft"  value="1">--}}-->
<!--{{--                        </p>--}}-->
<!---->
<!--{{--                    </div>--}}-->
<!--{{--                </div>--}}-->
<!--{{--            </div>--}}-->
<!--{{--            <div class="modal-footer">--}}-->
<!--{{--                <button type="submit" class="btn btn-primary">{{$task == 'save' ? 'Save' : 'Save changes'}}</button>--}}-->
<!--{{--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}-->
<!--{{--            </div>--}}-->
<!---->
<!--{{--        </form>--}}-->
<!---->
<!--{{--    </div>--}}-->
<!--{{--    <!-- /.modal-content -->--}}-->
<!--{{--</div>-->
<div class="modal fade" id="modal-default-upload-image">
    @include('dashboard.pages.modals.add_media')
</div>
<script>
    $('#modal-default-upload-image').on('shown.bs.modal', function () {
        var polyfillAmdUrl =
            "https://cdn.jsdelivr.net/npm/intersection-observer-amd@2.0.1/intersection-observer.amd.min.js";
        var dependencies = [
            "IntersectionObserver" in window ? null : polyfillAmdUrl,
            "backend/dist/js/lazyload.amd.min.js"
        ];
        require(dependencies, function(_, LazyLoad) {
            window.ll = new LazyLoad({
                elements_selector: ".lazy"
            });

        });
    });


</script>
<!-- /.modal-District -->
@endsection
