<div class="col-lg-4 col-12 mb-4">
  <div class="card card-recipe card-bounce card-hover bg-shadow">
    <div class="position-relative">
      <a href="{{ $recipe->path() }}">
        <img class="card-img-top" src="https://source.unsplash.com/1600x900/?recipes,food" alt="Card image cap">
      </a>
      @if (Auth::check())
        <div class="position-absolute heart-amount">
          <button class="btn btm-sm btn-light" type="button" name="button">
            <i class="fas fa-heart text-red"></i> {{ $recipe->likes_count }}
          </button>
        </div>
      @endif


      @if( !empty($recipe->user->avatar))
        <div class="position-absolute user-avatar">
            <a href="#" class="view-user">
              <div class="d-flex align-items-center flex-row">
                <img src="{{ url($recipe->user->avatar) }}" class="dropdown-toggle-avatar">
                <p class="mb-0 ml-2 text-white">{{ $recipe->user->at_username }}</p>
              </div>
            </a>
        </div>
      @endif

      <div class="position-absolute download-button">
        <button class="btn btn-social btn-light text-dark d-flex justify-content-center align-items-center m-0" type="button" name="button" data-toggle="tooltip" data-placement="top" title="Click to download!">
          <i class="fas fa-download"></i>
        </button>
      </div>


    </div>
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <p class="m-0">
          {{ AppHelper::ellipsisFormat($recipe->title, 80) }}
        </p>

        <p class="mb-0 text-primary stars">
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
