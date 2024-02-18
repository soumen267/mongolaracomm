<!-- Modal starts -->
<div class="modal fade" id="assignmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Assign Project</h5>
          <button type="button" class="close btn-closed" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="error-body">
        </div>
        <div class="modal-body">
          <form action="{{ route('project.assignstore') }}" method="post" enctype="multipart/form-data" id="assignform">
            @csrf
            <input type="hidden" name="projectid" id="projectid" value="">
            <div class="form-group row">
              <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">User</label>
              <div class="col-sm-12 col-lg-10">
              <select name="user[]" id="user" class="form-control form-control-lg select2" multiple="">
              </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="addassdata">Submit</button>
          <button type="button" class="btn btn-light btn-closed" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Ends -->