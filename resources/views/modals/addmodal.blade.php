<!-- Modal starts -->
<div class="modal fade" id="addusermodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create User</h5>
        <button type="button" class="close btn-closed" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="adduserform" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data"
          id="adduserform">
          @csrf
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
              value="{{ old('name') }}" id="input-name" placeholder="Username" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" id="input-email" required autocomplete="email" placeholder="Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control  form-control-lg @error('password') is-invalid @enderror"
              name="password" id="input-password" required placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="tel" onkeyup="javascript: this.value = this.value.replace(/[^0-9]/g,'');" maxlength="10" class="form-control form-control-lg @error('phone') is-invalid @enderror"
              name="phone" id="input-phone" required placeholder="Phone">
            @error('phone')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <div class="input-group">
                <input type="file" class="dropify" name="image" id="exampleInputFiles">
            </div>
            <div id="preview"></div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="adddata">Submit</button>
            <button type="button" class="btn btn-light btn-closed" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ends -->