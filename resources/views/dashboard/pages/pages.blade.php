@extends('dashboard.layouts.app',['name' => 'Page'])

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 col-12 text-center text-md-left">
                        <h1 class="m-0">Page</h1>
                    </div>
                    <div class="col-sm-6 col-12" >
                        <ol class="breadcrumb justify-content-center float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Page</a></li>
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
                                <a type="button"
                                        class="btn btn-primary"
{{--                                        data-toggle="modal"--}}
{{--                                        data-target="#add_page"--}}
                                href="page/add"
                                >
                                    Add Page
                                </a>
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

                                    @foreach($pages as $page)

                                        <tr class="text-center">
                                            <td>{{$page->title}}</td>
                                            <td>{{$page->description}}</td>
                                            <td>{{$page->image}}</td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="page/add/{{$page->id}}"
{{--                                                       data-toggle="modal" data-target="#edit_page"--}}
{{--                                                       data-id="{{$page->id}}"--}}
{{--                                                       data-title="{{$page->title}}"--}}
{{--                                                       data-description="{{$page->description}}"--}}
{{--                                                       data-subtitle="{{$page->subtitle}}"--}}
{{--                                                       data-image="{{$page->image}}"--}}
{{--                                                       data-quote="{{$page->quote}}"--}}
{{--                                                       data-draft="{{$page->draft}}"--}}
{{--                                                       data-excerpt="{{$page->excerpt}}"--}}
{{--                                                       data-slug="{{$page->slug}}"--}}
                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="{{url('/page/delete/'.$page->id )}}"
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
                    {{ $pages->onEachSide(0)->links() }}
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>

{{--    <div class="modal fade  bd-example-modal-lg" id="add_page">--}}
{{--        @include('dashboard.pages.modals.add_edit_page', ['task' => 'save' ]);--}}
{{--    </div>--}}

{{--    <div class="modal fade  bd-example-modal-lg" id="edit_page">--}}
{{--        @include('dashboard.pages.modals.add_edit_page', ['task' => 'update' ]);--}}
{{--    </div>--}}

    {{--    <div class="modal fade" id="delete_modal">--}}
    {{--        @include('dashboard.pages.modals.delete_modal');--}}
    {{--    </div>--}}

@endsection
