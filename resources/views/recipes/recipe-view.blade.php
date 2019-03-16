@extends('layouts.app')

@section('content')
  <div class="container">
    <h2 class="mb-1">{{ $recipe->title }}</h2>
    <p class="mb-2 stars">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star-half"></i>
    </p>
    <div class="position-relative">
      <img src="https://source.unsplash.com/1600x900/?recipes,food" class="img-fluid rounded" alt="">
      <div class="position-absolute top-right"><div class="heart" data-recipe-slug="{{ $recipe->slug }}"></div></div>
    </div>

    <div class="item-feature">
      <ul class="list-unstyled">
        <li>
          <div class="feature-wrap rounded">
            <div class="media">
              <div class="feature-icon mr-2">
                <i class="far fa-clock"></i>
              </div>
              <div class="media-body space-sm">
                <div class="feature-title">Prep Time</div>
                <div class="feature-sub-title">45 Mins</div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="feature-wrap rounded">
            <div class="media">
              <div class="feature-icon mr-2">
                <i class="fas fa-utensils"></i>
              </div>
              <div class="media-body space-sm">
                <div class="feature-title">Cook Time</div>
                <div class="feature-sub-title">45 Mins</div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="feature-wrap rounded">
            <div class="media">
              <div class="feature-icon mr-2">
                <i class="fas fa-users"></i>
              </div>
              <div class="media-body space-sm">
                <div class="feature-title">Servings</div>
                <div class="feature-sub-title">10 People</div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="feature-wrap rounded">
            <div class="media">
              <div class="feature-icon mr-2">
                <i class="far fa-eye"></i>
              </div>
              <div class="media-body space-sm">
                <div class="feature-title">Views</div>
                <div class="feature-sub-title">3,450</div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>

    <div class="clearfix">
      <div class="float-left">
        <div class="d-flex flex-row">
          <p class="mb-0 mr-2"><i class="far fa-calendar-alt"></i> {{ $recipe->created_at->diffForHumans() }}</p>
          <a href="#"><i class="fas fa-user"></i> by <span>Chris Kelker</span></a>
        </div>
      </div>
      <div class="float-right">
        <p><span class="likes-count">1</span> <span class="likes-title">{{ str_plural('Like', 1) }}</span></p>
      </div>
    </div>

  @endsection
