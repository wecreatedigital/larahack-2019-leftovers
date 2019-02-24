@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-body">

        {{-- {{ dd(AppHelper::unitTypes()->mass_and_weight) }} --}}

        <div class="row">
          <div class="col-md-6">
            <h1>New Recipe</h1>
          </div>
        </div>
        <form action="/recipes-store" method="post">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="recipe_title">Recipe Title</label>
                <input type="text" class="form-control" id="recipe_title" name="recipe_title" placeholder="Recipe Title">
              </div>

              <div class="form-group">
                <label for="recipe_servings">Servings</label>
                <input type="text" class="form-control" id="recipe_servings" name="recipe_servings" placeholder="Servings">
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="recipe_prep_time">Recipe Prep Time</label>
                    <input type="time" class="form-control" id="recipe_prep_time" name="recipe_prep_time" placeholder="Recipe Prep Time">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="recipe_cook_time">Recipe Cooking Time</label>
                    <input type="time" class="form-control" id="recipe_cook_time" name="recipe_cook_time" placeholder="Recipe Cooking Time">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="recipe_description">Recipe Description</label>
                <textarea class="form-control" id="recipe_description" name="recipe_description" rows="6" placeholder="Recipe Description"></textarea>
              </div>

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="recipe_difficulty" id="recipeDifficulty1" value="Beginner">
                      <label class="form-check-label" for="recipe_difficulty">
                        Beginner
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="recipe_difficulty" id="recipeDifficulty2" value="Intermediate" checked>
                      <label class="form-check-label" for="recipe_difficulty">
                        Intermediate
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="recipe_difficulty" id="recipeDifficulty3" value="Advanced">
                      <label class="form-check-label" for="recipe_difficulty">
                        Advanced
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary btn-sm float-right">Add Recipe</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
