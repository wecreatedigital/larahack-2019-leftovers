@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="card mb-3">
      <div class="card-body">
        <div class="row no-gutters">
          <div class="col-md-6">

            <h3 class="mb-2">{{__('My Profile')}}</h3>

            <div class="row no-gutters mb-4">
              <div class="col-lg-4 align-self-center">
                @if( !empty(Auth::user()->avatar))
                  <img src="{{ url(Auth::user()->avatar) }}" class="profile-avatar">
                @endif
              </div>
              <div class="col-lg-8 align-self-center">
                <p class="mb-1">Username: {{ AppHelper::fullname() }}</p>
                <p class="mb-1">Joined on: {{ AppHelper::dateFormat(Auth::user()->created_at) }}</p>
                <p class="mb-0 stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half"></i>
                </p>
              </div>
            </div>

            <ul class="list-unstyled">
              <li>
                <a href="#">
                  Reset Password
                </a>
              </li>
              <li>
                <a href="/settings">
                  Edit User Details
                </a>
              </li>
            </ul>

          </div>
          <div class="col-md-6">
            <h3 class="mb-2">{{__('My Recipe Tags')}}</h3>

            @if ( count( Auth::user()->allRecipeTags() ) > 0 )
              @foreach (Auth::user()->allRecipeTags() as $key => $tag)
                <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
              @endforeach
            @endif

            <ul class="list-unstyled mt-3">
              <li>
                <a href="/add-tag">
                  Add recipe tags
                </a>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>

    @include('partials.messages')

    <div class="row justify-content-center">

      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-body">

            <h3>{{__('My Recipes')}}</h3>
            @if ( count(Auth::user()->recipes) > 0 )
              @foreach (Auth::user()->recipes->take(3) as $key => $recipe)
                <div class="row no-gutters mb-3">
                  <div class="col-sm-4 mr-3">
                    <img class="img-fluid" src="https://source.unsplash.com/random/120x80">
                  </div>
                  <div class="col-sm-8 my-auto">
                    <ul class="list-unstyled m-0">
                      <li>
                        <a href="/view/recipe/{{ $recipe->id }}">
                          {{ $recipe->title }}
                        </a>
                      </li>
                      <li>
                        <p class="mb-0 stars">
                          @php ( $ratings = $recipe->rating() )
                          @while ( $ratings > 0 )
                            <i class="fas fa-star"></i>
                            @php( $ratings-- )
                          @endwhile
                        </p>
                      </li>
                    </ul>
                  </div>
                </div>
              @endforeach
            @endif

            <a href="add-recipe">
              <button type="button" class="btn btn-primary btn-block" name="button">Add a Recipe</button>
            </a>

          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-body">
            <h3>{{__('Recipes I like')}}</h3>
            @if ( count(Auth::user()->favourites) > 0 )
              @foreach (Auth::user()->favourites->take(3) as $key => $recipe)
                <div class="row no-gutters">
                  <div class="col-lg-4">
                  </div>
                  <div class="col-lg-8">
                    <ul class="list-unstyled">
                      <li>
                        <a href="/view/recipe/{{ $recipe->id }}">
                          {{ $recipe->title }}
                        </a>
                      </li>
                      <li>
                        <p class="mb-0 stars">
                          @php ( $ratings = $recipe->rating() )
                          @while ( $ratings > 0 )
                            <i class="fas fa-star"></i>
                            @php( $ratings-- )
                          @endwhile
                        </p>
                      </li>
                    </ul>
                  </div>
                </div>
              @endforeach
            @endif

            <a href="#">
              <button type="button" class="btn btn-primary btn-block" name="button">Find Recipes</button>
            </a>

          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-body">

            <h3>{{__('My Top Rated')}}</h3>
            @if ( count(Auth::user()->recipes) > 0 )
              @foreach (Auth::user()->recipes->take(3) as $key => $recipe)
                <div class="row no-gutters">
                  <div class="col-lg-4">
                  </div>
                  <div class="col-lg-8">
                    <ul class="list-unstyled">
                      <li>
                        <a href="/view/recipe/{{ $recipe->id }}">
                          {{ $recipe->title }}
                        </a>
                      </li>
                      <li>
                        <p class="mb-0 stars">
                          @php ( $ratings = $recipe->rating() )
                          @while ( $ratings > 0 )
                            <i class="fas fa-star"></i>
                            @php( $ratings-- )
                          @endwhile
                        </p>
                      </li>
                    </ul>
                  </div>
                </div>
              @endforeach
            @endif

            <a href="#">
              <button type="button" class="btn btn-primary btn-block" name="button">View Top Rated</button>
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
