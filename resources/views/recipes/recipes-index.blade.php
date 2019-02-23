@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Recipes</h1>
    <a href="{{url('recipes-add')}}"><button class="btn btn-primary">Add</button><a/>

    @foreach ($recipes as $recipe)
      <table>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Prep time</th>
          <th>Cook time</th>
          <th>Servings</th>
          <th>Difficulty</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          <td>{{$recipe->title}}</td>
          <td>{{$recipe->description}}</td>
          <td>{{$recipe->prep_time}}</td>
          <td>{{$recipe->cook_time}}</td>
          <td>{{$recipe->preptime}}</td>
          <td>{{$recipe->servings}}</td>
          <td>{{$recipe->difficulty}}</td>
          <td><a href="{{url('recipe/'.$recipe->id.'/view')}}"><button class="btn btn-info">View</button></a></td>
          <td><a href="{{url('recipe/'.$recipe->id.'/edit')}}"><button class="btn btn-warning">Edit</button></a></td>
          <td><a href="{{url('recipe/'.$recipe->id.'/delete')}}"><button class="btn btn-danger">Delete</button></a></td>
        </tr>
      </table>
    @endforeach
  </div>
@endsection
