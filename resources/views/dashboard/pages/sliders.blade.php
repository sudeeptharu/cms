@extends('dashboard.layouts.app',['name' => 'Slider'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Slider</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Slider</a></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_slider">
                                    Add Slider
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

                                    @foreach($sliders as $slider)

                                        <tr class="text-center">
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->description}}</td>
                                            <td>{{$slider->image}}</td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_slider"
                                                       data-id="{{$slider->id}}"
                                                       data-title="{{$slider->title}}"
                                                       data-description="{{$slider->description}}"
                                                       data-url="{{$slider->url}}"
                                                       data-image="{{$slider->image}}"
                                                       data-order="{{$slider->order}}"
                                                       data-is_published="{{$slider->is_published}}"
                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="{{url('/slider/delete/'.$slider->id )}}"
                                                       class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>

                                </table>
                                <div class="d-flex p-4 justify-content-center">

                                {{ $sliders->onEachSide(0)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>

    <div class="modal fade" id="add_slider">
        @include('dashboard.pages.modals.add_edit_slider', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_slider">
        @include('dashboard.pages.modals.add_edit_slider', ['task' => 'update' ]);
    </div>

{{--    <div class="modal fade" id="delete_modal">--}}
{{--        @include('dashboard.pages.modals.delete_modal');--}}
{{--    </div>--}}

@endsection
