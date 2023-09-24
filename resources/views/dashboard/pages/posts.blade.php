@extends('dashboard.layouts.app',['name' => 'Post'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Post</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a type="button" class="btn btn-primary" href="post/add">
                                    Add Post
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Title</th>
                                        <th>Excerpt </th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($posts as $post)
                                        <tr class="text-center">
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->excerpt}}</td>
                                            <td>{{$post->image}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="post/add/{{$post->id}}"
{{--                                                       data-toggle="modal" data-target="#edit_post"--}}
{{--                                                       data-id="{{$post->id}}"--}}
{{--                                                       data-title="{{$post->title}}"--}}
{{--                                                       data-description="{{$post->description}}"--}}
{{--                                                       data-subtitle="{{$post->subtitle}}"--}}
{{--                                                       data-image="{{$post->image}}"--}}
{{--                                                       data-quote="{{$post->quote}}"--}}
{{--                                                       data-draft="{{$post->draft}}"--}}
{{--                                                       data-excerpt="{{$post->excerpt}}"--}}
                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="{{url('/post/delete/'.$post->id )}}"
                                                       class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex p-4 justify-content-center">
                                    {{ $posts->onEachSide(0)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>

{{--    <div class="modal fade bd-example-modal-lg" id="add_post">--}}
{{--        @include('dashboard.pages.modals.add_edit_post', ['task' => 'save' ]);--}}
{{--    </div>--}}

{{--    <div class="modal fade  bd-example-modal-lg" id="edit_post">--}}
{{--        @include('dashboard.pages.modals.add_edit_post', ['task' => 'update' ]);--}}
{{--    </div>--}}

    {{--    <div class="modal fade" id="delete_modal">--}}
    {{--        @include('dashboard.pages.modals.delete_modal');--}}
    {{--    </div>--}}

@endsection
<!-- Main Modal -->
