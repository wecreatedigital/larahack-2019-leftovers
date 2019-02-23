@if( ! $recipes->isEmpty() )
    @foreach( $recipes as $recipe )
        <div class="col-12 col-sm-4">
            <div class="card">
                <img class="card-img-top" src="https://source.unsplash.com/300x200/?burger" alt="{{{ $recipe->title }}} by {{{ $recipe->user->username }}}">
                <div class="card-body">
                    <h5 class="card-title">{{{ $recipe->title }}}</h5>
                    <p class="card-text">{{{ str_limit($recipe->description, 20) }}}</p>
                    <a href="#" class="btn btn-block btn-primary">View Recipe</a>
                </div>
                <div class="card-footer">
                    <img class="card-img-top" src="{{{ $recipe->user->avatar }}}" alt="{{{ $recipe->user->username }}}"> <a href="/profile/{{{ $recipe->user->username }}}">More by: {{{ $recipe->user->username }}}</a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p class="text-center">Sorry, no recipes found</p>
@endif
