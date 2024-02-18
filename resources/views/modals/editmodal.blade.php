<!-- Modal starts -->
<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel-2">Edit User</h5>
          <button type="button" class="close btn-closed" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" id="updateform" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input id="userid" type="hidden" name="userid" value="">
            <div class="form-group row">
              <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Name</label>
              <div class="col-sm-12 col-lg-10">
              <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" required placeholder="Name" value="">
              @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-lg-2 text-left control-label col-form-label">Email</label>
              <div class="col-sm-12 col-lg-10">
              <input id="email" type="email" class="form-control  form-control-lg @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus placeholder="Email">
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Image</label>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image" id="exampleInputFiles">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
              </div>
              <div id="preview"></div>
            </div>
            {{-- <div class="form-group">
              <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" value="">
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div> --}}
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success editUser">Submit</button>
          <button type="button" class="btn btn-light btn-closed" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Ends -->