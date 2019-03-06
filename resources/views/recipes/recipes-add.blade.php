@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card mb-2">
          <div class="card-body bg-light">
              <h1 class="text-center m-0">New Recipe</h1>
          </div>
        </div>

        <div id="progress-inputs" class="progress">
            <div class="progress-bar progress-bar-success" role="trackProgress" aria-valuenow="0" aria-valuemin="0" aria-vluemax="100" style="width:0%;">
                <span class="sr-only">0%</span>
            </div>
        </div>

        <ul class="nav nav-tabs d-none" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link addRecipeTabControl active" id="basicInfoTabControl" data-toggle="tab" href="#basic-info-tab" role="tab" aria-controls="basic-info-tab" aria-selected="true">basic-info-tab</a>
            </li>
            <li class="nav-item">
                <a class="nav-link addRecipeTabControl" id="IngredientsTabControl" data-toggle="tab" href="#ingredients-tab" role="tab" aria-controls="ingredients-tab" aria-selected="false">ingredients-tab</a>
            </li>
            <li class="nav-item">
                <a class="nav-link addRecipeTabControl" id="methodTabControl" data-toggle="tab" href="#method-tab" role="tab" aria-controls="method-tab" aria-selected="false">method-tab</a>
            </li>
            <li class="nav-item">
                <a class="nav-link addRecipeTabControl" id="imageTabControl" data-toggle="tab" href="#image-tab" role="tab" aria-controls="image-tab" aria-selected="false">image-tab</a>
            </li>
        </ul>

        {{-- Form --}}
        <form action="/recipes-store" method="post" id="addRecipeForm">
            @csrf

            {{-- Tab Content --}}
            <div class="tab-content" id="myTabContent">

                {{-- Tab One  --}}
                <div class="tab-pane fade show active" id="basic-info-tab" role="tabpanel" aria-labelledby="basicInfoTabControl">
                    <div class="card add-recipe-card" id="addRecipeStage1">
                        <div class="card-body bg-light">
                            <h3 class="mb-2">Basic Info</h3>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipe_title">Recipe Title</label>
                                        <input type="text" class="form-control trackProgress @if ($errors->has('recipe_title')) is-invalid @endif" id="recipe_title" name="recipe_title" placeholder="Recipe Title" value="{{ old('recipe_title') }}">
                                            @if ($errors->has('recipe_title'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('recipe_title') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="recipe_description">Recipe Description</label>
                                            <textarea class="form-control trackProgress @if ($errors->has('recipe_description')) is-invalid @endif" id="recipe_description" name="recipe_description" rows="6" placeholder="Recipe Description">{{ old('recipe_description') }}</textarea>
                                                @if ($errors->has('recipe_description'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('recipe_description') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="clearfix">
                                                <button type="button" class="btn btn-secondary float-left prevtab d-none">Prev</button>
                                                <button type="button" class="btn btn-secondary float-right nexttab">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End of Tab One  --}}


                        {{-- Tab Two  --}}
                        <div class="tab-pane fade" id="ingredients-tab" role="tabpanel" aria-labelledby="IngredientsTabControl">
                            <div class="card add-recipe-card " id="addRecipeStage2">
                                <div class="card-body bg-light">
                                    <h3 class="mb-2">Ingredients</h3>

                                    <div class="text-center" id="recipesIngredientBadges">
                                    </div>

                                    <select class="form-control trackProgress" name="recipe_ingredients[]" id="recipeIngredients" multiple hidden>
                                    </select>

                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <label for="ingredient_name">Ingredient</label>
                                            <select class="form-control select2" name="ingredient_name" id="ingredient_name">
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
                                            <select class="form-control select2" name="ingredient_unit" id="ingredient_unit">
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
                                            <button class="btn btn-secondary float-right mt-2" id="addInredientToSelect" type="button" style="height: calc(1.6em + 0.75rem + 2px);">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="recipe_utensils">Utensils</label>
                                                <input type="text" class="form-control trackProgress @if ($errors->has('recipe_utensils')) is-invalid @endif" id="recipe_utensils" name="recipe_utensils" placeholder="Recipe Utensils" value="{{ old('recipe_utensils') }}">
                                                    @if ($errors->has('recipe_utensils'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('recipe_utensils') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="recipe_prep_time">Recipe Prep Time</label>
                                                    <input type="time" class="form-control trackProgress @if ($errors->has('recipe_prep_time')) is-invalid @endif" id="recipe_prep_time" name="recipe_prep_time" placeholder="Recipe Prep Time" value="{{ old('recipe_prep_time') }}">
                                                        @if ($errors->has('recipe_prep_time'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('recipe_prep_time') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="recipe_cook_time">Recipe Cooking Time</label>
                                                        <input type="time" class="form-control trackProgress @if ($errors->has('recipe_cook_time')) is-invalid @endif" id="recipe_cook_time" name="recipe_cook_time" placeholder="Recipe Cooking Time" value="{{ old('recipe_cook_time') }}">
                                                            @if ($errors->has('recipe_cook_time'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('recipe_cook_time') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="clearfix">
                                                            <button type="button" class="btn btn-secondary float-left prevtab d-none">Prev</button>
                                                            <button type="button" class="btn btn-secondary float-right nexttab">Next</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End of Tab Two  --}}


                                    {{-- Tab Three --}}
                                    <div class="tab-pane fade" id="method-tab" role="tabpanel" aria-labelledby="methodTabControl">
                                        <div class="card add-recipe-card" id="addRecipeStage3">
                                            <div class="card-body bg-light">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <h3 class="mb-2">Method</h3>

                                                            <div id="recipe_steps">
                                                                <div class="entry">
                                                                    <label class="font-weight-bold stepLabel" for="recipe_step">Step 1</label>
                                                                    <div class=" input-group">
                                                                        <textarea class="form-control recipeStep" name="recipe_step[]" type="text" placeholder="Recipe Step"></textarea>
                                                                        <span class="input-group-append">
                                                                            <button class="btn btn-secondary text-white addNewRecipeStep" type="button">
                                                                                <i class="fas fa-plus-circle"></i>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="clearfix">
                                                            <button type="button" class="btn btn-secondary float-left prevtab d-none">Prev</button>
                                                            <button type="button" class="btn btn-secondary float-right nexttab">Next</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End of Tab Three --}}


                                    {{-- Tab Four --}}
                                    <div class="tab-pane fade" id="image-tab" role="tabpanel" aria-labelledby="imageTabControl">
                                        <div id="addRecipeStage4">
                                            <div class="card add-recipe-card">
                                                <div class="card-body bg-light">
                                                    <h3 class="mb-2">Image</h3>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="recipe_prep_time">Add Feature Image</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input trackProgress @if ($errors->has('recipe_feature_image')) is-invalid @endif" name="recipe_feature_image" id="validateFeatureImage">
                                                                        <label class="custom-file-label" for="validateFeatureImage">Choose file...</label>
                                                                        @if ($errors->has('recipe_feature_image'))
                                                                            <div class="invalid-feedback">
                                                                                {{ $errors->first('recipe_feature_image') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="clearfix">
                                                                    <button type="button" class="btn btn-secondary float-left prevtab d-none">Prev</button>
                                                                    <button type="button" class="btn btn-secondary float-right nexttab">Next</button>
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
                                        </div>
                                        {{-- End of Tab Four --}}

                                    </div>
                                    {{-- Tab Content --}}

                                </form>
                                {{-- Form --}}

                            </div>

                        @endsection
