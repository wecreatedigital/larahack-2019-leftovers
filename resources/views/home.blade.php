@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline row" action="/search" method="post">
                      <div class="col-12 input-group">
                        <label for="ingredients" class="sr-only">Ingredients</label>
                        <select class="form-control-plaintext" id="ingredients">
                            <option>Search ingredients in your cupboard...</option>
                            <option>Cheese</option>
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
