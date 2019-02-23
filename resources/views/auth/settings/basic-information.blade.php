<div class="card">
  <div class="card-header">
    <h2>{{__('Basic Information')}}</h2>
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('updateBasicSettings') }}" id="update-basic-settings">
      @csrf
      <div class="form-group row">
        <label for="settings_firstname" class="col-sm-3 col-form-label required">{{__('Firstname')}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="settings_firstname" id="settings_firstname" value="{{ Auth::user()->firstname }}">
              <span class="invalid-feedback firstname-invalid-feedback" role="alert" hidden>
                  <strong></strong>
              </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="settings_lastname" class="col-sm-3 col-form-label required">{{__('Lastname')}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="settings_lastname" id="settings_lastname" value="{{ Auth::user()->lastname }}">
              <span class="invalid-feedback lastname-invalid-feedback" role="alert" hidden>
                  <strong></strong>
              </span>
        </div>
      </div>
      <div class="form-group row">
        <label for="gender" class="col-sm-3 col-form-label">{{__('Gender')}}</label>
        <div class="col-sm-9">

          <div class="justify-content-center align-self-center">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="genderRadio1" value="Male" @if (Auth::user()->gender === 'Male') checked @endif>
              <label class="form-check-label" for="genderRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="genderRadio2" value="Female" @if (Auth::user()->gender === 'Female') checked @endif>
              <label class="form-check-label" for="genderRadio2">Female</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="genderRadio3" value="Other" @if (Auth::user()->gender === 'Other') checked @endif>
              <label class="form-check-label" for="genderRadio3">Other</label>
            </div>
          </div>

          <span class="invalid-feedback gender-invalid-feedback" role="alert" hidden>
              <strong></strong>
          </span>

        </div>
      </div>
      <div class="form-group row">
        <label for="dob" class="col-sm-3 col-form-label">{{__('Date of birth')}}</label>
        <div class="col-sm-9">

          @if(!empty(Auth::user()->dob))
            <input type="date" class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" id="dob" data-date-format="DD MMMM YYYY" value="{{ date('Y-m-d', strtotime(Auth::user()->dob)) }}">
          @else
            <input type="date" class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" id="dob" data-date-format="DD MMMM YYYY" value="">
          @endif

          <span class="invalid-feedback dob-invalid-feedback" role="alert" hidden>
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
