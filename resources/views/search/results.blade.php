@if( ! $recipes->isEmpty() )
    @foreach( $recipes as $recipe )
        <div class="col-12 col-sm-4">
            <div class="card">
                <a href="{{{ $recipe->getSlug() }}}">
                    <img class="card-img-top" src="https://source.unsplash.com/300x200/?burger" alt="{{{ $recipe->title }}} by {{{ $recipe->user->username }}}">
                </a>
                <div class="card-body p-4">
                    <h5 class="card-title">{{{ $recipe->title }}}</h5>
                    <p class="stars">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half"></i>
                    </p>
                    <a href="{{{ $recipe->getSlug() }}}" class="btn btn-block btn-secondary">View Recipe</a>
                </div>
                <div class="card-footer pl-4 pr-4 pb-4">
                    <img class="rounded-circle" width="40" src="{{{ url($recipe->user->avatar) }}}" alt="{{{ $recipe->user->username }}}">
                    <a class="ml-2" href="/profile/{{{ $recipe->user->username }}}">More by: {{{ $recipe->user->username }}}</a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p class="text-center w-100">Sorry, no recipes found</p>
@endif
