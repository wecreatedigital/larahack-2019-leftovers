@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>New Recipe</h1>
            </div>
        </div>

        <div class="clearfix py-5">
            <button class="btn btn-primary float-left prevtab">Prev</button>
            <button class="btn btn-danger float-right nexttab">Next</button>
        </div>

        <div id="progress-inputs" class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-vluemax="100" style="width:0%;">
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
                </div>
                {{-- End of Tab One  --}}


                {{-- Tab Two  --}}
                <div class="tab-pane fade" id="ingredients-tab" role="tabpanel" aria-labelledby="IngredientsTabControl">
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
                </div>
                {{-- End of Tab Three --}}


                {{-- Tab Four --}}
                <div class="tab-pane fade" id="image-tab" role="tabpanel" aria-labelledby="imageTabControl">
                    <div id="addRecipeStage4">
                        <div class="card add-recipe-card">
                            <div class="card-body bg-light">
                                <h3 class="mb-2">Image</h3>

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
                </div>
                {{-- End of Tab Four --}}

            </div>
            {{-- Tab Content --}}

        </form>
        {{-- Form --}}

    </div>

@endsection
