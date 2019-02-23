<div class="card">
  <div class="card-header">
    <h2>{{__('Profile Information')}}</h2>
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('updateProfileSettings') }}" id="update-profile-settings">
      @csrf
      <div class="form-group row">
        <label for="username" class="col-sm-3 col-form-label required">{{__('Username')}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="username" id="username" value="{{ Auth::user()->username }}">
              <span class="invalid-feedback username-invalid-feedback" role="alert" hidden>
                  <strong></strong>
              </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="nickname" class="col-sm-3 col-form-label">{{__('Nickname')}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="nickname" id="nickname" value="{{ Auth::user()->nickname }}">
              <span class="invalid-feedback nickname-invalid-feedback" role="alert" hidden>
                  <strong></strong>
              </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="bio" class="col-sm-3 col-form-label">{{__('Bio')}}</label>
        <div class="col-sm-9">
          <textarea class="form-control" name="bio" id="bio">{{ Auth::user()->bio }}</textarea>
              <span class="invalid-feedback bio-invalid-feedback" role="alert" hidden>
                  <strong></strong>
              </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="company" class="col-sm-3 col-form-label">{{__('Company')}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="company" id="company" value="{{ Auth::user()->company }}">
              <span class="invalid-feedback company-invalid-feedback" role="alert" hidden>
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

  <!-- facebook
  instagram
  twitter
  linkedin -->
