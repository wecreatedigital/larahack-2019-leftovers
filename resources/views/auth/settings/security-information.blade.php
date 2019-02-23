<div class="card">
  <div class="card-header">
    <h2>{{__('Security Information')}}</h2>
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('updateSecuritySettings') }}" id="update-security-settings">
      @csrf
      <div class="form-group row">
        <label for="current_password" class="col-sm-3 col-form-label required">{{__('Current Password')}}</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="current_password" id="current_password">
          <span class="invalid-feedback current_password-invalid-feedback" role="alert" hidden>
              <strong></strong>
          </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="new_password" class="col-sm-3 col-form-label required">{{__('New Password')}}</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="new_password" id="new_password">
          <span class="invalid-feedback new_password-invalid-feedback" role="alert" hidden>
              <strong></strong>
          </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="confirm_password" class="col-sm-3 col-form-label required">{{__('Confirm New Password')}}</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="confirm_password" id="confirm_password">
          <span class="invalid-feedback confirm_password-invalid-feedback" role="alert" hidden>
              <strong></strong>
          </span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary float-right">{{__('Update')}}</button>
        </div>
      </div>
    </form>
  </div>
</div>
