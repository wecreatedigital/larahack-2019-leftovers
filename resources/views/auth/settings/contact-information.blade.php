<div class="card">
  <div class="card-header">
    <h2>{{__('Contact Information')}}</h2>
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('updateContactSettings') }}" id="update-contact-settings">
      @csrf
      <div class="form-group row">
        <label for="email_address" class="col-sm-3 col-form-label required">{{__('Email')}}</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" name="email_address" id="email_address" value="{{ Auth::user()->email }}">
          <span class="invalid-feedback email_address-invalid-feedback" role="alert" hidden>
              <strong></strong>
          </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="website" class="col-sm-3 col-form-label">{{__('Website')}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="website" id="website" value="{{ Auth::user()->website }}">
          <span class="invalid-feedback website-invalid-feedback" role="alert" hidden>
              <strong></strong>
          </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="home_number" class="col-sm-3 col-form-label">{{__('Home Number')}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="home_number" id="home_number" value="{{ Auth::user()->home_number }}">
          <span class="invalid-feedback home_number-invalid-feedback" role="alert" hidden>
              <strong></strong>
          </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="mobile_number" class="col-sm-3 col-form-label">{{__('Mobile Number')}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="{{ Auth::user()->mobile_number }}">
          <span class="invalid-feedback mobile_number-invalid-feedback" role="alert" hidden>
              <strong></strong>
          </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="work_number" class="col-sm-3 col-form-label">{{__('Work Number')}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="work_number" id="work_number" value="{{ Auth::user()->work_number }}">
          <span class="invalid-feedback work_number-invalid-feedback" role="alert" hidden>
              <strong></strong>
          </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="address" class="col-sm-3 col-form-label">{{__('Address')}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="address" id="address" value="{{ Auth::user()->address }}">
          <span class="invalid-feedback address-invalid-feedback" role="alert" hidden>
              <strong></strong>
          </span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-purple float-right">{{__('Update')}}</button>
        </div>
      </div>
    </form>
  </div>
</div>
