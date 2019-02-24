$( document ).ready(function() {

  // On Change Recipe stage 1
  $(document).on('input', '.addRecipeStage1', function(e) {

    e.preventDefault();

    if( $('#recipe_title').val().length && $('#recipe_description').val().length )
    {
      $('#addRecipeStage2Control').fadeIn( "slow" );
    } else {
      $('#addRecipeStage2Control').fadeOut( "slow" );
    }

  });

  // On Change Recipe stage 2
  $(document).on('input', '.addRecipeStage2', function(e) {

    e.preventDefault();

    if( $('#recipe_ingredients').val().length
    && $('#recipe_prep_time').val().length
    && $('#recipe_cook_time').val().length )
    {
      $('#addRecipeStage3Control').fadeIn( "slow" );
    } else {
      $('#addRecipeStage3Control').fadeOut( "slow" );
    }

  });

  // On Change Recipe stage 3
  $(document).on('input', '.addRecipeStage3', function(e) {

    e.preventDefault();

    if( $(this).val().length ) {
      $('#addRecipeStage4Control').fadeIn( "slow" );
      $('#addRecipeStage4Control').fadeIn( "slow" );


    } else {
      $('#addRecipeStage4Control').fadeOut( "slow" );
    }

  });

  // OnClick Add Recipe Step
  $(document).on('click', '.addRecipeStep', function(e) {

    e.preventDefault();

    var matches = 1;
    $(":input.addRecipeStage3").each(function(i, val) {
        matches++;
    });

    matches + 1;

    $('#recipe_steps').append('<label class="font-weight-bold" for="recipe_step">Step '+ matches +'</label><textarea type="text" class="form-control addRecipeStage3" name="recipe_step" placeholder="Recipe Step"></textarea>');

  });



});
