<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" > {{$task == 'save' ? 'Add Gallery' : 'Edit Gallery'}} </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url( $task == 'save' ? '/gallery/save' : '/gallery/update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{$task == 'save' ? '' : method_field('put')}}
                <input type="hidden" name="id" id="id">

                <div class="col-12">
                    <div class="form-group row">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" autocomplete="off">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"class="form-control editor" >

                        </textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <p ><b>Published:</b>
                            <input type="checkbox" name="is_published" id="is_published"  value="1">
                        </p>

                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">{{$task == 'save' ? 'Save' : 'Save changes'}}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </form>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-District -->
