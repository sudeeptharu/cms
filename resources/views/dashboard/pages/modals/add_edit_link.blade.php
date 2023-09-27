<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"> {{$task == 'save' ? 'Add Link' : 'Edit Link'}} </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" action="{{url( $task == 'save' ? '/link/save' : '/link/update')}}" method="post">
            <div class="modal-body">
                @csrf
                {{$task == 'save' ? '' : method_field('put')}}
                <input type="hidden" name="id" id="id">

                <div class="col-12">
                    <div class="form-group row">
                        <label for="title">Social</label>
                        <input type="text" class="form-control" name="social" id="social"autocomplete="off">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="description">Icon</label>
                        <input type="text" class="form-control"  name="icon" id="icon">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="url">URL</label>
                        <input type="url" class="form-control" name="url" id="url">
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
