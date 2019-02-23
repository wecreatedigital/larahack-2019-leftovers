@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline row" action="/search/results" method="get">
                      <div class="col-12 input-group">
                        <label for="ingredients" class="sr-only">Ingredients</label>
                        <select name="ingredients[]" multiple="multiple" class="form-control-plaintext tags-ingredients" id="ingredients">
                            <option>Search ingredients in your cupboard...</option>
                            @foreach($ingredients as $ingredient)
                                <option value="{{{ $ingredient->id }}}">{{{ $ingredient->value }}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary ml-3">Find receipes</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
