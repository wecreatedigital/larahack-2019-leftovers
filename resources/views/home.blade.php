@extends('layouts.app')

@section('content')
<div class="container-fluid bg-image bg-full from-top" style="background-image: url('/images/background1.jpeg');">
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-8">
            <div class="card transparent">
                <h1 class="home-title">Find Recipes</h1>
                <p class="text-center font-italic">Let us help you find a recipe with what you have leftover.</p>
                <div class="card-body">
                    <form class="form-inline row" action="/search/results" method="get">
                      <div class="col-12 input-group">
                        <label for="ingredients" class="sr-only">Ingredients</label>
                        <select name="ingredients[]" multiple="multiple" class="form-control-plaintext tags-ingredients" id="ingredients">
                            <option>Search ingredients in your cupboard...</option>
                            @foreach($ingredients as $ingredient)
                                <option value="{{{ $ingredient->id }}}">{{{ $ingredient->value }}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary ml-3">Find receipes</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="popular-recipes-section">
  <div class="container my-5 py-5">
    <div class="row mb-5">
      <div class="col text-center">
        <h2 class="section-title mb-3"><span>Most Popular</span> Recipes</h2>
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      </div>
    </div>

    <div class="row justify-content-center">
      @each('recipes.sections.individual-recipe-card', $popular_recipes, 'recipe')
    </div>
  </div>
</section>





<section class="content-section">
  <div class="container">
     <div class="row">
       <div class="col">

       </div>
     </div>
  </div>
</section>

@endsection
