@extends('layouts.app')

@section('content')

  <div class="container">
    <h2 class="mb-1">{{ $recipe->title }}</h2>
    <p class="mb-2 text-primary stars">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star-half"></i>
    </p>
    <div class="position-relative">
      <img src="https://source.unsplash.com/1600x900/?recipes,food" class="img-fluid rounded" alt="">
      @if (Auth::check())
        <div class="position-absolute top-right"><div class="heart @if (AppHelper::checkLikeExists($recipe)) is-active @endif" data-recipe-slug="{{ $recipe->slug }}"></div></div>
      @endif
    </div>

      <div class="item-feature">
        <ul class="list-unstyled m-0">
          <li>
            <div class="feature-wrap rounded">
              <div class="media">
                <div class="feature-icon mr-2">
                  <i class="far fa-clock"></i>
                </div>
                <div class="media-body space-sm">
                  <div class="feature-title">Prep Time</div>
                  <div class="feature-sub-title">{{ AppHelper::timeFormat($recipe->prep_time) }} {{ str_plural('Minutes', $recipe->prep_time) }}</div>
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
                  <div class="feature-sub-title">{{ AppHelper::timeFormat($recipe->cook_time) }} {{ str_plural('Minutes', $recipe->cook_time) }}</div>
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
                  <div class="feature-sub-title">{{ $recipe->servings }} {{ str_plural('Person', $recipe->servings) }}</div>
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

      <div class="clearfix my-3">
        <div class="float-left">
          <div class="d-flex flex-row">
            <p class="mb-0 mr-2"><i class="far fa-calendar-alt"></i> {{ $recipe->created_at->diffForHumans() }}</p>
            <a href="#"><i class="fas fa-user"></i> by <span>Chris Kelker</span></a>
          </div>
        </div>
        <div class="float-right">
          <p class="mb-0"><span class="likes-count">{{ $recipe->likes_count }}</span> <span class="likes-title">{{ str_plural('Like', $recipe->likes_count) }}</span></p>
        </div>
      </div>

      <div class="row my-3">
        <div class="col">
          <p class="m-0">{{ $recipe->description }}</p>
        </div>
      </div>



      <section class="section-steps section-ingredients my-3">
          <div class="row">
            @include('recipes.sections.steps')
            @include('recipes.sections.ingredients')
          </div>
      </section>

      <section class="section-tags">
        <div class="row">
          <div class="col">
            <ul class="list-inline">
              @foreach ($recipe->tags as $tag)
                <li class="list-inline-item">
                  <a href="/recipes/tag/{{ $tag->id }}" class="btn btn-sm btn-outline-primary">{{ $tag->name }}</a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>

        <hr>
      </section>



      <section class="section-share my-3">
        <div class="d-flex justify-content-between">
          <div class="align-self-center">
            <h5 class="section-title mb-0"><span>Share</span> this recipe</h5>
          </div>
          <ul class="list-inline m-0">
            <li class="list-inline-item">
              <a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-instagram"><i class="fab fa-instagram"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-facebook"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-twitter"><i class="fab fa-twitter"></i></a>
            </li>
          </ul>
        </div>
      </section>



      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="media align-items-center">
            <img src="{{ url($recipe->user->avatar) }}" alt="Blog Author" class="rounded-circle mr-3 profile-avatar">
            <div class="media-body">

              @if (!empty($recipe->user->bio))
                <p class="mb-1">
                  {{ AppHelper::ellipsisFormat($recipe->user->bio, 100) }}
                </p>
              @endif

              <div class="blockquote-footer">
                by {{ $recipe->user->name() }}
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
