@extends('layouts.app')

@section('content')
<div class="container">

  <div class="card">
    <div class="card-body">
      <div class="row no-gutters">
        <div class="col-md-6">

          <h3>{{__('My Profile')}}</h3>

          <div class="row no-gutters">
            <div class="col-lg-4 text-center align-self-center">
              @if( !empty(Auth::user()->avatar))
                <img src="{{ url(Auth::user()->avatar) }}" class="profile-avatar">
              @endif
            </div>
            <div class="col-lg-8 align-self-center">
              <p class="mb-1">Username: {{ AppHelper::fullname() }}</p>
              <p class="mb-1">Joined on 23/02/19</p>
              <p class="m-0">Stars</p>
            </div>
          </div>

          <a href="#">
            Reset Password
          </a>
          <a href="#">
            Edit User Details
          </a>
        </div>
        <div class="col-md-6">
          <h3>{{__('My Recipe Tags')}}</h3>
        </div>
      </div>
    </div>
  </div>

  @include('partials.messages')

  <div class="row justify-content-center">
    <!-- Tabs -->
    <div class="col-md-3 settings-tabs">
    </div>

    <!-- Tab cards -->
    <div class="col-md-9">
      <div class="tab-content">
      </div>
    </div>
  </div>
</div>

@endsection
