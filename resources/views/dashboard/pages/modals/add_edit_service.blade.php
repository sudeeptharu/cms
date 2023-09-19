<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" > {{$task == 'save' ? 'Add Service' : 'Edit Service'}} </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url( $task == 'save' ? '/service/save' : '/service/update')}}" method="post">
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
                        <textarea name="description" id="description"class="form-control editor"  cols="30" rows="10">

                        </textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="excerpt">Excerpt</label>
                        <textarea name="excerpt" id="excerpt"class="form-control editor" >

                        </textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="description">Image</label>
                        <input type="file" class="form-control"  name="image" id="image">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" name="icon" id="icon">
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

