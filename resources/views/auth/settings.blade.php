@extends('layouts.app')


@section('script')
<script type="text/javascript">
$(document).ready(function () {
 $('.nav-tabs a[href="#{{ old('tab') }}"]').tab('show');
 });
</script>
@endsection

@section('content')
<div class="container">
  <h1 class="nav-heading">
    {{__('Profile Settings')}}
  </h1>

  @include('partials.messages')

  <div class="row justify-content-center">
    <!-- Tabs -->
    <div class="col-md-3 settings-tabs">
      <aside>
        <ul class="nav nav-tabs flex-column mb-4">
          <li class="nav-item">
            <a class="list-group-item list-group-item-action active" href="#profile-information" aria-controls="profile-information" role="tab" data-toggle="tab">
              <i class="fas fa-user"></i> {{__('Profile Info')}}
            </a>
          </li>

          <li class="nav-item">
            <a class="list-group-item list-group-item-action" href="#basic-information" aria-controls="basic-information" role="tab" data-toggle="tab">
              <i class="fas fa-info-circle"></i> {{__('Basic Info')}}
            </a>
          </li>

          <li class="nav-item">
            <a class="list-group-item list-group-item-action" href="#contact-information" aria-controls="contact-information" role="tab" data-toggle="tab">
              <i class="fas fa-info-circle"></i> {{__('Contact Info')}}
            </a>
          </li>

          <li class="nav-item">
            <a class="list-group-item list-group-item-action" href="#security-information" aria-controls="security-information" role="tab" data-toggle="tab">
              <i class="fas fa-lock"></i> {{__('Security')}}
            </a>
          </li>

          <li class="nav-item">
            <a class="list-group-item list-group-item-action" href="#avatar-photo" aria-controls="avatar-photo" role="tab" data-toggle="tab">
              <i class="fas fa-user-circle"></i> {{__('Avatar photo')}}
            </a>
          </li>
        </ul>
      </aside>
    </div>

    <!-- Tab cards -->
    <div class="col-md-9">
      <div class="tab-content">

        <!-- profile-information -->
        <div role="tabcard" class="tab-pane active" id="profile-information">
          @include('auth.settings.profile-information')
        </div>

        <!-- basic-information -->
        <div role="tabcard" class="tab-pane" id="basic-information">
          @include('auth.settings.basic-information')
        </div>

        <!-- contact-information -->
        <div role="tabcard" class="tab-pane" id="contact-information">
          @include('auth.settings.contact-information')
        </div>

        <!-- security-information -->
        <div role="tabcard" class="tab-pane" id="security-information">
          @include('auth.settings.security-information')
        </div>

        <!-- avatar-photo -->
        <div role="tabcard" class="tab-pane" id="avatar-photo">
          @include('auth.settings.avatar-photo')
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
