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
              <div class="col-12 input-group mb-3">
                <input type="text" class="form-control" placeholder="Author's name or Recipe name..." aria-label="Author's name or Recipe name...">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">{{ __('Find Recipes') }}</button>
                </div>
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
    <div class="container my-5 py-5">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card card-img-top-canvas card-header-bounce bg-shadow">
            <div class="card-header card-header-image">
              <img src="/images/colourful_image1.jpeg" alt="">
              <div class="colored-shadow" style="background-image: url(/images/colourful_image1.jpeg); opacity: 1;">
              </div>
            </div>
            <div class="card-body">
              <h6 class="card-category text-primary">Lorem ipsum.</h6>
              <h4 class="card-title">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </h4>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-img-top-canvas card-header-bounce bg-shadow">
            <div class="card-header card-header-image">
              <img src="/images/colourful_image2.jpeg" alt="">
              <div class="colored-shadow" style="background-image: url(/images/colourful_image2.jpeg); opacity: 1;">
              </div>
            </div>
            <div class="card-body">
              <h6 class="card-category text-primary">Lorem ipsum.</h6>
              <h4 class="card-title">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </h4>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-img-top-canvas card-header-bounce bg-shadow">
            <div class="card-header card-header-image">
              <img src="/images/colourful_image3.jpeg" alt="">
              <div class="colored-shadow" style="background-image: url(/images/colourful_image3.jpeg); opacity: 1;">
              </div>
            </div>
            <div class="card-body">
              <h6 class="card-category text-primary">Lorem ipsum.</h6>
              <h4 class="card-title">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
