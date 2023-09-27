@extends('dashboard.layouts.app',['name' => 'Image'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 col-12 text-center text-md-left">
                        <h1 class="m-0">Image</h1>
                    </div>
                    <div class="col-sm-6 col-12">
                        <ol class="breadcrumb justify-content-center float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Image</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center text-md-left"">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_image">
                                    Add image
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Title</th>
                                        <th>Description </th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($images as $image)

                                        <tr class="text-center">
                                            <td>{{$image->title}}</td>
                                            <td>{{$image->description}}</td>
                                            <td>{{$image->image}}</td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_image"
                                                       data-id="{{$image->id}}"
                                                       data-title="{{$image->title}}"
                                                       data-description="{{$image->description}}"
                                                       data-url="{{$image->url}}"
                                                       data-image="{{$image->image}}"
                                                       data-order="{{$image->order}}"
                                                       data-is_published="{{$image->is_published}}"
                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="{{url('/image/delete/'.$image->id )}}"
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
                    {{ $images->onEachSide(0)->links() }}
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>

    <div class="modal fade" id="add_image">
        @include('dashboard.pages.modals.add_edit_image', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_image">
        @include('dashboard.pages.modals.add_edit_image', ['task' => 'update' ]);
    </div>

    {{--    <div class="modal fade" id="delete_modal">--}}
    {{--        @include('dashboard.pages.modals.delete_modal');--}}
    {{--    </div>--}}

@endsection
