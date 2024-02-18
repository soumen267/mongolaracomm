<!-- Modal starts -->
<div class="modal fade" id="editproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Project</h5>
          <button type="button" class="close btn-closed" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('project.update') }}" method="post" id="editprojectform">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input id="userid" type="hidden" name="userid" value="">
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control form-control-lg title @error('title') is-invalid @enderror" name="title" required autocomplete="title" id="title" autofocus placeholder="Project Title">
              @error('title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
                <label>Client</label>
                <input type="text" class="form-control form-control-lg client @error('client') is-invalid @enderror" name="client" required autocomplete="client" id="client" autofocus placeholder="Client Name">
                @error('client')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Startdate</label>
                <input type="date" class="form-control form-control-lg startdate @error('startdate') is-invalid @enderror" name="startdate" required autocomplete="startdate" id="startdate" autofocus placeholder="Start Date">
                @error('startdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Duedate</label>
                <input type="date" class="form-control form-control-lg duedate @error('duedate') is-invalid @enderror" name="duedate" required autocomplete="duedate" id="duedate" autofocus placeholder="Due Date">
                @error('duedate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Tag</label>
                <input type="text" class="form-control form-control-lg tag @error('tag') is-invalid @enderror" name="tag" id="tag" required autocomplete="tag" autofocus placeholder="Tag">
                @error('tag')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Progress</label>
                <input type="text" class="form-control form-control-lg progress @error('progress') is-invalid @enderror" name="progress" required autocomplete="progress" id="progress" autofocus placeholder="Progress">
                @error('progress')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="editprojectdata">Submit</button>
          <button type="button" class="btn btn-light btn-closed" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Ends -->