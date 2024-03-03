<!-- Modal starts -->
<div class="modal fade" id="addtaskmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add A New Task</h5>
        <button type="button" class="close btn-closed" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body min-h-200">
        <form action="{{ route('task.store') }}" method="post" id="addtaskform">
          @csrf
          <input type="hidden" name="projectid" class="projectid" value="">
          <div class="form-group row">
            <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Title</label>
            <div class="col-sm-12 col-lg-9">
              <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" name="title"
                value="{{ old('title') }}" required>
              @error('title')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Milestone</label>
            <div class="col-sm-12 col-lg-9">
              <select name="milestone" class="form-control form-control">
                <option value="Design">Design</option>
                <option value="Planning">Planning</option>
                <option value="Development">Development</option>
                <option value="Uncategorised">Uncategorised</option>
              </select>
              @error('milestone')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Priority</label>
            <div class="col-sm-12 col-lg-9">
              <select name="priority" class="form-control form-control">
                <option value="Normal">Normal</option>
                <option value="Low">Low</option>
                <option value="High">High</option>
                <option value="Urgent">Urgent</option>
              </select>
              @error('priority')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Assign Users*</label>
            <div class="col-sm-12 col-lg-9">
              <select name="user[]" id="user" class="form-control form-control-sm select2" multiple="">
              </select>
            </div>
          </div>
          <hr />
          <div class="form-group row">
            <label class="col-sm-12 col-lg-8 text-left control-label col-form-label">Description</label>
            <div class="col-sm-12 col-lg-4">
              <label class="switch">
                <input type="checkbox" id="description">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <div class="moreinfo" style="display:none">
            <textarea id="summernote" name="description"></textarea>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-lg-8 text-left control-label col-form-label">Option</label>
            <div class="col-sm-12 col-lg-4">
              <label class="switch">
                <input type="checkbox" id="option">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <div class="moreinfo1" style="display:none">
            <div class="form-group row">
              <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">TargetDate</label>
              <div class="col-sm-12 col-lg-9">
                <input type="date" id="duedate"
                  class="form-control form-control-sm @error('duedate') is-invalid @enderror" name="duedate"
                  value="{{ old('duedate') }}" required placeholder="Due Date" id="duedate">
                @error('duedate')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Tags</label>
              <div class="col-sm-12 col-lg-10">
                <input type="text" id="tag" class="form-control form-control-lg @error('tag') is-invalid @enderror" name="tag" value="{{ old('tag') }}" required placeholder="Tag" data-role="tagsinput">
                @error('tag')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="addtaskdata">Submit</button>
        <button type="button" class="btn btn-light btn-closed" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ends -->