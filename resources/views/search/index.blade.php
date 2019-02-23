@extends('layouts.app')

@section('content')
<div class="container container-search">
    <form action="/search/results" method="get" id="make-search">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="form-inline row">
                        <div class="card-body">
                          <div class="col-12 input-group">
                            <label for="ingredients" class="mr-3">My Ingredients:</label>
                            <select name="ingredients[]" multiple="multiple" class="form-control-plaintext tags-ingredients" id="ingredients">
                                <option>Search ingredients in your cupboard...</option>
                                @foreach($ingredients as $ingredient)
                                    @if( is_array($request->input('ingredients')) && in_array($ingredient->id, $request->input('ingredients')) )
                                        <option selected value="{{{ $ingredient->id }}}">{{{ $ingredient->value }}}</option>
                                    @else
                                        <option value="{{{ $ingredient->id }}}">{{{ $ingredient->value }}}</option>
                                    @endif
                                @endforeach
                            </select>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <h1 class="mt-1">Recipe Results:</h1>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-block btn-lg">New Search</button>
            </div>
        </div>
    </form>
    <div class="row mt-3" id="append-results">
        @include('search.results')
    </div>
</div>
@endsection
