<div class="card">
  <div class="card-header">
    <h2>{{__('Profile Picture')}}</h2>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12 col-lg-6 align-self-end">
        <div id="upload-new-profile-photo"></div>
      </div>

      <div class="col-md-12 col-lg-6 align-self-center">
        <div class="form-group row">
          <div class="col-md-12">
            <label for="profilePhoto">Select new profile photo:</label>
            <div class="custom-file p-0">
              <input id="new-profile-photo-input" type="file" class="custom-file-input" required>
              <label for="profilePhoto" id="labelCustomPhoto" class="custom-file-label" style="padding-top: 6px;">Choose photo to upload...</label>
              <span class="invalid-feedback photo-invalid-feedback" role="alert" hidden>
                  <strong></strong>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary float-right upload-new-profile-photo">Update</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
