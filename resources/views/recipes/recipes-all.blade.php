@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="row">
      <div class="col justify-content-center">
        <h2 class="section-title text-center mb-2"><span>Search</span> for recipes</h2>
        <hr class="mt-0 w-50">

        <form class="" action="index.html" method="post">
          @csrf

          <div class="input-group mb-3">
            <input type="text" class="form-control" name="filter_name" id="filterName" placeholder="Author's name or Recipe name...">
            <div class="input-group-append" id="button-addon4">
              <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#advancedSearchModal"><i class="fas fa-plus"></i> Advanced Search</button>
              @include('recipes.modals.advanced-search-modal')
              <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>

        <div class="col text-center">
          <h5 class="mb-5">Found {{ $recipes->count() }} {{ str_plural('Recipes', $recipes->count()) }}</h5>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      @each('recipes.sections.individual-recipe-card', $recipes, 'recipe')
    </div>
  </div>

@endsection
