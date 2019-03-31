<div class="col-lg-4 col-12 mb-4">
  <div class="card card-recipe bg-shadow">
    <div class="position-relative">
      <a href="{{ $recipe->path() }}">
        <img class="card-img-top" src="https://source.unsplash.com/1600x900/?recipes,food" alt="Card image cap">
      </a>
      @if (Auth::check())
        <div class="position-absolute top-right"><div class="heart @if (AppHelper::checkLikeExists($recipe)) is-active @endif" data-recipe-slug="{{ $recipe->slug }}"></div></div>
      @endif
    </div>
    <div class="card-body">
      <p class="mb-1">
        {{ AppHelper::ellipsisFormat($recipe->title, 80) }}
      </p>

      <div class="d-flex justify-content-between">
        <p class="mb-0">
          <i class="far fa-clock text-primary"></i> {{ AppHelper::timeFormat($recipe->cook_time) }} {{ str_plural('Minutes', $recipe->cook_time) }}
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
