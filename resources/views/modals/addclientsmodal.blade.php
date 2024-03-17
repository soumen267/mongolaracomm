<!-- Modal starts -->
<div class="modal fade" id="addclientmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Client</h5>
        <button type="button" class="close btn-closed" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="addclientform" action="{{ route('client.store') }}" method="post" enctype="multipart/form-data"
          id="addclientform">
          @csrf
          <div class="form-group">
            <label>Company</label>
            <input type="text" class="form-control form-control-sm @error('company') is-invalid @enderror" name="company"
              value="{{ old('company') }}" placeholder="Company Name" required>
            @error('company')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Owner</label>
            <input type="text" class="form-control form-control-sm @error('owner') is-invalid @enderror" name="owner"
              value="{{ old('owner') }}" required autocomplete="owner" placeholder="Owner">
            @error('owner')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Pending Project</label>
            <input type="text" class="form-control  form-control-sm @error('pending_project') is-invalid @enderror"
              name="pending_project" required placeholder="Pending Project">
            @error('pending_project')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Invoices</label>
            <input type="text" class="form-control form-control-sm @error('invoices') is-invalid @enderror"
              name="invoices" required placeholder="Invoices">
            @error('invoices')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Category</label>
            <input type="text" class="form-control form-control-sm @error('category') is-invalid @enderror"
              name="category" required placeholder="Category">
            @error('category')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Tags</label>
            <input type="text" class="form-control form-control-lg @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags') }}" required placeholder="Tag" data-role="tagsinput">
            @error('tags')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
             </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control form-control-sm @error('status') is-invalid @enderror"
              name="status" required placeholder="Status">
            @error('status')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="addclientdata">Submit</button>
            <button type="button" class="btn btn-light btn-closed" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ends -->