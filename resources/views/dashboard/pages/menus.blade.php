@extends('dashboard.layouts.app',['name' => 'Menu'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 col-12 text-center text-md-left">
                        <h1 class="m-0">Menu</h1>
                    </div>
                    <div class="col-sm-6 col-12">
                        <ol class="breadcrumb justify-content-center float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_menu">
                                    Add Menu
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

                                    @foreach($menus as $menu)

                                        <tr class="text-center">
                                            <td>{{$menu->title}}</td>
                                            <td>{{$menu->description}}</td>
                                            <td>{{$menu->image}}</td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_menu"
                                                       data-id="{{$menu->id}}"
                                                       data-title="{{$menu->title}}"
                                                       data-url="{{$menu->url}}"
                                                       data-order="{{$menu->order}}"
                                                       data-is_published="{{$menu->is_published}}"
                                                       data-opens_in_new_tab="{{$menu->opens_in_new_tab}}"
                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="{{url('/menu/delete/'.$menu->id )}}"
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
                    {{ $menus->onEachSide(0)->links() }}
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>

    <div class="modal fade" id="add_menu">
        @include('dashboard.pages.modals.add_edit_menu', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_menu">
        @include('dashboard.pages.modals.add_edit_menu', ['task' => 'update' ]);
    </div>

    {{--    <div class="modal fade" id="delete_modal">--}}
    {{--        @include('dashboard.pages.modals.delete_modal');--}}
    {{--    </div>--}}

@endsection
