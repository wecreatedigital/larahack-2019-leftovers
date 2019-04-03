@extends('layouts.app')

@section('content')

  <section class="hero-section py-5">
    <div class="container">
      <div class="row align-items-center text-center text-md-left">
        <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
          <h1 class="section-title mb-1"><span>Lorem</span> ipsum dolor sit.</h1>
          <hr>
          <p class="m-0">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, facilis!
          </p>
          <a class="btn btn-lg btn-rounded btn-primary mt-4" href="#">Get Started</a>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
          <img class="img-fluid" src="/images/all_the_data.png" alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="bg-faded py-5 my-5">
    @include('partials.section-test')
  </section>

  <section class="py-5">
    @include('partials.team')
  </section>

@endsection
