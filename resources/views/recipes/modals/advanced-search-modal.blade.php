<div class="modal fade" id="advancedSearchModal" tabindex="-1" role="dialog" aria-labelledby="advancedSearchModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="advancedSearchModalLabel">{{ __('Advanced Search') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="filerBySnippets">{{ __('Sort') }}</label>
          <select class="form-control select2" name="Filer_by_snippets" id="filerBySnippets">
            <option value="" selected disabled hidden>Select...</option>
            <option value="1">Featured</option>
            <option value="2">Most popular</option>
            <option value="3">Top rated</option>
            <option value="4">Most commented</option>
          </select>
        </div>

        <div class="form-group">
          <label for="filterTags">{{ __('Tags') }} <i class="fas fa-question-circle text-primary" data-toggle="tooltip" data-placement="right" title="Tags are used to categorize recipes"></i></label>
          <select class="form-control select2" name="Filer_by_tags" id="filterTags">
            <option value="" selected disabled hidden>Select...</option>
            <option value="1">Tag1</option>
            <option value="2">Tag2</option>
            <option value="3">Tag3</option>
          </select>
        </div>

        <div class="form-group">
          <label for="filterIngredients">{{ __('Ingredients') }}</label>
          <select class="form-control select2" name="Filer_by_ingredients" id="filterIngredients">
            <option value="" selected disabled hidden>Select...</option>
            <option value="1">Ingredient1</option>
            <option value="2">Ingredient2</option>
            <option value="3">Ingredient3</option>
          </select>
        </div>

        <div class="form-group">
          <label for="filterSeasonal">{{ __('Seasonal') }}</label>
          <select class="form-control select2" name="Filer_by_ingredients" id="filterSeasonal">
            <option value="" selected disabled hidden>Select...</option>
            <option value="Spring">Spring</option>
            <option value="Summer">Summer</option>
            <option value="Autumn">Autumn</option>
            <option value="Winter">Winter</option>
          </select>
        </div>

        <div class="form-group">
          <label for="filterCookingTime">{{ __('Cooking Time') }} <small class="text-primary">(Up to x minutes)</small></label>
          <div class="range-slider">
            <input class="range-slider__range" type="range" value="30" min="1" max="60">
            <span class="range-slider__value">0</span>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="buttom" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Close</button>
      </div>
    </div>
  </div>
</div>
