<div class="col-md-6 col-12 mb-3">
  <div class="ingredients-section bg-grey-ish rounded">
    <h4 class="item-title mb-2"><i class="fas fa-clipboard-list mr-2 text-primary"></i>{{ __('Directions') }}</h4>
    <hr class="hr-short mt-0">

    <ul class="list-group rounded mb-0">
      @foreach ($recipe->steps as $step)
        <li class="list-group-item">
          <div class="d-flex flex-row">
            <div class="w-20 mr-2">
              <h5 class="text-primary mb-0">{{ $step->step }}.</h5>
            </div>
            <p class="m-0">{{ $step->description }}</p>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</div>
