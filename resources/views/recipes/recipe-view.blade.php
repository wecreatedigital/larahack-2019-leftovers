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
      @if (Auth::check())
        <div class="position-absolute top-right"><div class="heart" data-recipe-slug="{{ $recipe->slug }}"></div></div>
      @endif
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
        <p><span class="likes-count">{{ $recipe->likes_count }}</span> <span class="likes-title">{{ str_plural('Like', $recipe->likes_count) }}</span></p>
      </div>
    </div>

    <div class="row no-gutters">
      <div class="col-md-6 col-12">
        <p class="mr-2">{{ $recipe->description }}</p>
      </div>
      <div class="col-md-6 col-12">
        <div class="ingredients-section bg-grey-ish rounded">
            <h4 class="item-title mb-4"><i class="fas fa-list-ul mr-2"></i>Ingredients</h4>
            <ul class="list-group rounded bg-shadow mb-1">
              @foreach ($recipe->ingredients as $ingredient)
                <li class="list-group-item">
                  {{ $ingredient->ingredient_title }}
                </li>
              @endforeach
            </ul>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="media align-items-center">
          <img src="{{ url($recipe->user->avatar) }}" alt="Blog Author" class="rounded-circle mr-3 profile-avatar">
          <div class="media-body">
            @if (!empty($recipe->user->bio))
              <p class="mb-1">
                {{ AppHelper::ellipsisFormat($recipe->user->bio, 200) }}
              </p>
            @endif

            <div class="blockquote-footer">
              Written by {{ $recipe->user->name() }}
            </div>
              <ul class="author-social list-unstyled list-inline m-0">
                <li class="list-inline-item">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="#"><i class="fab fa-skype"></i></a>
                </li>
              </ul>
            </div>
          </div>
      </div>
    </div>
    </div>

  @endsection
