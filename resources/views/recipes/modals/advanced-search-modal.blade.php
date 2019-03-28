<div class="modal fade" id="advancedSearchModal" tabindex="-1" role="dialog" aria-labelledby="advancedSearchModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="advancedSearchModalLabel">Advanced Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="filerBySnippets">Sort</label>
          <select class="form-control select2" name="Filer_by_snippets" id="filerBySnippets">
            <option value="" selected disabled hidden>Select...</option>
            <option value="1">Featured</option>
            <option value="2">Most popular</option>
            <option value="3">Top rated</option>
            <option value="4">Most commented</option>
          </select>
        </div>

        <div class="form-group">
          <label for="filterTags">Tags <i class="fas fa-question-circle text-primary"></i></label>
          <select class="form-control select2" name="Filer_by_tags" id="filterTags">
            <option value="" selected disabled hidden>Select...</option>
            <option value="1">Tag1</option>
            <option value="2">Tag2</option>
            <option value="3">Tag3</option>
          </select>
        </div>

        <div class="form-group">
          <label for="filterIngredients">Ingredients</label>
          <select class="form-control select2" name="Filer_by_ingredients" id="filterIngredients">
            <option value="" selected disabled hidden>Select...</option>
            <option value="1">Ingredient1</option>
            <option value="2">Ingredient2</option>
            <option value="3">Ingredient3</option>
          </select>
        </div>

        <div class="form-group">
          <label for="filterSeasonal">Seasonal</label>
          <select class="form-control select2" name="Filer_by_ingredients" id="filterSeasonal">
            <option value="" selected disabled hidden>Select...</option>
            <option value="Spring">Spring</option>
            <option value="Summer">Summer</option>
            <option value="Autumn">Autumn</option>
            <option value="Winter">Winter</option>
          </select>
        </div>

        <div class="form-group">
          <label for="filterCookingTime">Cooking Time</label>
          <input type="range" class="form-control-range" name="filter_cooking_time" id="filterCookingTime">
        </div>
      </div>

      <div class="modal-footer">
        <button type="buttom" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Close</button>
      </div>
    </div>
  </div>
</div>
