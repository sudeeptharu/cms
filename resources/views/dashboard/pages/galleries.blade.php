@extends('dashboard.layouts.app',['name' => 'Gallery'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 col-12 text-center text-md-left">
                        <h1 class="m-0">Gallery</h1>
                    </div>
                    <div class="col-sm-6 col-12">
                        <ol class="breadcrumb justify-content-center float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Gallery</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card text-center text-md-left"">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_gallery">
                                    Add Gallery
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Title</th>
                                        <th>Description </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($galleries as $gallery)

                                        <tr class="text-center">
                                            <td>{{$gallery->title}}</td>
                                            <td>{{$gallery->description}}</td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="{{url('/gallery/images')."/".$gallery->id}}" class="btn btn-success btn-sm">
                                                        <span class="fa fa-solid fa-image"></span></a>
                                                    <a href="#" data-toggle="modal" data-target="#edit_gallery"
                                                       data-id="{{$gallery->id}}"
                                                       data-title="{{$gallery->title}}"
                                                       data-description="{{$gallery->description}}"
                                                       data-is_published="{{$gallery->is_published}}"
                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="{{url('/gallery/delete/'.$gallery->id )}}"
                                                       class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                <div class="col-12 d-flex justify-content-center paging">
                    {{ $galleries->onEachSide(0)->links() }}
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


    </div>

    <div class="modal fade" id="add_gallery">
        @include('dashboard.pages.modals.add_edit_gallery', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_gallery">
        @include('dashboard.pages.modals.add_edit_gallery', ['task' => 'update' ]);
    </div>

    {{--    <div class="modal fade" id="delete_modal">--}}
    {{--        @include('dashboard.pages.modals.delete_modal');--}}
    {{--    </div>--}}

@endsection
