@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col text-center">
        <h1 class="Caption">Hit that star!</h1>
        <div class="Fav">
          <input id="fav-checkbox" class="Fav-checkbox" type="checkbox">
          <label for="fav-checkbox" class="Fav-label"><span class="Fav-label-text">Favourite</span></label>
          <div class="Fav-bloom"></div>
          <div class="Fav-sparkle">
            <div class="Fav-sparkle-line"></div>
            <div class="Fav-sparkle-line"></div>
            <div class="Fav-sparkle-line"></div>
            <div class="Fav-sparkle-line"></div>
            <div class="Fav-sparkle-line"></div>
          </div>
          <svg class="Fav-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66 64">
            <title>Star Icon</title>
            <path d="M36.14,3.09l5.42,17.78H59.66a4.39,4.39,0,0,1,2.62,7.87L47.48,40.14,53,58.3a4.34,4.34,0,0,1-6.77,4.78L32,52l-14.26,11A4.34,4.34,0,0,1,11,58.27l5.55-18.13L1.72,28.75a4.39,4.39,0,0,1,2.62-7.87h18.1L27.86,3.09A4.32,4.32,0,0,1,36.14,3.09Z"/>
          </svg>
        </div>
      </div>
    </div>
  </div>

@endsection
