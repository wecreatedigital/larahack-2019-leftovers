<div class="col-md-6 col-12 mb-3">
  <div class="ingredients-section bg-grey-ish rounded">
    <h4 class="item-title mb-2"><i class="fas fa-list-ul mr-2 text-primary"></i>{{ __('Ingredients') }}</h4>
    <hr class="hr-primary-start mt-0">

    <ul class="list-group rounded mb-0">
      @foreach ($recipe->ingredients as $ingredient)
        <li class="list-group-item">
          {{ $ingredient->ingredient_title }}
        </li>
      @endforeach
    </ul>
  </div>
</div>
