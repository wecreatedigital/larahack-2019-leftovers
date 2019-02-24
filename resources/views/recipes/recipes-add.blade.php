@extends('layouts.app')

@section('content')
  <div class="container">




    <div class="row">
      <div class="col-md-6">
        <h1>New Recipe</h1>
      </div>
    </div>


    <form action="/recipes-store" method="post">
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



      <div class="card add-recipe-card collapse" id="addRecipeStage2">
        <div class="card-body bg-light">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="recipe_ingredients">Ingredients</label>
                <input type="text" class="form-control addRecipeStage2" id="recipe_ingredients" name="recipe_ingredients" placeholder="Recipe Ingredients">
              </div>
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
                  <label class="font-weight-bold" for="recipe_step">Step 1</label>
                  <textarea type="text" class="form-control addRecipeStage3" name="recipe_step" placeholder="Recipe Step"></textarea>
                </div>
              </div>
            </div>
          </div>

          <button type="button" class="btn btn-success text-white float-right addRecipeStep"name="button">
            <i class="fas fa-plus-circle"></i> Add Step
          </button>
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
