@extends('dashboard.layouts.app',['name' => 'Web Setting'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 col-12 text-center text-md-left">
                        <h1 class="m-0">Web Setting</h1>
                    </div>
                    <div class="col-sm-6 col-12">
                        <ol class="breadcrumb justify-content-center float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Web Setting</a></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_web_setting">
                                    Add Web Setting
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Key</th>
                                        <th>Value </th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($webSettings as $webSetting)

                                        <tr class="text-center">
                                            <td>{{$webSetting->key}}</td>
                                            <td>{{$webSetting->value}}</td>
                                            <td>{{$webSetting->image}}</td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_web_setting"
                                                       data-id="{{$webSetting->id}}"
                                                       data-value="{{$webSetting->value}}"
                                                       data-align="{{$webSetting->align}}"
                                                       data-image="{{$webSetting->image}}"
                                                       data-key="{{$webSetting->key}}"
                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="{{url('/webSetting/delete/'.$webSetting->id)}}"
                                                       class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>

                                </table>
                                <div class="d-flex p-4 justify-content-center">

                                    {{ $webSettings->onEachSide(0)->links() }}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>

    <div class="modal fade" id="add_web_setting">
        @include('dashboard.pages.modals.add_edit_web_setting', ['task' => 'save' ]);
    </div>

    <div class="modal fade" id="edit_web_setting">
        @include('dashboard.pages.modals.add_edit_web_setting', ['task' => 'update' ]);
    </div>

<!--    {{--    <div class="modal fade" id="delete_modal">--}}-->
<!--    {{--        @include('dashboard.pages.modals.delete_modal');--}}-->
<!--    {{--    </div>--}}-->

@endsection
