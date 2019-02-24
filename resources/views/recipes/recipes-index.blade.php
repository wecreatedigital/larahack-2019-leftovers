@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card bg-transparent">
      <div class="card-body">

        <div class="d-flex justify-content-between mb-3">
          <h1 class="m-0">My Recipes</h1>
          <a href="{{url('add-recipe')}}" class="btn btn-primary align-self-center">
            New Recipe
          </a>
        </div>


        <div class="row">
          @if( ! $recipes->isEmpty() )
              @foreach( $recipes as $recipe )
                  <div class="col-md-6 col-lg-4">
                      <div class="card">
                          <a href="{{{ $recipe->getSlug() }}}">
                              <img class="card-img-top" src="https://source.unsplash.com/300x200/?burger" alt="{{{ $recipe->title }}} by {{{ $recipe->user->username }}}">
                          </a>
                          <div class="card-body p-4">
                              <h5 class="card-title">{{{ $recipe->title }}}</h5>
                              <p class="mb-0 stars">
                                @php ( $ratings = $recipe->rating() )
                                @while ( $ratings > 0 )
                                  <i class="fas fa-star"></i>
                                  @php( $ratings-- )
                                @endwhile
                              </p>
                              <a href="{{{ $recipe->getSlug() }}}" class="btn btn-block btn-secondary">View Recipe</a>
                          </div>
                          <div class="card-footer pl-4 pr-4 pb-4">
                              <img class="rounded-circle" width="40" src="{{{ url($recipe->user->avatar) }}}" alt="{{{ $recipe->user->username }}}">
                          </div>
                      </div>
                  </div>
              @endforeach
          @else
              <p class="text-center w-100">Sorry, no recipes found</p>
          @endif
        </div>

              {{-- <td><a href="{{url('recipe/'.$recipe->id.'/view')}}"><button class="btn btn-info">View</button></a></td>
              <td><a href="{{url('recipe/'.$recipe->id.'/edit')}}"><button class="btn btn-warning">Edit</button></a></td>
              <td><a href="{{url('recipe/'.$recipe->id.'/delete')}}"><button class="btn btn-danger">Delete</button></a></td> --}}
      </div>
    </div>
  </div>
@endsection
