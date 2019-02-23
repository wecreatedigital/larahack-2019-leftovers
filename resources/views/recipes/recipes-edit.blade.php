@extends('layouts.app')

@section('content')
  <div class="container">
    {!! Form::open(['url'=>'/recipe/'.$recipe->id.'/update']) !!}
    {!! Form::label('recipe_title','title')!!}
    {!! Form::text('title', $recipe->title) !!}

    {!! Form::label('recipe_description')!!}
    {!! Form::textarea('description',$recipe->description,['rows' => 2]) !!}

    {!! Form::label('recipe_difficulty', 'Difficulty') !!}
    {!! Form::label('recipe_beginner', 'Beginner')!!}
    @if ($recipe->difficulty == 'Beginner')
    {!! Form::radio('difficulty', 'Beginner',['checked'])!!}
    @else
      {!! Form::radio('difficulty', 'Beginner')!!}
    @endif

    {!! Form::label('recipe_intermediate', 'Intermediate')!!}
    @if ($recipe->difficulty == 'Intermediate')
    {!! Form::radio('difficulty', 'Intermediate',['checked'])!!}
    @else
    {!! Form::radio('difficulty', 'Intermediate')!!}
    @endif

    {!! Form::label('recipe_advanced', 'Advanced')!!}
    @if ($recipe->difficulty == 'Advanced')
    {!! Form::radio('difficulty', 'Advanced',['checked'])!!}
    @else
    {!! Form::radio('difficulty', 'Advanced')!!}
    @endif

    {!! Form::label('recipe_servings', 'Servings')!!}
    {!! Form::number('servings',$recipe->servings)!!}

    {!! Form::label('recipe_prep_time') !!}
    {!! Form::time('prep_time', $recipe->prep_time)!!}

    {!! Form::label('recipe_cook_time') !!}
    {!! Form::time('cook_time', $recipe->cook_time)!!}

    {!! Form::label('recipe_image') !!}
    {!! Form::file('recipe_image') !!}
    {!! Form::submit('Update Recipe')!!}
    {!! Form::close()!!}
  </div>

@endsection
