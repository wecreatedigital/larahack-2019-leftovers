@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="row">
      <div class="col text-center">
        <h2 class="section-title mb-2"><span>Search</span> for recipes</h2>
        <hr class="mt-0 w-50">
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <form class="" action="index.html" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Author's name or Recipe Search...">
            <div class="input-group-append" id="button-addon4">
              <button class="btn btn-outline-primary" type="button"><i class="fas fa-plus"></i> Advanced Search</button>
              <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col text-center">
        <h5 class="mb-5">Found {{ $recipes->count() }} {{ str_plural('Recipes', $recipes->count()) }}</h5>
      </div>
    </div>

    <div class="row justify-content-center">
      @each('recipes.sections.individual-recipe-card', $recipes, 'recipe')
    </div>
  </div>

@endsection
