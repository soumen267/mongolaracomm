<!-- Modal starts -->
<div class="modal fade" id="useremail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel-2">Send Email</h5>
        <button type="button" class="close btn-closed" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('user.send') }}" method="post" id="useremailForm" enctype="multipart/form-data">
          @csrf
          <input id="emailuserid" type="hidden" name="emailuserid" value="">
          <div class="form-group">
            <label class="">To</label>
              <input id="toname" type="text" class="form-control form-control-lg @error('toname') is-invalid @enderror"
                name="toname" required>
              @error('toname')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
           </div>
           <div class="form-group">
            <label class="">From</label>
              <input id="form" type="text" class="form-control form-control-lg @error('form') is-invalid @enderror"
                name="form" required>
              @error('form')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
           </div>
          <div class="form-group">
            <label class="">Subject</label>
              <input id="subject" type="text" class="form-control  form-control-lg @error('subject') is-invalid @enderror"
                name="subject" required>
              @error('subject')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
          <div class="form-group">
            <label class="">Body</label>
            <textarea id="summernote" class="form-control form-control-lg @error('body') is-invalid @enderror"
            name="body" required>
          </textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success sendMail">Submit</button>
            <button type="button" class="btn btn-light btn-closed" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>      
    </div>
  </div>
</div>
  <!-- Modal Ends -->