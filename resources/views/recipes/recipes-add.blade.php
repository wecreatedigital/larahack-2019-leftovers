@extends('layouts.app')

@section('content')
  <div class="container">




    <div class="row">
      <div class="col-md-6">
        <h1>New Recipe</h1>
      </div>
    </div>


    <form action="/recipes-store" class="postNewRecipe" method="post">
      @csrf

      <div class="card add-recipe-card" id="addRecipeStage1">
        <div class="card-body bg-light">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="recipe_title">Recipe Title</label>
                <input type="text" class="form-control addRecipeStage1" id="recipe_title" name="recipe_title" placeholder="Recipe Title">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="recipe_description">Recipe Description</label>
                <textarea class="form-control addRecipeStage1" id="recipe_description" name="recipe_description" rows="6" placeholder="Recipe Description"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <a class="btn btn-primary collapse btn-lg my-3 float-right" data-toggle="collapse" href="#addRecipeStage2" id="addRecipeStage2Control">
            Next
          </a>
        </div>
      </div>



      <div class="card add-recipe-card " id="addRecipeStage2">
        <div class="card-body bg-light">
          <h3 class="mb-2">Ingredients</h3>

          <div class="text-center" id="recipesIngredientBadges">
            <button type="button" class="btn btn-sm btn-primary mx-1 removeRecipeIngredient" data-recipe-ingredient="Abalone|12|teaspoon">Abalone 12 teaspoon <i class="fas fa-times"></i></button>
            <button type="button" class="btn btn-sm btn-primary mx-1 removeRecipeIngredient" data-recipe-ingredient="Abalone|12|teaspoon">Abalone 12 teaspoon <i class="fas fa-times"></i></button>
          </div>

          <select class="form-control" name="recipe_ingredients[]" id="recipeIngredients" multiple hidden>
          </select>

          <div class="form-row">
            <div class="col-md-4">
              <label for="ingredient_name">Ingredient</label>
              <select class="form-control addRecipeSelect2" name="ingredient_name" id="ingredient_name">
                @foreach($ingredients as $ingredient)
                  <option value="{{{ $ingredient->id }}}">{{{ $ingredient->value }}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label for="ingredient_amount">Amount</label>
              <input type="number" class="form-control" name="ingredient_amount" id="ingredient_amount">
            </div>
            <div class="col-md-4">
              <label for="ingredient_unit">Unit</label>
              <select class="form-control addRecipeSelect2" name="ingredient_unit" id="ingredient_unit">
                @foreach(AppHelper::unitTypes() as $type => $units)
                  <optgroup label="{{ $type }}">
                    @foreach($units as $unit)
                      <option value="{{ $unit }}">{{ $unit }}</option>
                    @endforeach
                  </optgroup>
                @endforeach
              </select>
            </div>

            <div class="col-md-1 mt-auto">
              <button class="btn btn-success float-right mt-2" id="addInredientToSelect" type="button" style="height: calc(1.6em + 0.75rem + 2px);">
                <i class="fas fa-plus-circle"></i>
              </button>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="recipe_utensils">Utensils</label>
                <input type="text" class="form-control addRecipeStage2" id="recipe_utensils" name="recipe_utensils" placeholder="Recipe Utensils">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="recipe_prep_time">Recipe Prep Time</label>
                <input type="time" class="form-control addRecipeStage2" id="recipe_prep_time" name="recipe_prep_time" placeholder="Recipe Prep Time">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="recipe_cook_time">Recipe Cooking Time</label>
                <input type="time" class="form-control addRecipeStage2" id="recipe_cook_time" name="recipe_cook_time" placeholder="Recipe Cooking Time">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <a class="btn btn-primary collapse btn-lg my-3 float-right" data-toggle="collapse" href="#addRecipeStage3" id="addRecipeStage3Control">
            Next
          </a>
        </div>
      </div>

      <div class="card add-recipe-card collapse" id="addRecipeStage3">
        <div class="card-body bg-light">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <h3 class="mb-2">Method</h3>

                <div id="recipe_steps">
                  <div class="entry">
                    <label class="font-weight-bold stepLabel" for="recipe_step">Step 1</label>
                    <div class=" input-group">
                      <textarea class="form-control addRecipeStage3" name="recipe_step[]" type="text" placeholder="Recipe Step"></textarea>
                      <span class="input-group-append">
                        <button class="btn btn-success text-white btn-add" type="button">
                          <i class="fas fa-plus-circle"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <a class="btn btn-primary collapse btn-lg my-3 float-right" data-toggle="collapse" href="#addRecipeStage4" id="addRecipeStage4Control">
            Next
          </a>
        </div>
      </div>

      <div class="collapse" id="addRecipeStage4">
        <div class="card add-recipe-card">
          <div class="card-body bg-light">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="recipe_prep_time">Add Video</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="recipe_video" id="validateVideoFile">
                    <label class="custom-file-label" for="validateVideoFile">Choose file...</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="recipe_prep_time">Add Feature Image</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="recipe_feature_image" id="validateFeatureImage">
                    <label class="custom-file-label" for="validateFeatureImage">Choose file...</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card border-0 bg-transparent">
          <div class="card-body">
            <div class="row text-center">
              <div class="col">
                <button type="submit" class="btn btn-primary btn-lg">Submit Recipe</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- {{ dd(AppHelper::unitTypes()->mass_and_weight) }} --}}

    </form>
  </div>
</div>
</div>

@endsection
