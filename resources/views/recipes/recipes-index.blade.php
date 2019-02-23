@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Recipes</h1>
    @foreach ($recipes as $recipe)
      <table>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Time to make</th>
        </tr>
        <tr>
          <td>{{$recipe->title}}</td>
          <td>{{$recipe->description}}</td>
          <td>{{$recipe->time}}</td>
        </tr>
        <tr>
          <td><a href="{{url('recipes-add')}}"><button class="btn btn-info">Add</button><a/></td>
        </tr>
      </table>
    @endforeach
  </div>
@endsection
