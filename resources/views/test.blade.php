@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card bg-shadow">
          <div class="position-relative">
            <img class="card-img-top" src="https://source.unsplash.com/1600x900/?recipes,food" alt="Card image cap">
            @if (Auth::check())
              <div class="position-absolute top-right"><div class="heart is-active"></div></div>
            @endif
          </div>
          <div class="card-body">
            <p class="mb-1">
              {{ AppHelper::ellipsisFormat('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias tempora laudantium ipsum, esse cumque aspernatur.', 80) }}
            </p>

            <div class="d-flex justify-content-between">
              <p class="mb-0">
                <i class="far fa-clock text-primary"></i> 00:10 Minutes
              </p>

              <p class="mb-0 stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half"></i>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
