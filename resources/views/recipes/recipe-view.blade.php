@extends('layouts.app')

@section('content')
<div class="container">
  {{$recipe->title}}
  {{$recipe->description}}
  {{$recipe->difficulty}}
  {{$recipe->servings}}
  {{$recipe->prep_time}}
  {{$recipe->cook_time}}  
</div>


@endsection
