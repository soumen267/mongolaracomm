<!-- Modal starts -->
<div class="modal fade" id="addproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create Project</h5>
          <button type="button" class="close btn-closed" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="formerrors"></div>
        <div class="modal-body">
          <form action="{{ route('project.store') }}" method="post" id="addprojectform">
            @csrf
            <div class="form-group row">
              <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Title</label>
              <div class="col-sm-12 col-lg-10">
              <input type="text" id="title" class="form-control form-control-lg @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Project Title">
              @error('title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Client</label>
                <div class="col-sm-12 col-lg-10">
                <input type="text" id="client" class="form-control form-control-lg @error('client') is-invalid @enderror" name="client" value="{{ old('client') }}" required autocomplete="client" autofocus placeholder="Client Name">
                @error('client')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Startdate</label>
                <div class="col-sm-12 col-lg-10">
                <input type="date" id="startdate" class="form-control form-control-lg @error('startdate') is-invalid @enderror" name="startdate" value="{{ old('startdate') }}" required autocomplete="startdate" autofocus placeholder="Start Date" id="startdate">
                @error('startdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Duedate</label>
                <div class="col-sm-12 col-lg-10">
                <input type="date" id="duedate" class="form-control form-control-lg @error('duedate') is-invalid @enderror" name="duedate" value="{{ old('duedate') }}" required autocomplete="duedate" autofocus placeholder="Due Date" id="enddate">
                @error('duedate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Tag</label>
                <div class="col-sm-12 col-lg-10">
                <input type="text" id="tag" class="form-control form-control-lg @error('tag') is-invalid @enderror" name="tag" value="{{ old('tag') }}" required autocomplete="tag" autofocus placeholder="Tag" data-role="tagsinput">
                @error('tag')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Progress</label>
                <div class="col-sm-12 col-lg-10">
                <input type="text" id="progress" class="form-control form-control-lg @error('progress') is-invalid @enderror" name="progress" value="{{ old('progress') }}" required autocomplete="progress" autofocus placeholder="Progress">
                @error('progress')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="addprojectdata">Submit</button>
          <button type="button" class="btn btn-light btn-closed" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Ends -->