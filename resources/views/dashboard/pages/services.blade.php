@extends('dashboard.layouts.app',['name' => 'service'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 col-12 text-center text-md-left">
                        <h1 class="m-0">Service</h1>
                    </div>
                    <div class="col-sm-6 col-12">
                        <ol class="breadcrumb justify-content-center float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Service</a></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_service">
                                    Add service
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

                                    @foreach($services as $service)

                                        <tr class="text-center">
                                            <td>{{$service->title}}</td>
                                            <td>{{$service->description}}</td>
                                            <td>{{$service->image}}</td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_service"
                                                       data-id="{{$service->id}}"
                                                       data-title="{{$service->title}}"
                                                       data-description="{{$service->description}}"
                                                       data-icon="{{$service->icon}}"
                                                       data-image="{{$service->image}}"
                                                       data-excerpt="{{$service->excerpt}}"
                                                       data-is_published="{{$service->is_published}}"
                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="{{url('/service/delete/'.$service->id )}}"
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
                    {{ $services->onEachSide(0)->links() }}
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


    </div>

    <div class="modal fade" id="add_service">
        @include('dashboard.pages.modals.add_edit_service', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_service">
        @include('dashboard.pages.modals.add_edit_service', ['task' => 'update' ]);
    </div>

    {{--    <div class="modal fade" id="delete_modal">--}}
    {{--        @include('dashboard.pages.modals.delete_modal');--}}
    {{--    </div>--}}


@endsection
