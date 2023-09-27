<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" > {{$task == 'save' ? 'Add Menu' : 'Edit Menu'}} </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="{{url( $task == 'save' ? '/menu/save' : '/menu/update')}}" method="post">
            <div class="modal-body">

                @csrf
                {{$task == 'save' ? '' : method_field('put')}}
                <input type="hidden" name="id" id="id">
                <div class="col-12">
                    <div class="form-group row">
                        <label for="is_published">is_published</label>
                        <input type="checkbox" name="is_published" id="is_published"  value="1">

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="opens_in_new_tab ">opens_in_new_tab </label>
                        <input type="checkbox" name="opens_in_new_tab" id="opens_in_new_tab"  value="1">

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" autocomplete="off">
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group row">
                        <label for="url">URL</label>
                        <input type="url" class="form-control" name="url" id="url">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" name="order" id="order">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="parent_id ">parent_id </label>
                        <input type="number" class="form-control" name="parent_id " id="parent_id ">
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
