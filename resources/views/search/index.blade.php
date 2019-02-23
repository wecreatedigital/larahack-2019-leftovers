@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-12">
            <form class="form-inline row" action="/search/results" method="get" id="make-search">
              <div class="col-12 input-group">
                <label for="ingredients" class="sr-only">Ingredients</label>
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
                <button type="submit" class="btn btn-primary ml-3">Find receipes</button>
              </div>
            </form>
        </div>
    </div>
    <div class="row" id="append-results">
        @include('search.results')
    </div>
</div>
@endsection
