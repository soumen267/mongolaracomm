<!-- Modal starts -->
<div class="modal fade" id="editclientmodel" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Client</h5>
        <button type="button" class="close btn-closed" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="editclientform" action="{{ route('client.update') }}" method="post" enctype="multipart/form-data"
          id="editclientform">
          @csrf
          <input type="hidden" name="_method" value="PUT">
          <input id="userid" type="hidden" name="userid">
          <div class="form-group">
            <label>Company</label>
            <input type="text" class="form-control form-control-sm @error('company') is-invalid @enderror"
              name="company" value="" placeholder="Company" id="input-company" required>
            @error('company')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Owner</label>
            <input type="text" class="form-control form-control-sm @error('owner') is-invalid @enderror" name="owner"
              id="input-owner" required autocomplete="owner" placeholder="Owner" value="">
            @error('owner')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Pending Project</label>
            <input type="text" class="form-control  form-control-sm @error('pending_project') is-invalid @enderror"
              name="pending_project" id="input-project" required placeholder="Pending Project" value="">
            @error('pending_project')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Invoices</label>
            <input type="text" class="form-control form-control-sm @error('invoices') is-invalid @enderror"
              name="invoices" id="input-invoices" required placeholder="Invoices" value="">
            @error('invoices')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Category</label>
            <input type="text" class="form-control form-control-sm @error('category') is-invalid @enderror"
              name="category" id="input-category" required placeholder="Category" value="">
            @error('category')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Tags</label>
            <input type="text" id="tag" class="form-control form-control-lg @error('tags') is-invalid @enderror"
              name="tags" required placeholder="Tag" data-role="tagsinput">
            @error('tags')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control form-control-sm @error('status') is-invalid @enderror" name="status"
              id="input-status" required placeholder="Status" value="">
            @error('status')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="updateclientdata">Submit</button>
            <button type="button" class="btn btn-light btn-closed" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ends -->