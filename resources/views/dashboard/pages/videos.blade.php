@extends('dashboard.layouts.app',['name' => 'video'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Video</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Video</a></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_video">
                                    Add Video
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Title</th>
                                        <th>Url</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($videos as $video)

                                        <tr class="text-center">
                                            <td>{{$video->title}}</td>
                                            <td>{{$video->url}}</td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_video"
                                                       data-id="{{$video->id}}"
                                                       data-title="{{$video->title}}"
                                                       data-url="{{$video->url}}"
                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="{{url('/video/delete/'.$video->id )}}"
                                                       class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>

                                </table>
                                <div class="d-flex p-4 justify-content-center">

                                {{ $videos->onEachSide(0)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>

    <div class="modal fade" id="add_video">
        @include('dashboard.pages.modals.add_edit_video', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_video">
        @include('dashboard.pages.modals.add_edit_video', ['task' => 'update' ]);
    </div>

    {{--    <div class="modal fade" id="delete_modal">--}}
    {{--        @include('dashboard.pages.modals.delete_modal');--}}
    {{--    </div>--}}

@endsection
