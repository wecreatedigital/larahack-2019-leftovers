@extends('layouts.app')

@section('content')
  <div class="container">
    {!! Form::open(['url'=>'/recipe']) !!}
    {!! Form::label('recipe_title','title')!!}
    {!! Form::text('title') !!}

    {!! Form::label('recipe_description')!!}
    {!! Form::textarea('description',null,['rows' => 2]) !!}

    {!! Form::label('recipe_difficulty', 'Difficulty') !!}
    {!! Form::label('recipe_beginner', 'Beginner')!!}
    {!! Form::radio('beginner', 'Beginner')!!}

    {!! Form::label('recipe_intermediate', 'Intermediate')!!}
    {!! Form::radio('intermediate', 'Intermediate')!!}

    {!! Form::label('recipe_advanced', 'Advanced')!!}
    {!! Form::radio('advanced', 'Advanced')!!}

    {!! Form::label('recipe_servings', 'Servings')!!}
    {!! Form::number('servings')!!}

    {!! Form::label('recipe_prep_time') !!}
    {!! Form::time('time', null)!!}

    {!! Form::label('recipe_cook_time') !!}
    {!! Form::time('time', null)!!}

    {!! Form::label('recipe_image') !!}
    {!! Form::file('recipe_image') !!}
    {!! Form::submit('A new recipe')!!}
    {!! Form::close()!!}
  </div>

@endsection
